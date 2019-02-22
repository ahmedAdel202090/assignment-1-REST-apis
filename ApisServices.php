<?php
require_once 'vendor/autoload.php';
require_once ("weatherandazanDesign.php");
class TrelloApi
{

}
class AthanApi
{
    function getTimes($city,$country)
    {
        $response = Unirest\Request::get("https://aladhan.p.rapidapi.com/timingsByCity?city=".$city."&country=".$country,
            array(
            "X-RapidAPI-Key" => "bf23c79991mshb6258be61d2cc30p15e08ajsn414330657bef"
            )
        );
        $prayer_time=$response->body->data->timings;
        //echo json_encode($prayer_time);
        $d2=new azanDesign();
        $d2->designAzan($prayer_time->Fajr,$prayer_time->Sunrise,$prayer_time->Dhuhr,$prayer_time->Asr,$prayer_time->Maghrib,$prayer_time->Isha);      
    }
}
class WeatherApi
{
    function getWeather($city_name,$country_name){
        $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.openweathermap.org/data/2.5/weather?q={$city_name},{$country_name}&appid=a17c8bebf50fea88b3ebb949a79a6e2a",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET"
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  //echo "cURL Error #:" . $err;
} else {  
  $weather_data=json_decode($response);
  $weather_description=json_encode($weather_data->weather[0]->description);
  $temparature=json_encode($weather_data->main->temp);
  $presure=json_encode($weather_data->main->pressure);
  $humidity=json_encode($weather_data->main->humidity);
  $d1 =new weatherDesign();
  $d1->designWeather($city_name,$weather_description,$temparature,$presure,$humidity);
}
}
}
?>