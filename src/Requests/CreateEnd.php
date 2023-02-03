<?php

namespace Clpt\MicrosoftGraph\Requests;
class CreateEnd {
    /*
    |--------------------------------------------------------------------------
    | Create End Date and Time - construct
    |--------------------------------------------------------------------------
    |
    | This is where the Microsoft Graph API asks for an event end time.
    | The timezone can be passed from laravel's config (default).
    |
    */
    public function __construct(
        public string $dateTime ,
        public string $timezone ,
    )
    {
    }

}
