<?php

namespace Clpt\MicrosoftGraph\Requests;
class CreateLocation {
    /*
    |--------------------------------------------------------------------------
    | Create Location display name - construct
    |--------------------------------------------------------------------------
    |
    | This is where the Microsoft Graph API asks for an event location.
    | This can be nullable by Microsoft's standard, but it helps with readability on the calendar's side.
    |
    */

    public function __construct(
        public ?string $displayName = 'England , London',
    )
    {
    }

}
