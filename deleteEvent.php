<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$eventId = "nud2lu9ruv82oqtr9ngte057hg";


require_once './google-api-php-client--PHP8.0/vendor/autoload.php';

$client = new Google_Client();
putenv('GOOGLE_APPLICATION_CREDENTIALS=meeting-room-calendar-438119-047a144cdbca.json');
$client->useApplicationDefaultCredentials();
$client->setApplicationName("meeting_room_calendar");
$client->setScopes(Google_Service_Calendar::CALENDAR);
$client->setAccessType('offline');

$service = new Google_Service_Calendar($client);



$calendarId = 'c_6f68de5662878ea0012a69bc021ae1fc0a45b79a042210f65f00c42c90a6a4e6@group.calendar.google.com';
$service->events->delete($calendarId, $eventId);


?>