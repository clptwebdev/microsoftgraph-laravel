## About microsoftgraph-laravel

This package allows you to connect microsoft graph api (events) to create calendar events on a users 365 profile

## Example use case

```phpt

use Carbon\Carbon;
use Clpt\MicrosoftGraph\MicrosoftGraph;
use Clpt\MicrosoftGraph\Requests\CreateBody;
use Clpt\MicrosoftGraph\Requests\CreateCalendarEvent;
use Clpt\MicrosoftGraph\Requests\CreateEnd;
use Clpt\MicrosoftGraph\Requests\CreateLocation;
use Clpt\MicrosoftGraph\Requests\CreateStart;

 $calendar = new CreateCalendarEvent(
                    subject: 'Example Subject',
                    start: new CreateStart(
                        dateTime: \Carbon\Carbon::now()->format('Y-m-d\TH:i:s'),
                        timezone: config('app.timezone'),
                    ),
                    end: new CreateEnd(
                        dateTime: \Carbon\Carbon::now()->addDay()->format('Y-m-d\TH:i:s'),
                        timezone: config('app.timezone'),
                    ),
                    body: new CreateBody(
                        content: "<b>Example event content</b>"
                    ),
                    location: new CreateLocation());
                    
                    //adds ability for online teams meetings
            
                    $calendar->setOnlineMeeting();
                    $calendar->setAttendees(['test@gmail.com' , 'test2@gmail.com']);
               
                    //sends the data with guzzle
                    MicrosoftGraph::event($calendar, config("microsoftgraph.uuid"), config("microsoftgraph.key"));

```
