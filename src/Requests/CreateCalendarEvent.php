<?php

namespace Clpt\MicrosoftGraph\Requests;

/**
 * @property string $onlineMeetingProvider
 * @property array  $attendees
 * @property bool   $isOnlineMeeting
 */
class CreateCalendarEvent {

    /*
    |--------------------------------------------------------------------------
    | Create Calendar Event
    |--------------------------------------------------------------------------
    | This is where the Microsoft Graph API is pulled all together from the other classes.
    | The Subject is equivalent to the title of the event.
    | Start your class like so -  $calendar = new CreateCalendarEvent().
    | Microsoft Graph API with Events support teams integration. Simply call $calendar->setOnlineMeeting("teamsForBusiness" , true);
    | To Invite attendees place emails into an array for the parameters $calendar->setAttendees(["testing@clpt.co.uk , 'test@gmail.com"]);.
    */

    public function __construct(
        public string         $subject,
        public CreateStart    $start,
        public CreateEnd      $end,
        public CreateBody     $body,
        public CreateLocation $location,
    )
    {
    }

    public function setOnlineMeeting(
        string $onlineMeetingProvider = "teamsForBusiness",
        bool   $isOnlineMeeting = true,
    )
    {
        $this->onlineMeetingProvider = $onlineMeetingProvider;
        $this->isOnlineMeeting = $isOnlineMeeting;
    }

    public function setAttendees(
        array $emails,
    )
    {
        $this->attendees = $this->formatAttendees($emails);
    }

    /*
    |--------------------------------------------------------------------------
    | Format Attendees
    |--------------------------------------------------------------------------
    | This function will never be seen outside this class its only purpose is to structure the attendees in a way Microsoft can read them.
    |
    */
    public function formatAttendees(array $emails): array
    {
        foreach($emails as $email)
        {
            $attendee = new \stdClass();
            $attendee->emailAddress = ["address" => "{$email}"];
            $this->attendees[] = $attendee;
        }

        return $this->attendees;
    }

}
