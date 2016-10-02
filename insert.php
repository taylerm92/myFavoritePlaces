<?php
  $con = new mysqli("localhost","root","root","myfavoriteplaces"); //sets up the sql connection_aborted

  if($con->connect_error) //if there was a problem with connecting then:
  {
    echo "Failed to connect to MySQL:".$con->connect_error; //show the error
  }
  else
  {
    echo "You are connected to database"."<br>"; //show that you are connected to database
  }

  if ( isset($_POST['placeName']))
  {
    $address = urlencode($_POST['streetAddress']);
    $url = 'http://maps.googleapis.com/maps/api/geocode/json?address='.$address.'&sensor=false';
    $geocode = file_get_contents($url);
    $results = json_decode($geocode, true);
    if($results['status']=='OK')
    {
      $lat = $results['results'][0]['geometry']['location']['lat'];
      $lng = $results['results'][0]['geometry']['location']['lng'];
    }
    else
    {
      echo 'You have already marked that address!';
    }

    $placeName = $_POST['placeName'];
    $description = $_POST['description'];

    $sql = "INSERT INTO myfavoriteplaces(name, lat, lng, description)
            VALUES ('$placeName','$lat','$lng','$description')"; //sql query to insert into database

    /*$sql = "DELETE FROM myFavoritePlaces";*/
    if($con->query($sql) == false)
    {
      ?>
        <script>alert("Couldn't insert into database!")</script>
      <?php
    }
    header('Location: index.php');
  }
?>
