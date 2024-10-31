<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$conf_room = array(
    'Granite Room' => 'c_6f68de5662878ea0012a69bc021ae1fc0a45b79a042210f65f00c42c90a6a4e6@group.calendar.google.com',
    'Bohda-Pom Room' => 'c_0f15cd16f70c5857a88ca4df6be6e0c974f32c4d5d2205bbc6515b3c53732d48@group.calendar.google.com'
);

$title = $_POST['title'];
$desc = $_POST['desc'];
$room = $_POST['room'];
$date = $_POST['date'];
$start = $_POST['start'];
$end = $_POST['end'];



$startDateTime = "$date"."T"."$start";
$endDateTime = "$date"."T"."$end";


require_once './google-api-php-client--PHP8.0/vendor/autoload.php';

$client = new Google_Client();
putenv('GOOGLE_APPLICATION_CREDENTIALS=meeting-room-calendar-438119-047a144cdbca.json');
$client->useApplicationDefaultCredentials();
$client->setApplicationName("meeting_room_calendar");
$client->setScopes(Google_Service_Calendar::CALENDAR);
$client->setAccessType('offline');

$service = new Google_Service_Calendar($client);

$event = new Google_Service_Calendar_Event(array(
    'summary' => $title,
    'description' => $desc,
    'start' => array(
        'dateTime' => $startDateTime,
        'timeZone' => 'America/Los_Angeles'
    ),
    'end' => array(
        'dateTime' => $endDateTime,
        'timeZone' => 'America/Los_Angeles'
    ),
));

$calendarId = $conf_room[$room];
$event = $service->events->insert($calendarId, $event);

echo $event->id;

?>