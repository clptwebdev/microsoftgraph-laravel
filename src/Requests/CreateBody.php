<?php

namespace Clpt\MicrosoftGraph\Requests;
class CreateBody {

    /*
   |--------------------------------------------------------------------------
   | Create Body - construct
   |--------------------------------------------------------------------------
   | This is where the Microsoft Graph API asks for the body.
   | The Content is where you can fill the description with the event.
   | This is required by Microsoft's standard.
   | The Content type should always stay as html.
   */

    public function __construct(
        public ?string $contentType = 'HTML',
        public ?string $content = 'Event Content',
    )
    {
    }

}
