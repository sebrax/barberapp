<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('layout/header-form.php'); ?>
</head>

<body class="text-center">

    <form class="form-signin border p-3 rounded" action="login.php" method="POST">
        
        <img src="assets/images/barber.png" width="150" />
        <h1 class="h4 mb-5">Barber/Hairdresser Appointment System</h1>

        <?php if(isset($_SESSION['not_authenticated'])): ?> 
            <div class="alert alert-danger">
            <span>Oops: E-mail or Password invalid!</span>
            </div>
        <?php endif; unset($_SESSION['not_authenticated']); ?>

        <h3 class="h3 mb-3 font-weight-normal">Login</h3>

        <label class="sr-only">E-mail</label>
        <input name="user" type="email" class="form-control" placeholder="Your e-mail" autofocus="" autocomplete="off" required>
        <!-- name or e-mail? <input name="user" name="text" class="input is-large" placeholder="Your e-mail" autofocus=""> -->

        <label class="sr-only">Password</label>
        <input name="password" class="form-control" type="password" placeholder="Your password" required>

                <p class="mt-3 h4">I am:</p>
        <div class="text-left">

            <div class="form-check">
                <input class="form-check-input" type="radio" name="type" value="C" required>
                <label class="form-check-label">Client</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="type" value="O">
                <label class="form-check-label">Barber/Hairdresser</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="type" value="A">
                <label class="form-check-label">Admin</label>
            </div>
            
        </div>
        
        <button type="submit" name="submit" class="btn btn-lg btn-primary btn-block">Login <i class="fas fa-arrow-right"></i></button>
        <p>Not Yet a member? <a href="register.php">Sign Up</a></p>

    </form>

</body>

</html>