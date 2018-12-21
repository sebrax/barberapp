<?php
session_start(); 
require_once('connection.php');

if (isset($_POST['email']) && isset($_POST['password_1'])) {
    
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password_1']);
    $hashed_pass = password_hash($password, PASSWORD_BCRYPT);
    $type = mysqli_real_escape_string($connection, $_POST['type']);


    if ($_POST['type'] == 'C') {
        $query = "INSERT INTO tb_client (CLIENT_name, CLIENT_email, CLIENT_password, CLIENT_type) VALUES ('$name', '$email', '$hashed_pass', '$type')";
    } elseif ($_POST['type'] == 'O') {
        $query = "INSERT INTO tb_owner (OWNER_name, OWNER_email, OWNER_password, OWNER_type) VALUES ('$name', '$email', MD5('$password'), '$type')";
    }

    $result = mysqli_query($connection, $query);
    if($result && $_POST['type'] == 'C') {
        $smsg = "User created successfully";
    }
    elseif ($result && $_POST['type'] == 'C') {
        $smsg = "Barber/Hairdresser created successfully";
    }
        
    else { $fmsg = "Registration has failed. Please try again."; }

}
?>
<!DOCTYPE html>
<html>

<head>
    <?php include('layout/header-form.php'); ?>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body class="text-center">
    <form class="form-signin" action="register.php" method="POST">
    
    <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
    <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>

        <h1 class="h4 mb-5">Barber/Hairdresser Appointment System</h1>
        <h3 class="h3 mb-3 font-weight-normal">Register</h3>

        <label class="sr-only">Name</label>
        <input name="name" type="text" class="form-control" placeholder="Your name" autofocus="">

        <label class="sr-only">E-Mail</label>
        <input name="email" type="text" class="form-control" placeholder="Your e-mail">

        <label class="sr-only">Password</label>
        <input name="password_1" class="form-control" type="password" placeholder="Your password">

        <label class="sr-only">Confirm your Password</label>
        <input name="password_2" class="form-control" type="password" placeholder="Confirm your password">

        <h5>I am:</h5>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="type" value="C">
            <label class="form-check-label">Client</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="type" value="O">
            <label class="form-check-label">Barber/Hairdresser</label>
        </div>

        <div class="g-recaptcha" data-sitekey="6Lf5sYIUAAAAAJq1GLVSgvnhxpH8edwoABtaG0i9"></div>
        
        <button type="submit" class="btn btn-lg btn-primary btn-block">Register</button>
        <p>Already a member? <a href="index.php">Login</a></p>
        
    </form>

</body>

</html>