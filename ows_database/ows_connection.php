<!-- ows_connection.php -->
<?php

    $SERVER_NAME    = "127.0.0.1";
    $HOST_NAME      = "root";
    $PASSWORD       = "";
    $DB_NAME        = "onlinewebstore";

    $ows_conn = mysqli_connect($SERVER_NAME, $HOST_NAME, $PASSWORD, $DB_NAME);


	if ($ows_conn) {
		$conn_feedback = "$DB_NAME CONNECTED ";
		return $conn_feedback;
	} else {
		
		$conn_feedback = "$DB_NAME NOT CONNECTED";
		return $conn_feedback;
	}


	




?>