<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
    
<?php include('layout/header-normal.php'); ?>

</header>

<body>

    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1">Barber/Hairdresser Appointment System</span>
        <p class="mb-0 h5 text-light">Hello, <?php echo $_SESSION['user'];?> | <a href="logout.php">Exit <i class="mb-0 fas fa-times"></i></a></p>
    </nav>

    <div class="container">

        <div class="row mt-5">

            <div class="col-md-12">
                <h1>Admin Dashboard</h1>
            </div>

        </div>

    </div>

</body>
</html>