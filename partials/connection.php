<?php
// Connect to the database
        $servername= "localhost";
        $username= "root";
        $password= "";
        $database= "library";

        //create a connection
        $conn = mysqli_connect($servername, $username, $password, $database );
        if(!$conn){
            die("Sorry we fail to connect.". mysqli_connect_error());
        }
?>