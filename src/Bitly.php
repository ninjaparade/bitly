<?php namespace Ninjaparade\Bitly;

class Bitly {

    protected $config;

    protected $client;

    function __construct($config)
    {
        $this->config = $config;

        $this->client = new Client($this->getApiKey());
    }

    /**
     * @param $long
     * @return shortened url from long url
     */
    public function shorten($long)
    {
        return array_get($this->client->Shorten(['longUrl' => $long]), 'url');
    }

    /**
     * @param $short
     * @return array
     * example  [long_url] => http://www.google.ca/ [user_hash] => 1py09oK [global_hash] => 2l57US]
     */
    public function expand($short)
    {
        if ( filter_var($short, FILTER_VALIDATE_URL) )
        {
            $data = ['shortUrl' => $short];
        } else
        {
            $data = ['hash' => $short];
        }

        return array_get($this->client->Expand($data), 'expand');
    }

    /**
     * Returns the api key set in the config.
     *
     * @return string
     */
    protected function getApiKey()
    {
        return array_get($this->config, 'API_KEY') ?: getenv('BITLY_API_KEY');
    }

}