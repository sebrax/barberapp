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

    <div class="container-fluid">

        <div class="row mt-5">

            <div class="col-md-12">
                <h4>Admin Dashboard</h4>

                <h2 class="text-center mb-5">Recent Activities</h2>
                
                <div class="col-sm-12">
                    
                    <h4 class="text-center">Customers</h4>
                    <table class="table text-center">
                        <tr>
                            <th class="text-primary">Customer</th>
                            <th class="text-primary">Barbershop</th>
                            <th class="text-primary">Scheduled Time</th>
                        </tr>
    
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
    
                    </table>
                
                </div>
                
                <div class="col-sm-12">
                    
                    <h4 class="text-center">Barbers/Hairdressers</h4>
                    <table class="table text-center">
                        <tr>
                            <th class="text-primary">Customer</th>
                            <th class="text-primary">Barbershop</th>
                        </tr>
    
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
    
                    </table>
                
                </div>
                
                
                
                <h2 class="text-center mb-5">Bookings</h2>
                <table class="table text-center">
                    <tr>
                        <th class="text-primary">Customer</th>
                        <th class="text-primary">Barbershop</th>
                        <th class="text-primary">Scheduled Time</th>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                </table>
                
            </div>

        </div>

    </div>

</body>
</html>