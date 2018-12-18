<!DOCTYPE html>
<html lang="en">
    
    <?php include('layout/header-normal.php'); ?>
    
    <body>
        
    <?php
    
    include('connection.php');
    
    $search_query = $_POST['search-name']; 
    // gets value sent over search form
     
    $min_length = 0;
    // you can set minimum length of the query if you want
     
    if(strlen($search_query) >= $min_length){ // if query length is more or equal minimum length then
         
        $search_query = htmlspecialchars($search_query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $search_query = mysqli_real_escape_string($connection, $search_query);
        // makes sure nobody uses SQL injection
        
        $raw_results = "SELECT * FROM tb_business
            WHERE (`BUSSINESS_name` LIKE '%".$search_query."%') OR (`BUSSINESS_country` LIKE '%".$search_query."%')" or die(mysql_error());

        // * means that it selects all fields, you can also write: `id`, `title`, `text`
        // articles is the name of our table
         
        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
         

        $result = mysqli_query($connection, $raw_results);

        $row = mysqli_num_rows($result);

        if(($row) > 0){ // if one or more rows are returned do following
             
            while($results = mysqli_fetch_array($result)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
             
                echo "<p><h3>".$results['BUSSINESS_name']."</h3>".$results['BUSSINESS_country']."</p>";
                // posts results gotten from database(title and text) you can also show id ($results['id'])
            }
             
        }
        else{ // if there is no matching rows do following
            echo "No results";
        }
         
    }
    else{ // if query length is less than minimum
        echo "Minimum length is ".$min_length;
    }
?>

</body>
</html>