<?php include('include/head.php')?>

<?php

    session_start();

    include 'config.php';

    $email =$_SESSION['email'];
    $sql = "SELECT * FROM `company` WHERE cemail='$email'";

    $result = mysqli_query($conn, $sql);

            if ($result->num_rows > 0) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['cname'] = $row['cname'];
                $_SESSION['cemail'] = $row['cemail'];
            }
    if(isset($_POST['submit']))
    {
      $cname = $_SESSION['cname'];
      $cemail = $_SESSION['cemail'];         
      $jtitle =$_POST['jtitle'];
      $jfield =$_POST['jfield'];
      $srange =$_POST['srange'];
      $jloca =$_POST['jloca'];
      $jqua =$_POST['jqua'];
      $vacancy =$_POST['jvacancy'];
      $jdesc =$_POST['jdesc'];
      $ddue =$_POST['ddue'];
      if($_SESSION['email']==$cemail)
      {
        $insertquery="INSERT INTO `job` (`cname`, `cemail`, `jtitle`, `jfield`, `srange`, `jqua`, `jvacancy`, `ddate`, `jdesc`, `jloc`) VALUES ('$cname', '$cemail', '$jtitle', '$jfield', '$srange', '$jqua', '$vacancy', '$ddue', '$jdesc', '$jloca')";

            $res1=mysqli_query($conn,$insertquery);
            if($res1)
            {
                ?>
                <script>
                    alert("Data is inserted!!!")
                </script>
                <?php
                    header ('location: company_home.php');
      }
      else{
        ?>
        <script>
            alert("Data is not inserted!!")
        </script>
        <?php
        }
    }
  }

?>
<body>
<div>

</div>
<nav style="background-color:#fff; box-shadow:0 0 5px 0 rgba(0, 0, 0, 0.3);">
<div class="toplogo" style="padding-left:42%; padding-bottom:0.7%;">
 <img src="./img/Placemento.png" style="width:28%; height:auto;">
 </div>
</nav>
<div class="container" id="company">
  <form action="" method="post" class="company-create" enctype="multipart/form-data">
  <div class="heading">
    Post Job
  </div>
      <div class="row" >
        <div class="col-sm-12"> 
          
            <label for="jtitle" class="form-label">Job title</label>
            <input type="text" class="form-control" name="jtitle" required> <br>
            
            <label for="jfield" class="form-label">Field</label>
            <input type="text" class="form-control" list="interest" name="jfield" required> <br>
            <datalist id="interest">
                <option>Web Development</option>
                <option>Graphic Designing</option>
                <option>Aritificial Intelligence</option>
                <option>Machine Learning</option>
            </datalist>
         
            <label for="srange" class="form-label">Salary range</label>
            <input type="text" class="form-control" name="srange"> <br> 
     
            <label for="jloca" class="form-label">Job Location</label>
            <input type="text" class="form-control" name="jloca" required><br> 

            <label for="jqua" class="form-label">Qualification</label>
            <input type="text" class="form-control" name="jqua"><br> 
 
            <label for="jvacancy" class="form-label">Vaccancies</label>
            <input type="text" class="form-control" name="jvacancy" required><br> 

            <label for="jdesc" class="form-label">Job Description</label>
            <textarea type="text" class="form-control" rows="10" placeholder="Enter Responsibility of job title and job type" name="jdesc" required></textarea>
            <br>
            <label for="ddue">Last Application date</label>
              <input type="date" class="form-control" id="ddue" name="ddue" value="mm/dd/yyyy" >
              <br>
           <input class="btn btn-success" type="submit"  name="submit" value="Post It">              
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
</body>
</html>