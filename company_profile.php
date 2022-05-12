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

<?php 
        include 'config.php';

        $email = $_SESSION['email'];
        $query = "SELECT * FROM `company` WHERE cemail ='$email'";
        $query_run = mysqli_query($conn,$query);
        $result = mysqli_fetch_array($query_run);

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
                        <a class="nav-link" aria-current="page" href="company_home.php">Home</a>
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
        <div class="mainprofile">
        <div class="profile">
        <img src="<?php echo $result['cprofilepic'];?>" alt="my-profile image" class="profile_image">
        <br/>
        <br/>
        <div class="profile_name">
        <?php echo $result['cname'];?>
        </div>
        <div class="profile_detail">
        <h6><?php echo $result['cindustry'];?></h6>
        </div>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <div class="profile_detail">
            <h4>Company Founded on :
            <?php echo $result['cfounded'];?>
            </h4>
        </div>
        <div class="profile_detail">
            <h4>CEO :
            <span class="desc"><?php echo $result['cceo'];?></span>
            </h4>
        </div>
        <div class="profile_detail">
            <h4>Company Location :
            <span class="desc"><?php echo $result['clocation'];?></span>
            </h4>
        </div>
        <div class="profile_detail">
            <h4>Company Official Mail :
            <span class="desc"><?php echo $result['cemail'];?></span>
            </h4>
        </div>
        <div class="profile_detail">
            <h4>Company Contact No. :
            <span class="desc"><?php echo $result['ccontact'];?></span>
            </h4>
        </div>
        <div class="profile_detail">
            <h4>Company Description :
            <span class="desc"><?php echo $result['cdescription'];?></span>
            </h4>
        </div> 
        </div>
        </div>
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