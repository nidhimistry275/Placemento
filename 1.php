
<?php 
        session_start();
        include 'config.php';

        if($_SESSION['email']==true)
        {
            echo $_SESSION['email'];
        }    

        $email = $_SESSION['email'];
        $query = "SELECT * FROM employee WHERE eemail ='$email'";
        $query_run = mysqli_query($conn,$query);
        $row = mysqli_fetch_array($query_run);

        echo $row['ename'];
        echo $row['city'];
            

             
    ?>