<?php

// logout function
unset($_SESSION['user']);
header('Location: index.php');
exit();


// redirect if not logged in
if(!$_SESSION['user']) {
    header('Location: index.php');
    exit();
}