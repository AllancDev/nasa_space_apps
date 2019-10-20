<?php 
    if($_SERVER['SERVER_NAME'] == 'localhost') {
        define("ENVIRONMENT", "dev");
    }  else {
        define("ENVIRONMENT", "prod");
    }

    
?>