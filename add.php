<?php  

include 'config.php';

$jobid = $_GET['id'];
//echo $jobid;
// $_SESSION['jobid'] = $jobid;

// $sql = "SELECT * FROM questions";
// $result = mysqli_query($conn, $sql);

$query = "SELECT * FROM questions";
$n = mysqli_num_rows(mysqli_query($conn,$query));

if(isset($_POST['submit']) && $n!=1000)
{
	$question_number = $_POST['question_number'];
	$question_text = $_POST['question_text'];
	$correct_choice = $_POST['correct_choice'];

	// Choice Array
	$choice = array();
	$choice[1] = $_POST['choice1'];
	$choice[2] = $_POST['choice2'];
	$choice[3] = $_POST['choice3'];
	$choice[4] = $_POST['choice4'];
	$choice[5] = $_POST['choice5'];

    $query = "INSERT INTO `questions` (`question_number`, `question_text`, `jobid`) VALUES ('$question_number', '$question_text', '$jobid');";

	$result = mysqli_query($conn,$query);
	
	//Validate First Query
	if($result){
		foreach($choice as $option => $value){
			if($value != ""){
				if($correct_choice == $option){
					$is_correct = 1;
				}else{
					$is_correct = 0;
				}
			
				//Second Query for Choices Table
				$query = "INSERT INTO options (";
				$query .= "question_number,is_correct,coption)";
				$query .= " VALUES (";
				$query .=  "'{$question_number}','{$is_correct}','{$value}' ";
				$query .= ")";

				$insert_row = mysqli_query($conn,$query);
				// Validate Insertion of Choices

				if($insert_row){
					continue;
				}else{
					die("2nd Query for Choices could not be executed" . $query);
					
				}

			}
		}
		$message = "Question has been added successfully";
	}	

}


		$query = "SELECT * FROM questions";
		$questions = mysqli_query($conn,$query);
		$total = mysqli_num_rows($questions);
		$next = $total+1;
		

?>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="wnameth=device-wnameth, initial-scale=1">
    <title>Take Quiz</title>
    <link href="./img/Favicon.png" rel="icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="Untitled.css">
</head>
<body>
<nav style="min-width:200px;background-color:#fff; box-shadow:0 0 5px 0 rgba(0, 0, 0, 0.3);">
<div class="toplogo" style="padding-left:42%; padding-bottom:0.7%;">
 <img src="./img/Placemento.png" style="width:28%; height:auto;">
 </div>
</nav>
<div class="container" >
  <form action="" method="POST" class="test">
  <div class="heading">
    Apptitude test
  </div>
	<?php if(isset($message)){
		echo "<h4>" . $message . "</h4>";
	} ?>
	<div class="row" >
        <div class="col-sm-12">
		<label>Question Number:</label>
		<input type="number"class="form-control" name="question_number" value="<?php echo $next;  ?>"><br>
		<div class="form-group row">
           <label>Question</label>  
              <textarea class="form-control" name="question_text" required id="editor1"></textarea>
            </div>
		<label>Choice 1:</label>
			<input type="text"class="form-control" name="choice1"><br>
		<label>Choice 2:</label>
			<input type="text" class="form-control" name="choice2"><br>
		<label>Choice 3:</label>
			<input type="text"class="form-control"  name="choice3"><br>
		<label>Choice 4:</label>
			<input type="text"class="form-control" name="choice4"><br>
		<label>Choice 5:</label>
			<input type="text"class="form-control"  name="choice5"><br>
		<label>Correct Option Number</label>
			<input type="number" class="form-control" name="correct_choice"><br>
			<div class="button">
<input class="btn btn-success" type="submit"  name="submit" value="Add Question"> 

<a href="company_dashboard.php" class="btn btn-success" role="button">Finish</a>
</div>
	</form>
</div>
</body>
<script>
  CKEDITOR.replace( 'editor1' );
</script>
</html>