<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="refresh" content="5" >
    <link rel="stylesheet" type="text/css" href="style.css" media="screen"/>

	<title> Historique de mesure </title>

</head>

<body>

    <h1>Humidite de sol</h1>
    <?php
        // set connection arguments
        $servername = "localhost";
        $username = "abdelilah";
        $password = "NEXTRONIC@2022";
        $dbname = "base";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // select items to display from the table in the data base
        $sql = "SELECT id, humidite_sol, datemesure FROM humidite ORDER BY id ";

        // design the web page table
        echo '<table cellspacing="5" cellpadding="5">
            <tr> 
                <th>ID</th>
                <th>Humidite de sol</thh> 
                <th>Date de mesure</th>       
            </tr>';

        // fill the web page table
        if ($result = $conn->query($sql)) {
            while ($row = $result->fetch_assoc()) {
                $row_id = $row["id"];
                $row_humidity = $row["humidite_sol"];
                $row_date = $row["datemesure"];
                
                // set timezone to + 1 hour
                $row_time = date("Y-m-d H:i:s", strtotime("$row_date + 1 hours"));
            
                echo '<tr> 
                        <td>' . $row_id . '</td> 
                        <td>' . $row_humidity . '</td> 
                        <td>' . $row_time . '</td> 
                    </tr>';
            }
            $result->free();
        }

        $conn->close();
    ?> 
</table>

</body>
</html>

	</body>
</html>