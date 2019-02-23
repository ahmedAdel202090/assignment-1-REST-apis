<?php

class weatherDesign
{
    function designWeather($city_name,$weather_description,$temparature,$presure,$humidity)
    {
        echo  '<div class="container">';
        echo  '<h1 class="badge badge-primary" style="font-size: 2rem;">The Weather of '.$city_name.' city'.' </h1>';
        echo "<br>";
        echo '<h3 class="badge badge-secondary" style="font-size: 1.2rem;">weather description : '.$weather_description.'</h3>';
        echo "<br>";
        echo '<h3 class="badge badge-secondary" style="font-size: 1.2rem;">temparature : '.$temparature.' f'.'</h3>';
        echo "<br>";
        echo '<h3 class="badge badge-secondary" style="font-size: 1.2rem;">presure : '.$presure.'</h3>';
        echo "<br>";
        echo '<h3 class="badge badge-secondary" style="font-size: 1.2rem;">humidity : '.$humidity.'</h3>';
        echo '</div><br>';
    }
}

class azanDesign
{
    function designAzan($Fajr,$Sunrise,$Dhuhr,$Asr,$Maghrib,$Isha)
    {
        echo  '<div class="container"><h1 class="badge badge-primary" style="font-size: 2rem;">Pray times </h1>';
        echo '<br>';
        echo '<h3 class="badge badge-secondary" style="font-size: 1.2rem;">Fajr '.$Fajr.'</h3>' ;
        echo '<br>';
        echo '<h3 class="badge badge-secondary" style="font-size: 1.2rem;">Sunrise '.$Sunrise.'</h3>' ;
        echo '<br>';
        echo '<h3 class="badge badge-secondary" style="font-size: 1.2rem;">Duhr '.$Dhuhr.'</h3>' ;
        echo '<br>';
        echo '<h3 class="badge badge-secondary" style="font-size: 1.2rem;">Asr '.$Asr.'</h3>' ;
        echo '<br>';
        echo '<h3 class="badge badge-secondary" style="font-size: 1.2rem;">Maghrib '.$Maghrib.'</h3>' ;
        echo '<br>';
        echo '<h3 class="badge badge-secondary" style="font-size: 1.2rem;">Isha '.$Isha.'</h3></div>' ;
    }
}
?>