<?php
require_once 'vendor/autoload.php';
class TrelloApi
{

}
class AthanApi
{
    function getTimes($country,$city)
    {
        $response = Unirest\Request::get("https://aladhan.p.rapidapi.com/timingsByCity?city=".$city."&country=".$country,
            array(
            "X-RapidAPI-Key" => "bf23c79991mshb6258be61d2cc30p15e08ajsn414330657bef"
            )
        );
        $prayer_time=$response->body->data->timings;
        return $prayer_time;
    }
}
class WeatherApi
{

}

?>