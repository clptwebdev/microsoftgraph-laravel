<?php

namespace Clpt\MicrosoftGraph;

use App\Models\User;
use Carbon\Carbon;
use Clpt\MicrosoftGraph\Requests\CreateCalendarEvent;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class MicrosoftGraph {

    /*
   |--------------------------------------------------------------------------
   | Main Event trigger
   |--------------------------------------------------------------------------
   |
   | Here is where the calendar object is sent.
   | The CreateCalendarEvent is where the object is formatted.
   | The Function formatAttendees creates our object in the correct format for Microsoft to parse it.
   | The User is accepted as we need their uuid to direct to their office calendar
   | For any errors please check your laravel.log file
   |
   */

    public static function event(CreateCalendarEvent $event, $uuid, string $accessToken)
    {
        if(! $uuid) $uuid = config("microsoftgraph.uuid");

        $client = new Client();
        try
        {
            $response = $client->request('POST', "https://graph.microsoft.com/beta/users/{$uuid}/calendar/events", [
                'body' => response()->json($event)->content(),
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => trim('Bearer' . ' ' . $accessToken ?? config("microsoftgraph.key")),
                ],
            ]);

            return response()->json([
                'code' => $response->getStatusCode(),
                'message' => $response->getReasonPhrase(),
            ]);

        } catch(GuzzleException $e)
        {
            report($e);

            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }

}
