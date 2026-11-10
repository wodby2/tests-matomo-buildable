<?php

namespace Piwik\Plugins\HelloWodby;

class API extends \Piwik\Plugin\API
{
    public function getGreeting()
    {
        return 'hello from the app repository';
    }
}
