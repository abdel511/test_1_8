<?php

   if(isset($_GET["humidite_du_sol"])) {
      // get humidity value from HTTP GET
      $humidite = $_GET["humidite_du_sol"];
      
      // set arguments for the connection
      $servername = "bzt2zbszslggjs67estm-mysql.services.clever-cloud.com";
      $username = "un7qd7b8eakv6nde";
      $password = "FN5aiwXrW7ArAmeJbLrv";
      $dbname = "bzt2zbszslggjs67estm";

      // Create MySQL connection fom PHP to MySQL server
      $connection = new mysqli($servername, $username, $password, $database_name);

      // Check connection
      if ($connection->connect_error) {
         die("MySQL connection failed: " . $connection->connect_error);
      }

      // insert values into the database table
      $sql = "INSERT INTO humidite (humidite_sol) VALUES ($humidite)";

      // check insertion
      if ($connection->query($sql) === TRUE) {
         echo "New record created successfully";
      } else {
         echo "Error: " . $sql . " => " . $connection->error;
      }

      // close connection
      $connection->close();

   } else {
      echo "humidity is not set in the HTTP request";
   }

?>