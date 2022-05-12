<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Placemento</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">    


    <link href="./img/Favicon.png" rel="icon">

    <link rel="stylesheet" href="./home.css">
    <link rel="stylesheet" href="./style.css">

</head>

<?php

    session_start();

    include 'config.php';

    $jobid = $_GET['id'];
    //echo $jobid;

    if(isset($_POST['submit']))
    {
      // $jobid = $_SESSION['jobid'];
      $ename =$_POST['ename'];
      $eemail =$_POST['eemail'];
      $econtact =$_POST['econtact'];
      $eloca =$_POST['eloca'];
      $pjexp =$_POST['pjexp'];
      $pcompany =$_POST['pcompany'];
      $eresume=$_FILES['eresume'];
      $filename=$eresume['name'];
      $filepath=$eresume['tmp_name'];
      $fileerror=$eresume['error'];
      $filesize=$eresume['size'];
      $filetype=$eresume['type'];
      $fileExt=explode('.',$filename);
      $fileactualExt=strtolower(end($fileExt));//12:22 pela
      $allowed=array('pdf');//pdf allowed krvu hoy to
      if(in_array($fileactualExt,$allowed)&&$_SESSION['email']==$eemail)
      {
            if($fileerror==0)
            {
              if($filesize<1000000)
              {
                    $filenamenew=uniqid('',true).".".$fileactualExt;
                    $destfile='resume/'.$filenamenew;
                    move_uploaded_file($filepath,$destfile);
                    $sql= "INSERT INTO `apply`(`jobid`,`ename`, `eemail`, `econtact`, `eloca`, `pjexp`, `pcompany`, `eresume`,`date`)
                      VALUES ('$jobid','$ename','$eemail','$econtact','$eloca','$pjexp','$pcompany','$destfile',sysdate())";
                    $res1=mysqli_query($conn,$sql);
                    if($res1)
                    {
                      ?>
                      <script>
                        alert("Data is inserted!!!")
                      </script>
                      <?php
                        header ('location: employee_home.php');
                    }
                    else{
                    ?>
                    <script>
                        alert("Data is not inserted!!")
                    </script> 
                    <?php 
                  }
              }
              else{
                ?>
                <script>
                alert("File size is too big.")
                </script>
                <?php
              }
            } 
          else{
              ?>
              <script>
              alert("You cannot upload file of this extension. Please upload it in pdf form.")
              </script>
              <?php
            }
        }
        else
        {
          ?>
            <script>
                alert("Please, Enter Your Registered Mailid!!")
            </script>
          <?php
        }
    }
?>

<body>
    <nav style="background-color:#fff; box-shadow:0 0 5px 0 rgba(0, 0, 0, 0.3);">
        <div class="toplogo" style="padding-left:42%; padding-bottom:0.7%;">
        <img src="./img/Placemento.png" style="width:28%; height:auto;">
        </div>
    </nav>
<br/>
<div class="Job-desc">
  <?php
        $sql2 = "SELECT * FROM `job` WHERE jobid='$jobid'";
          
        $result = mysqli_query($conn, $sql2);

        if(mysqli_num_rows($result) > 0)
          {
              while($row = mysqli_fetch_assoc($result))
              {
                  ?>
                  <div class="desc-body">
                    <h2><?php echo $row['cname'];?></h2>
                    <h3><?php echo $row['jloc'];?></h3>
                    <h4>Job Title : <?php echo $row['jtitle'];?></h4>
                    <h4>Job Field : <?php echo $row['jfield'];?></h4>
                    <h5>Salary Range : <?php echo $row['srange'];?></h5>
                    <h5>Job Qualification : <?php echo $row['jqua'];?></h5>
                    <h5>Due Date : <?php echo $row['ddate'];?></h5>
                    <p>Job Description : <?php echo $row['jdesc'];?></p>
                  </div> 
              <?php              
              }
          }
  ?>
  </div>
  <br/>
<div class="container" id="company">
  <form action="" method="post" class="company-create" enctype="multipart/form-data">

  <div class="heading">
    Application Form
  </div>
      <div class="row" >
        <div class="col-sm-12">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" name="ename"  required>   <br>   
          
            <label for="eemail" class="form-label">Email ID</label>
            <input type="text" class="form-control" name="eemail" required><br> 

            <label for="econtact" class="form-label" >Contanct No.</label>
            <input type="text" class="form-control" name="econtact" required><br> 
          
            <label for="eloca" class="form-label">Current location </label>
            <input type="text" class="form-control" name="eloca" required> <br>   
         
            <label for="pjexp" class="form-label">Past Job title</label>
            <input type="text" class="form-control" name="pjexp"> <br> 
     
            <label for="pcompany" class="form-label">Past Company Name</label>
            <input type="text" class="form-control" name="pcompany"><br> 

            <label for="eresume">Upload Resume/CV: &nbsp; &nbsp;</label>
            <input type="file" name="eresume"><br/>
            <br/> 

           <input class="btn btn-success" type="submit"  name="submit" value="Apply Now">              
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
<br/>
</body>
</html>