<?php
define('HOST', '127.0.0.1');
define('USER', 'root');
define('PASSWORD', '');
define('DB', 'barberapp');


$connection = mysqli_connect(HOST, USER, PASSWORD, DB) or die ('Error connecting to database');