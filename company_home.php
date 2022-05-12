<?php include('include/head.php')?>

<?php 
        session_start();
        include 'config.php';
        if($_SESSION['email'])
        {
            $email = $_SESSION['email'];
            // $query = "SELECT * FROM `company` WHERE cemail='$email'";
            // $query_run = mysqli_query($conn,$query);
            // $result = mysqli_fetch_array($query_run);
        }
        else{
            header("location:index.php");
        }
?>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background:transparent;">
        <div class="container-fluid" style="">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav" style="margin-left:50px;">
                    <img src="./img/Placemento.png" alt="Logo" class="logo"/>
                    <a class="nav-link active" aria-current="page" href="company_home.php">Home</a>
                    <a class="nav-link" href="company_dashboard.php">Dashboard</a>
                    <a class="nav-link" href="recommand_company.php">Recommendations</a>
                    <a class="nav-link" href="company_profile.php" id="icon"><i class="fa fa-user"></i></a>
                    <a href="logout.php"><input class="logout" type="submit" name="submit" value="Log Out"
                            style="background-color: black;color: #defff1;border-radius: 8px;line-height: 1.5;position: absolute;margin-top: 0.3%;padding: 0.4%;"></a>
                </div>
            </div>
        </div>
    </nav>
    <br/>
    <div class="bac">
        <div class="post-job" align="center">
            <a href="post_job.php" style="font-size:20px;width:100px;background-color:#000;color:#fff;padding:0.5%;border-radius:10px;text-decoration:none;margin:0%">Post Job</a>
        </div>
        <br><br>
        <h4 style="text-align:center;font-weight:600;">Get Your Employee</h4>
        <div class="middle">
            <nav class="navbar navbar-light"  style="background:transparent;">
                <div class="container-fluid">
                    <form class="d-flex" action="" method="POST">
                        <input class="form-control me-4" type="search" name="interest" placeholder="Search by Skill, Field" style = "" aria-label="Search" />
                        <input class="form-control me-4" type="search" name="area" placeholder="Search by Area" style = "" aria-label="Search" />
                        <input type="submit" name="submit" value="Search" style="">
                    </form>
                </div>
            </nav>
        </div>
    </div>

    <?php 
        include 'config.php';


        if(isset($_POST['submit']))
        {
            $interest=$_POST['interest'];
            $jloc=$_POST['area'];

            $query = "SELECT * FROM `employee` WHERE (interest1 like '%$interest%' || interest2 like '%$interest%' || interest3 like '%$interest%' || about like '%$interest%' || experience like '%$interest%') && city like '%$jloc%' ";
            
            $query_run = mysqli_query($conn,$query);

            if(mysqli_num_rows($query_run) > 0)
            {
                while($row = mysqli_fetch_assoc($query_run))
                {
                    ?>
                    <div class="card-group row">
                        <div class="card" style="">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['ename'];?></h5>
                                <a href="./view_profile.php?id=<?php echo $row['emp_id'];?>" class="btn btn-primary side">View Profile</a>
                                <h6 class="card-title2"><?php echo $row['city'];?></h6>
                                <h6 class="card-title2"><?php echo $row['eemail'];?></h6>
                                <p class="card-text">Area Of Interest : <?php echo $row['interest1'];?>, <?php echo $row['interest2'];?>, <?php echo $row['interest3'];?></p>
                            </div>
                        </div>
                    </div> 
                    <br/> 
                <?php              
                }
            }
        }    
             
    ?>


    <br/>
    <br/>    

    <div class="footer">
        <div class="footer-content">
            Placemento
            <br>
            For contact <br>
            +912134567889 <br>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>