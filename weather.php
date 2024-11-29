
<?php


// API KEY 

$apikey = "9e73e9a7292012e9aa4a22292ec6daad";
$city = $_POST['city'] ?? ""; //Defualt city is empty
$weatherurl = "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apikey&units=metric";


// initialize variables 
$temperature = $description = $cityName = $errorMessage = "";


// if city name found 
if ($city) {
    $weatherData = @file_get_contents($weatherurl);
    $weatherArray = json_decode($weatherData, true);


    if ($weatherArray && $weatherArray['cod'] == 200) {
        $cityName = $weatherArray['name'];
        $temperature = $weatherArray['main']['temp'];
        $description = ucfirst($weatherArray['weather'][0]['description']);
    }
    else
    {
        $errorMessage = "City not found";
    }
}




?>