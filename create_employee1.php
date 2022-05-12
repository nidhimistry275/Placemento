<?php include('include/head.php')?>

<?php

session_start();

include 'config.php';

if(isset($_POST['submit']))
{
    $ename=$_POST['ename'];
    $city=$_POST['city'];
    $contactno=$_POST['contactno'];
    $emailid=$_POST['emailid'];
    $dob=$_POST['dob'];
    $interest1=$_POST['interest1'];
    $interest2=$_POST['interest2'];
    $interest3=$_POST['interest3'];
    $experience=$_POST['experience'];
    $about=$_POST['about'];
    $education=$_POST['education'];
    $profilepic=$_FILES['profilepic'];
    $filename=$profilepic['name'];
    $filepath=$profilepic['tmp_name'];
    $filesize=$profilepic['size'];
    $fileerror=$profilepic['error'];
    $filetype=$profilepic['type'];
    $fileExt=explode('.',$filename);
    $fileactualExt=strtolower(end($fileExt));//12:22 pela
    $allowed=array('jpg','jpeg','png');//pdf allowed krvu hoy to
    if(in_array($fileactualExt,$allowed) && $_SESSION['email']==$emailid)
    {
        if($fileerror==0)
        {
            if($filesize<1000000)
            {
                $filenamenew=uniqid('',true).".".$fileactualExt;
                $destfile='upload/'.$filenamenew;
                move_uploaded_file($filepath,$destfile);
                
                if($interest2==NULL){
                    $interest2 = "None";
                }
                if($interest3==NULL){
                    $interest3 = "None";
                }

                $insertquery3="INSERT INTO `employee`(`ename`, `city`, `contactno`, `eemail`, `dob`, `interest1`, `interest2`, `interest3`, `experience`, `about`, `education`, `profilepic`)
                VALUES ('$ename','$city','$contactno','$emailid','$dob','$interest1','$interest2','$interest3','$experience','$about','$education','$destfile')";

                $res1=mysqli_query($conn,$insertquery3);

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
    <nav style="background-color:#fff; box-shadow:0 0 5px 0 rgba(0, 0, 0, 0.3);">
        <div class="toplogo" style="padding-left:42%; padding-bottom:0.7%;">
            <img src="./IMG/Placemento.png" style="width:28%; height:auto;">
        </div>
    </nav>
    <div class="container"  id="company">
        <form action="" method="POST" enctype="multipart/form-data" class="company-create">
        <div class="heading">
            Create Your Profile
        </div>
        <div class="row" >
            <div class="col-sm-12">
              <label for="ename" class="form-label" >Your name *</label>
              <input type="text" class="form-control" class="form-control" id="ename" name="ename" required autocomplete="off">
              <h5 id="usercheck"></h5>
              <br/>
              
              <label for="city" class="form-label">City *</label>
              <input type="text" class="form-control" id="city" name="city" required autocomplete="off">
              <h5 id="citycheck"></h5>
              <br/>
              
              <label for="contactno" class="form-label">Contact no *</label>
              <input type="text" class="form-control" id="contactno" name="contactno" required autocomplete="off">
              <h5 id="contactcheck"></h5>
              <br/>

              <label for="emailid" class="form-label">E-mail</label>
              <input type="email" class="form-control" id="emailid" name="emailid" required>
              <br/>

              <label for="dob" class="form-label">Date of Birth</label>
              <input type="date" class="form-control" id="dob" name="dob" value="mm/dd/yyyy" required>
              <br/>

              <label for="interest1" class="form-label">Area of Interest *</label>
              <input type="text" class="form-control" id="interest1" list="interest" name="interest1" required autocomplete="off">
              <datalist id="interest">
                <option>Web Development</option>
                <option>Graphic Designing</option>
                <option>Aritificial Intelligence</option>
                <option>Machine Learning</option>
              </datalist>      
              <br/>

              <label for="interest2" class="form-label">Another are of inerest want to ad</label>
              <input type="text" class="form-control" id="interest2" list="interest" name="interest2">
              <br/>

              <label for="interest3" class="form-label">Another are of inerest want to ad</label>
              <input type="text" class="form-control" id="interest3" list="interest" name="interest3">
              <br/>

              <label for="experience" class="form-label">Work-Experience</label>
              <input type="text" class="form-control" id="experience" name="experience">
              <br/>

              <label for="about" class="form-label">About Yourself</label>
              <textarea id="about" class="form-control" name="about"></textarea>
              <br/>

              <label for="education" class="form-label">Educational-Info</label>
              <textarea id="education" class="form-control" name="education"></textarea>
              <br/>

              <label for="profilepic" class="form-label">Upload Profile Picture *: &nbsp;&nbsp;</label>
              <input type="file" name="profilepic">
              <br/>
              <br/>
              
              <input class="btn btn-success" type="submit" name="submit" value="Create Profile">
              <br/> 
        </div>
        </form>
    </div>
    <script>
        $(document).ready(function(){
            $("#usercheck").hide();
            $("#citycheck").hide();
            $("#contactcheck").hide();

            var user_err = true;
            var city_err = true;
            var contact_err = true;

            $('#ename').keyup(function(){
                username_check();
                check_char();
            });


            function check_char(){
                var pattern = /^[a-zA-Z]*$/;
                var user_val = $('#ename').val();
                //alert(user_val);

                if(!pattern.test(user_val)){
                    $('#usercheck').show();
                    $('#usercheck').html("Please Fill with Only Characters");
                    $('#usercheck').focus();
                    $('#usercheck').css("color","red");
                    user_err = false;
                    return false;
                }
                else{
                    $('#usercheck').hide();
                }

            }

            function username_check(){
                var user_val = $('#ename').val();
                //alert(user_val);

                if(user_val.length == ''){
                    $('#usercheck').show();
                    $('#usercheck').html("Please Fill The Name");
                    $('#usercheck').focus();
                    $('#usercheck').css("color","red");
                    user_err = false;
                    return false;
                }
                else{
                    $('#usercheck').hide();
                }

            }

            $('#city').keyup(function(){
                check_city();
                // city_check();
            });

            function check_city(){
                var pattern = /^[a-zA-Z]*$/;
                var user_val = $('#city').val();
                // alert(user_val);

                if(!pattern.test(user_val)){
                    $('#citycheck').show();
                    $('#citycheck').html("Please Fill with Only Characters");
                    $('#citycheck').focus();
                    $('#citycheck').css("color","red");
                    city_err = false;
                    return false;
                }
                else{
                    $('#citycheck').hide();
                }

            }


            // function city_check(){
            //     var user_val = $('#city').val();
            //     //alert(user_val);

            //     if(user_val.length == ''){
            //         $('#citycheck').show();
            //         $('#citycheck').html("Please Fill City");
            //         $('#citycheck').focus();
            //         $('#citycheck').css("color","red");
            //         city_err = false;
            //         return false;
            //     }
            //     else{
            //         $('#citycheck').hide();
            //     }

            // }


            $('#contactno').keyup(function(){
                check_contact();
                //contact_check();
            });

            function check_contact(){
                var pattern = /^[0-9]*$/;
                var user_val = $('#contactno').val();
                //alert(user_val);

                if(!pattern.test(user_val)){
                    $('#contactcheck').show();
                    $('#contactcheck').html("Please Fill with Numericals Only.");
                    $('#contactcheck').focus();
                    $('#contactcheck').css("color","red");
                    contact_err = false;
                    return false;
                }
                else{
                    $('#contactcheck').hide();
                }

            }

            // function contact_check(){
            //     var user_val = $('#contactno').val();
            //     //alert(user_val);

            //     if(user_val.length == ''){
            //         $('#contactcheck').show();
            //         $('#contactcheck').html("Please Fill Contact");
            //         $('#contactcheck').focus();
            //         $('#contactcheck').css("color","red");
            //         contact_err = false;
            //         return false;
            //     }
            //     else{
            //         $('#contactcheck').hide();
            //     }

            // }

            
               


        });
    </script>

</body>
</html>