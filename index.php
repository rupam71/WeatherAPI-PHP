<?php 
if (empty($_POST["cityName"])){
    $city = "Dhaka";
} 
else {
    $city = $_POST["cityName"];
}

$timestamp = date("F d, Y h:i A", time()+ 4*60*60); 

$url = "https://api.openweathermap.org/data/2.5/weather?q=$city&units=metric&appid={api key}";

$con = @file_get_contents($url);
$schima = json_decode($con);


// Location Error handling [line 18-111]
if (strpos($http_response_header[0], "200")) { 
  
} else { 
  echo '
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
      <link rel="stylesheet" href="style.css">
  
      <!-- CSS only -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  
      <!-- JS, Popper.js, and jQuery -->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
      <script src="https://kit.fontawesome.com/d3a491f6c0.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" />
    
      <title>
        Weather
      </title>
  
      <style>
         
      </style>
    </head>
  
    <body style="color: white; background-color: #38484A;">
      
      <nav class="navbar navbar-dark" style="background-color: #48484A;">
        <a class="navbar-brand text-white" href="#">
          <i class="fas fa-cloud-sun"></i>
          Weekly Weather
        </a>
  
        <form action="index.php" method="POST" class="form-inline my-2 my-lg-0 text-white">
          <i class="fas fa-search-location fa-lg mr-3"></i>
          <input class="form-control" placeholder="Search City Weather" name="cityName">
          <button class="btn text-white" type="submit">Search</button>
        </form>
        
      </nav>
  
      <div class="header-image">
        <img src="lake_forest_snow_130421_2560x1024 (2).jpg" alt="Snow" style="width:100%;">
        <div class="centered">
          <h1>Weekly Weather</h1>
          <p>We serve weekly weather data</p>
        </div>
      </div>
  
  
      <div class="container-fluid "  style=" text-align:center;">
        
        <div class="py-5">
          <h1><i class="fas fa-map-marker-alt mr-2"></i><b> Area Not Found <br></b> </h1>
          <form action="index.php" method="POST" class="form-inline my-2 my-lg-0 text-white" style=" display: flex; justify-content: center;">
          <i class="fas fa-search-location fa-lg mr-3"></i>
          <input class="form-control" placeholder="Search City Weather" name="cityName">
          <button class="btn text-white" type="submit">Search</button>
        </form>
          <p>  <?php echo $timestamp; ?> </P>
        </div>

        </div>

        <div class="footer">
        <div class="container">
          <div class="footer-text">
            <i class="far fa-envelope fa-3x"></i>
            <h2> Get Weekly Weather Update </h2>
            <p style="font-size: 15px;">Get updates on weather. We will send you weekly data via email. Feel free to Subscribe. Its 100% Free.</p>
            <div class="ui form">
              <div class="required field">
                <input type="text" placeholder="Your Name" class="mt-3">
                <input type="text" placeholder="Your Email" class="mt-3">
                <button class="fluid ui button mt-3 text-white" style="background-color: #60b0ba; border-radius: 4px; ">Subscribe</button>
              </div>
              <div class="mt-5 pb-5">
                <a href="mailto:rupamsahriar@gmail.com" class=" text-white"> <i class="far fa-envelope fa-3x m-3"></i></a>
                <a href="https://github.com/rupam71" class=" text-white"> <i class="fab fa-github fa-3x m-3"></i></a>
                <a href="https://twitter.com/rupam_sahriar" class=" text-white"> <i class="fab fa-twitter fa-3x m-3"></i></a>
                <a href="https://www.facebook.com/hossain.sahriarkabir.7" class=" text-white"> <i class="fab fa-facebook fa-3x m-3"></i></a>
                <a href="https://www.linkedin.com/in/hossain-sahriar-kabir-rupam-31566a133/" class=" text-white"> <i class="fab fa-linkedin fa-3x m-3"></i></a>
                <a href="https://stackoverflow.com/users/12461689/rupam" class=" text-white"> <i class="fab fa-stack-overflow fa-3x m-3"></i></a>
              </div>
          </div>
          </div>
        </div>
        </div>
  
        </body>
        </html>
  ';
  return;
}

