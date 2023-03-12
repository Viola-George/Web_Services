<?php
$citiesList = file_get_contents("./city.list.json");
$json_cities = json_decode($citiesList, true);  

function Egypt_City($var){
    return($var['country']=="EG");
}


$egyptCities = array_filter($json_cities,"Egypt_City"); 
$apikey = "b57a3bf9121ed7fe9e84edd9251902d5";

if(!empty($_POST)){
    if(isset($_POST["submit"])){
        $city_id = $_POST["city"];
        $apiUrl = "https://api.openweathermap.org/data/2.5/weather?id=" . $city_id . "&appid=" . "8bb709db69b1b8aaf1bb6d4445f5b0c4";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response, true);
        $current_time = date("F g:i a");
        $current_time2 = date(" jS \ F , Y ");

        $icon = "https://openweathermap.org/img/wn/". $data["weather"][0]["icon"] . "@2x.png";        
    }
        if(!empty($data)){
            die('<body>
            <div style="  
                            width: 45%;
                            text-align: center ;
                            justify-content: center;
                            background-color: orange;
                            position: relative;
                            padding-bottum: 10px;
                            top: 20%;
                            left: 28%;

                            " >'
                            ."<button type='button' class='btn-close' aria-label='Close' style='margin-left:95%'><a href ='index.php' style='text-decoration:none; color:black'> X </a></button>"
                . '<center><h2 style="color:#30534c;">' . $data["name"] . ' has a Weather Status as</h2></br>'
                . "<p> " . $current_time . "</p>"
                . "<p> " . $current_time2 . "</p>"
               
                . "<p> " . $data["weather"][0]["description"] . "</p>"
                . '<img src="' . $icon . '" alt="">'
                ."<p> Humidity:  ".$data["main"]["humidity"]."%</p>"
                ."<p> Wind:  ".($data["wind"]["speed"])." Km/h</p>"
                . '</center>' .
                '</div> </body>');
        }
    }

require_once("./weather.php");

?>