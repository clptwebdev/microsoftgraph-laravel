<?php

namespace Clpt\MicrosoftGraph\Requests;
class CreateStart {

    /*
    |--------------------------------------------------------------------------
    | Create Start Date and Time - construct
    |--------------------------------------------------------------------------
    |
    | This is where the Microsoft Graph API asks for an event start time.
    | The timezone can be passed from laravel's config (default).
    |
    */
    public function __construct(
        public string $dateTime,
        public string $timezone,
    )
    {

    }

}
