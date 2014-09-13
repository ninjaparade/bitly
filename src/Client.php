<?php namespace Ninjaparade\Bitly;

use Guzzle\Service\Client as GuzzleClient;
use Guzzle\Service\Description\ServiceDescription;
use Ninjaparade\Bitly\Plugin\TokenAuthPlugin;
use Ninjaparade\Bitly\Subscribers\ArrayAggregatorSubscriber;
use Ninjaparade\Bitly\Subscribers\ResponseStandardizationSubscriber;

class Client extends GuzzleClient
{

   public function __construct($access_token)
   {

        parent::__construct();
        
        $this->setDescription(ServiceDescription::factory(__DIR__.'/Resources/bitly.json'));

        $this->addSubscriber(new TokenAuthPlugin($access_token));
        $this->addSubscriber(new ArrayAggregatorSubscriber());
        $this->addSubscriber(new ResponseStandardizationSubscriber());

    }

}
