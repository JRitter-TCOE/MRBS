<?php

require_once 'google-api-php-client-PHP8.3/vendor/autoload.php';

$client = new Google_Client();
putenv('GOOGLE_APPLICATION_CREDENTIALS=meeting-room-calendar-438119-38f3f35bc105.json');
$client->useApplicationDefaultCredentials();
$client->setApplicationName("meeting_room_calendar");
$client->setScopes(Google_Service_Calendar::CALENDAR);
$client->setAccessType('offline');

$service = new Google_Service_Calendar($client);

$event = new Google_Service_Calendar_Event(array(
    'summary' => 'Test Event',
    'description' => 'Test Event',
    'start' => array(
        'dateTime' => '2024-10-09T09:00:00-07:00'
    ),
    'end' => array(
        'dateTime' => '2024-10-13T09:00:00-07:00'
    ),
));

$calendarId = 'c_df2510bec17a77491255287d72279e798e69916360fc3a39009b716c36fb2adf@group.calendar.google.com';
$service->events->insert($calendarId, $event);

?>