<?php include('include/head.php')?>

<?php

    session_start();

    include 'config.php';

    if(isset($_POST['submit']))
    {
      $cname =$_POST['cname'];
      $cindustry =$_POST['cindustry'];
      $cfounded =$_POST['cfounded'];
      $cceo =$_POST['cceo'];
      $clocation =$_POST['clocation'];
      $cemail =$_POST['cemail'];
      $ccontact =$_POST['ccontact'];
      $cdescription =$_POST['cdescription'];
      $cprofilepic=$_FILES['cprofilepic'];
      $filename=$cprofilepic['name'];
      $filepath=$cprofilepic['tmp_name'];
      $fileerror=$cprofilepic['error'];
      $filetype=$cprofilepic['type'];
      $fileExt=explode('.',$filename);
      $fileactualExt=strtolower(end($fileExt));//12:22 pela
      $allowed=array('jpg','jpeg','png');//pdf allowed krvu hoy to
      if(in_array($fileactualExt,$allowed)&&$_SESSION['email']==$cemail)
      {
        if($fileerror==0)
        {
          if($filesize<1000000)
          {
            $destfile='upload/'.$filename;
            move_uploaded_file($filepath,$destfile);
            $sql= "INSERT INTO `company` (`cname`, `cindustry`, `cfounded`, `cceo`, `clocation`, `cemail`, `ccontact`, `cprofilepic`, `cdescription`) VALUES ('$cname', '$cindustry', '$cfounded', '$cceo', '$clocation', '$cemail', '$ccontact', '$destfile', '$cdescription')";
            $res1=mysqli_query($conn,$sql);
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
                alert("You cannot upload file of this extension. Please upload it in jpg, jpeg or png form.")
          </script>
          <?php
        }
      }
      else{
        ?>
        <script>
            alert("Please, Enter Your Registered Mailid!!")
        </script>
        <?php
        }
    }
?>

<body>
<div>

</div>
<nav style="background-color:#fff; box-shadow:0 0 5px 0 rgba(0, 0, 0, 0.3);">
<div class="toplogo" style="padding-left:42%; padding-bottom:0.7%;">
 <img src="./IMG/Placemento.png" style="width:28%; height:auto;">
 </div>
</nav>
<div class="container" id="company">
  <form action="" method="post" class="company-create" enctype="multipart/form-data">
  <div class="heading">
    Company Profile
  </div>
      <div class="row" >
        <div class="col-sm-12">
            <label for="name" class="form-label">Company Name</label>
            <input type="text" class="form-control" name="cname"  required>   <br>   
          
            <label for="cindustry" class="form-label">Industry</label>
            <input type="text" class="form-control" name="cindustry" required><br> 
          
            <label for="cfounded" class="form-label">Founded on (Year)</label>
            <input type="text" class="form-control" name="cfounded" required> <br>   
         
            <label for="cceo" class="form-label">CEO Name</label>
            <input type="text" class="form-control" name="cceo"> <br> 
     
            <label for="clocation" class="form-label">Location</label>
            <input type="text" class="form-control" name="clocation"><br> 
 
            <label for="cemail" class="form-label">Email</label>
            <input type="text" class="form-control" name="cemail" required><br> 
  
            <label for="ccontact" class="form-label" >Contanct No.</label>
            <input type="text" class="form-control" name="ccontact" required><br> 
            <label for="cprofilepic">Company Logo: &nbsp; &nbsp;</label>
            <input type="file" name="cprofilepic">
           <br> 
            <label for="cdescription" class="form-label">Description</label>
            <textarea type="text" class="form-control" rows="10"  name="cdescription"></textarea>
            <br>
           <input class="btn btn-success" type="submit"  name="submit" value="Create Profile">              
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
</body>
</html>













