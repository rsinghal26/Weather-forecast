<?php

if($_GET['city']){

    $weather = "";
    $error = "";

    $city = str_replace(' ','',$_GET['city']);  //for remove space in the city name

    $file_headers = @get_headers("http://www.weather-forecast.com/locations/".$city."/forecasts/latest");
        
        
        if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
    
            $error = "That city could not be found.";

        }else{

            $cast = file_get_contents('http://www.weather-forecast.com/locations/'.$city.'/forecasts/latest');


            $firstExplode = explode('3 Day Weather Forecast Summary:</b><span class="read-more-small"><span class="read-more-content"> <span class="phrase">', $cast);

            if(sizeof($firstExplode) > 1){

                $secondExplode = explode('</span></span></span>', $firstExplode[1]);

              }else{

                  $error = "That city could not be found.";
              }

            if(sizeof($secondExplode) > 1){

                  $weather = $secondExplode[0];
              }else{

                  $error = "That city could not be found.";
              }   
          }    
    
}


?>




<!DOCTYPE html>
<html lang="en">
  <head>

    <title>Weather Report</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="stylesheet.css">

  </head>

  <body>


    <dir class="container">
       
        <h1>What's The Weather?</h1>
        <form>
            <div class="form-group">
              <label for="city">Enter the name of a city.</label>
              <input type="text" class="form-control"  name="city" id="city" placeholder="Eg. London, Mumbai">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <dir id="error"><? 

            if($weather){

                echo '<div class="alert alert-success" role="alert">
  '.$weather.'
</div>';

            }else if($error){

                echo "<div class='alert alert-danger' role='alert'>".$error ."</div>";

            }

        ?></dir>
    </dir>
    

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    <script src="script.js"></script>
  </body>
</html>