$lon = $schima->coord->lon;
$lat = $schima->coord->lat;




$nextUrl = "https://api.openweathermap.org/data/2.5/onecall?lat=$lat&lon=$lon&units=metric&appid={api key}";

$nextCon = file_get_contents($nextUrl);
$nextSchima = json_decode($nextCon);

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="style.css">

    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/d3a491f6c0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" />
    
    <title>
      Weather
    </title>

    <style>
       
    </style>
  </head>

  <body style="color: white; background-color: #38484A;">
    
    <nav class="navbar navbar-default" style="background-color: #48484A; ">
      <a class="navbar-brand text-white" href="#">
        <i class="fas fa-cloud-sun"></i>
        Weekly Weather
      </a>

      <form action="index.php" method="POST" class="form-inline my-2 my-lg-0 text-white">
        <i class="fas fa-search-location fa-lg mr-3"></i>
        <input class="form-control" placeholder="Search City Weather" name="cityName">
        <button class="btn text-white" type="submit">Search</button>
      </form>
      
    </nav>

    <div class="header-image">
      <img src="lake_forest_snow_130421_2560x1024 (2).jpg" alt="Snow" style="width:100%;">
      <div class="centered">
        <h1>Weekly Weather</h1>
        <p>We serve weekly weather data</p>
      </div>
    </div>


    <div class="container-fluid "  style=" text-align:center;">
      
      <div class="py-5 " style="background-color: #38484A;">
        <h1><i class="fas fa-map-marker-alt mr-2"></i><b><?php echo $schima->name; ?> Weather Forecast <br></b> </h1>
        <p>  <?php echo $timestamp; ?> </P>
      </div>

      

      <div class="row mt-3">
        <div class="col-lg-4 mb-5">
          <h1> Current Forecast </h1>
          <h1 class=" my-5"> <b><?php echo  $schima->main->temp . "&deg;C<br>"; ?> </b> </h1>
          <h5 class=" mb-3"> <?php echo  "Feels Like: " . $schima->main->feels_like .  "&deg; <br>Overcast: " . $schima->weather[0]->main . ".<br>" . $schima->weather[0]->description ."<br>"; ?> </h5>
         
          <h5 ><?php echo  "Temp Max : " . $schima->main->temp_max .  "&deg;C<br>"; ?>  </h5>
          <h5 ><?php echo  "Temp Min : " . $schima->main->temp_min .  "&deg;C<br>"; ?>  </h5>
          <h5 ><?php echo  "Humidity : " . $schima->main->humidity .  "%<br>"; ?>  </h5>
          <h5 ><?php echo  "Pressure : " . $schima->main->pressure .  "hPa<br>"; ?>  </h5>
          <h5 ><?php echo  "Wind Speed : " . $schima->wind->speed .  "m/s SW<br>"; ?>  </h5>
          <i class="fas fa-sun fa-3x mt-5"></i>
          <h5 class=" my-3"> <?php echo  "Sunrise: " .  date("h:i A", $schima->sys->sunrise +4*60*60) .  " <br> Sunset: " . date("h:i A", $schima->sys->sunset + 4*60*60) . "<br>"  ?> </h5>
         
        
        </div>

        <div class="col-lg-8"> 
          <div class="row">
              <div class="col-sm-6 mb-5">
                <h1> Hourly Forecast </h1>
                <div class="table-responsive-sm">
                  <table class="table table-borderless text-white mt-5">
                    <thead>
                      <tr>
                        <th scope="col">Time</th>
                        <th scope="col">Temp</th>
                        <th scope="col">Feels</th>
                        <th scope="col">Humidity</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        for ($x = 0; $x < 48; $x++) {
                          echo " <tr>
                            <th>" . date("h A", $nextSchima->hourly[$x]->dt +4*60*60) . "</th>   
                            <td class='text-center'>" . (int)$nextSchima->hourly[$x]->temp . " &deg;C</td>
                            <td class='text-center' >" . (int)$nextSchima->hourly[$x]->feels_like . " &deg;C</td>
                            <td class='text-center' >" . $nextSchima->hourly[$x]->humidity . "%</td>
                          </tr>
                          ";
                        }
                        ?> 
                    </tbody>
                  </table>
                  </div>
              </div>

              <div class="col-sm-6 mb-5">
                <h1> 7-day Forecast </h1>
                <?php
                      for ($x = 1; $x < 8; $x++) {
                        echo " <div class='mt-5'>
                          <h1>" . date("F d", $nextSchima->daily[$x]->dt +4*60*60) . "</h1>   
                          
                          <h5 class=' my-3'> Sunrise: " .  date("h:i A", $nextSchima->daily[$x]->sunrise +4*60*60) .  " <br> Sunset: " . date("h:i A", $nextSchima->daily[$x]->sunset + 4*60*60) . "<br> </h5>
                          <h5 class=' my-3'> Day Temperature: " . $nextSchima->daily[$x]->temp->day .  " &deg;C<br> Night Temperature: " . $nextSchima->daily[$x]->temp->night . "&deg;C<br>Evening Temperature: " . $nextSchima->daily[$x]->temp->eve . "&deg;C<br> Morning Temperature: " . $nextSchima->daily[$x]->temp->morn . "&deg;C<br></h5>
                          <h5 class=' my-3'> Day Feels: " . $nextSchima->daily[$x]->feels_like->day .  " &deg;C<br> Night Feels: " . $nextSchima->daily[$x]->feels_like->night . "&deg;C<br>Evening Feels: " . $nextSchima->daily[$x]->feels_like->eve . "&deg;C<br> Morning Feels: " . $nextSchima->daily[$x]->feels_like->morn . "&deg;C<br></h5>
                          <h5 class=' my-3'> Pressure: " . $nextSchima->daily[$x]->pressure .  " hPa<br> Humidity: " . $nextSchima->daily[$x]->humidity . "%<br>Wind Speed: " . $nextSchima->daily[$x]->wind_speed . " m/s SW;C<br></h5>
                          <h5 class=' my-3'> Overcast: " . $nextSchima->daily[$x]->weather[0]->main .  ".   " . $nextSchima->daily[$x]->weather[0]->description . "<br> </h5>
                          </div>
                        ";
                      }
                      ?> 
        
              </div> 

          </div>
        </div>




        
      
      </div>
      </div>                  
            <div class="footer">
            <div class="container">
              <div class="footer-text">
                <i class="far fa-envelope fa-3x"></i>
                <h2> Get Weekly Weather Update </h2>
                <p style="font-size: 15px;">Get updates on weather. We will send you weekly data via email. Feel free to Subscribe. Its 100% Free.</p>
                <div class="ui form">
                  <div class="required field">
                    <input type="text" placeholder="Your Name" class="mt-3">
                    <input type="text" placeholder="Your Email" class="mt-3">
                    <button class="fluid ui button mt-3 text-white" style="background-color: #60b0ba; border-radius: 4px; ">Subscribe</button>
                  </div>
                  <div class="mt-5 pb-5">
                    <a href="mailto:rupamsahriar@gmail.com" class=" text-white"> <i class="far fa-envelope fa-3x m-3"></i></a>
                    <a href="https://github.com/rupam71" class=" text-white"> <i class="fab fa-github fa-3x m-3"></i></a>
                    <a href="https://twitter.com/rupam_sahriar" class=" text-white"> <i class="fab fa-twitter fa-3x m-3"></i></a>
                    <a href="https://www.facebook.com/hossain.sahriarkabir.7" class=" text-white"> <i class="fab fa-facebook fa-3x m-3"></i></a>
                    <a href="https://www.linkedin.com/in/hossain-sahriar-kabir-rupam-31566a133/" class=" text-white"> <i class="fab fa-linkedin fa-3x m-3"></i></a>
                    <a href="https://stackoverflow.com/users/12461689/rupam" class=" text-white"> <i class="fab fa-stack-overflow fa-3x m-3"></i></a>
                  </div>
              </div>
              </div>
            </div>
          </div>     
      

    
  
</body>
</html>

