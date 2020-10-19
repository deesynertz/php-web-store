<!-- logout.php -->
<?php

    // unset a session variable
    // unset($_SESSION['name']);
    // destroy anything in this session
    // if (ini_get("session.use_cookies")) {
    //     $params = session_get_cookie_params();
    //     setcookie(session_name(), '', time()-42000, 
    //         $params["path"], 
    //         $params["secure"], $params["httponly"]);
    // }
    // session_destroy();
	session_start();
	session_destroy();
	header("location: index.php");
?>





