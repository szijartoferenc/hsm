<?php 
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Összes jelentés</title>
</head>
<body>
    <?php 
    include("../include/header.php");

    include("../include/connection.php");
    
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
        <div class="row">
        <div class="col-md-2" style="margin-left:-30px;">
    
            <?php 
            
            include("navside.php");
            
            ?>

        </div>
        <div class="col-md-10">
            <h5 class="text-center">Összes jelentés</h5>
        <?php 
        
        $query = "SELECT * FROM report";

        $result = mysqli_query($conn, $query);



        $output ="";



        $output .="
        
                <table class='table table-bordered'>  
                
                    <tr>
                    <th>ID</th>
                    <th>Tárgy</th>
                    <th>Üzenet</th>
                    <th>Felhasználónév</th>
                    <th>Üzenetküldés ideje</th>
                    </tr>       
         
        ";
        
        
        if (mysqli_num_rows($result) < 1) {
            $output .="
             <tr>
             <td colspan='6'class='text-center'>Nincs már több jelentés</td>
             
             </tr>
            
            ";
        }
        
        while ($row = mysqli_fetch_array($result)) {
        $output .="
           <tr>
           <td>".$row['id']."</td>
           <td>".$row['title']."</td>
           <td>".$row['message']."</td>
           <td>".$row['username']."</td>
           <td>".$row['date_send']."</td>
           
           
        
        ";
        
        
        }
        
        $output.= "
        </tr>
        </table>
        ";
        
        echo $output;
        



        
        ?>


        </div>

        </div>
        </div>
       
    </div>
</body>
</html>

