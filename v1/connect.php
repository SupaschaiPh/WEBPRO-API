<?php
define("CONFIG", parse_ini_file(__DIR__."/../config.ini"));
$conn = mysqli_connect(CONFIG["HOST"], CONFIG["DB_USERNAME"], CONFIG["DB_PASSWORD"],CONFIG["DB_MAIN_NAME"],CONFIG["PORT"] ? intval(CONFIG["PORT"]) : null );

