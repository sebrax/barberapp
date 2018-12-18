<?php
session_start();
include('verify_login.php');

if(isset($_POST['search']))
{
    $value_to_search = $_POST['search-query'];
    $query = "SELECT * FROM tb_business WHERE CONCAT(`BUSSINESS_name`, `BUSSINESS_type`, `BUSSINESS_country`, `BUSSINESS_address`) LIKE '%".$value_to_search."%'";
    $search_result = filterTable($query);
} else {
    $query = "SELECT * FROM tb_business";
    $search_result = filterTable($query);
}

function filterTable($query)
{
    include('connection.php');
    $filter_result = mysqli_query($connection, $query);
    return $filter_result;
}

?>

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

            <div class="col-md-2 border-right">

                <h5 class="mb-3 text-center">Search a Barber or Hairdresser by Name, type country or city</h5>
                
                <form action="user-dashboard.php" method="post">
                    <input type="search" name="search-query" class="form-control" placeholder="Search..." autocomplete="off" autofocus="" />
                    
                    <button type="submit" name="search" class="mt-2 btn btn-primary btn-block">
                        Search <i class="fas fa-search"></i>
                    </button>
                </form>

            </div>
            
            <div class="col-md-10">
                <h1 class="mb-3 text-center">Barbers and Hairdressers</h1>

                <div>
                    <table class="table">
                        
                        <tr>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Country</th>
                            <th>City</th>
                        </tr>

                        <?php while($row = mysqli_fetch_array($search_result)):?>
                        <tr>
                            <td><?php echo $row['BUSSINESS_name'];?></td>
                            <td><?php echo $row['BUSSINESS_type'];?></td>
                            <td><?php echo $row['BUSSINESS_country'];?></td>
                            <td><?php echo $row['BUSSINESS_address'];?></td>
                        </tr>
                        <?php endwhile; ?>

                    </table>
                </div>

            </div>

        </div>

    </div>

</body>
</html>