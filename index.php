<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>Nisit Kasetsart</title>
		<meta name="description" content="Free Bootstrap 4 Template by uicookies.com">
		<meta name="keywords" content="Free website templates, Free bootstrap themes, Free template, Free bootstrap, Free website template">
    
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text:400,400i,600|Montserrat:200,300,400" rel="stylesheet">

		<link rel="stylesheet" href="assets/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="assets/fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/law-icons/font/flaticon.css">

    <link rel="stylesheet" href="assets/fonts/fontawesome/css/font-awesome.min.css">
    
    
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/slick-theme.css">

    <link rel="stylesheet" href="assets/css/helpers.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/landing-2.css">
	</head>
	<body data-spy="scroll" data-target="#pb-navbar" data-offset="200" class="bg">
    <nav class="navbar navbar-expand-lg navbar-dark pb_navbar pb_scrolled-light" id="pb-navbar">
      <div class="container">
        </div>
      </div>
    </nav>
    <!-- END nav -->

<?php
// define variables 
$firstname = $lastname = $email = $year = $faculty = $tel = "";
$firstnameErr = $lastnameErr = $emailErr = $yearErr = $facultyErr = $telErr = $file1Err = $file2Err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstname"])) {
    $firstnameErr = "Firstname is required";
  } else {
    $firstname = test_input($_POST["firstname"]);
    // check if firstname only contains letters
    if (!preg_match("/^[a-zA-Z]*$/",$firstname)) {
      $firstname = "";
      $firstnameErr = "Only letters allowed"; 
    }
  }
  
  if (empty($_POST["lastname"])) {
    $lastnameErr = "Lastname is required";
  } else {
    $lastname = test_input($_POST["lastname"]);
    // check if lastname only contains letters
    if (!preg_match("/^[a-zA-Z]*$/",$lastname)) {
      $lastname = "";
      $lastnameErr = "Only letters allowed"; 
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $lastname = "";
      $emailErr = "Invalid email format"; 
    }
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if (empty($_POST["year"])) {
    $yearErr = "Year is required";
  } else {
    $year = test_input($_POST["year"]);
  }

  if (empty($_POST["faculty"])) {
    $facultyErr = "faculty is required";
  } else {
    $faculty = test_input($_POST["faculty"]);
  }

  if (empty($_POST["tel"])) {
    $telErr = "Tel is required";
  } else {
    $tel = test_input($_POST["tel"]);
    // check if tel only contains number
    if (!preg_match("/^[0-9]*$/",$tel)) {
      $tel = "";
      $telErr = "Only numeric allowed"; 
    }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


    <section class="pb_cover_v3 overflow-hidden cover-bg-indigo cover-bg-opacity text-left pb_gradient_v1" id="section-home">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6">
            <h2 class="heading mb-3">NISIT KASETSART</h2>
            <div class="sub-heading">
              <p class="mb-4">Calculate your Grade Point Average(GPA) and show information image, text from you fill.<br>First you have to fill information then click result button to show your information.</p>
              <p class="mb-5" style="float: left; width: 55%;"><a class="btn btn-success btn-lg pb_btn-pill smoothscroll" href="download.php?file=template.csv"><span class="pb_font-14 text-uppercase pb_letter-spacing-1">Download</span></a></p>
              <!-- Button trigger modal -->
              <button style="float: left; width: 45%; background: #FF6347;" type="submit" class="btn btn-primary btn-lg pb_btn-pill smoothscroll" <?php if (($file1Err != "")||($file2Err != "")||($firstname == "")||($lastname == "")||($email == "")||($year == "")||($faculty == "")||($tel == "")){ ?> disable <?php } ?> data-toggle="modal" data-target="#myModal">
                Result
              </button>
            </div>
          </div> 
          <div class="col-md-1">
          </div>
          <div class="col-md-5 relative align-self-center">
            
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" class="bg-white rounded pb_form_v1" method="post" enctype="multipart/form-data">
              <h2 class="mb-4 mt-0 text-center">Please fill up </h2>
              <div class="form-group">
                <input type="text" class="form-control pb_height-50 reverse" name="firstname" placeholder="Firstname">
                <span class="error"><?php echo $firstnameErr; ?></span>
              </div>
              <div class="form-group">
                <input type="text" class="form-control pb_height-50 reverse" name="lastname" placeholder="Lastname">
                <span class="error"><?php echo $lastnameErr; ?></span>
              </div>
              <div class="form-group">
                <div class="pb_select-wrap">
                    <input list="faculty" name="faculty" class="form-control pb_height-50 reverse" placeholder="Select your faculty">
                    <datalist id="faculty">
                    <option <?php if (isset($faculty) && $faculty=="Agriculture") echo "checked";?> value="Agriculture">
                    <option <?php if (isset($faculty) && $faculty=="Business Administration") echo "checked";?> value="Business Administration">
                    <option <?php if (isset($faculty) && $faculty=="Fisherie") echo "checked";?> value="Fisherie">
                    <option <?php if (isset($faculty) && $faculty=="Humanities") echo "checked";?> value="Humanities">
                    <option <?php if (isset($faculty) && $faculty=="Science") echo "checked";?> value="Science">
                    <option <?php if (isset($faculty) && $faculty=="Engineering") echo "checked";?> value="Engineering">
                    <option <?php if (isset($faculty) && $faculty=="Education") echo "checked";?> value="Education">
                    <option <?php if (isset($faculty) && $faculty=="Economics") echo "checked";?> value="Economics">
                    <option <?php if (isset($faculty) && $faculty=="Architecture") echo "checked";?> value="Architecture">
                    <option <?php if (isset($faculty) && $faculty=="Social Sciences") echo "checked";?> value="Social Sciences">
                    <option <?php if (isset($faculty) && $faculty=="Veterinary Technology") echo "checked";?> value="Veterinary Technology">
                    <option <?php if (isset($faculty) && $faculty=="Veterinary Medicine") echo "checked";?> value="Veterinary Medicine">
                    <option <?php if (isset($faculty) && $faculty=="Agro-Industry") echo "checked";?> value="Agro-Industry">
                    <option <?php if (isset($faculty) && $faculty=="Environment") echo "checked";?> value="Environment">
                    </datalist>
                    <span class="error"><?php echo $facultyErr; ?></span>
                </div>
              </div>
              <div class="form-group">
                <div class="pb_select-wrap">
                    <input list="year" name="year" class="form-control pb_height-50 reverse" placeholder="Select your year">
                    <datalist id="year">
                    <option <?php if (isset($year) && $year=="1") echo "checked";?> value="1">
                    <option <?php if (isset($year) && $year=="2") echo "checked";?> value="2">
                    <option <?php if (isset($year) && $year=="3") echo "checked";?> value="3">
                    <option <?php if (isset($year) && $year=="4") echo "checked";?> value="4">
                    </datalist>
                    <span class="error"><?php echo $yearErr; ?></span>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control pb_height-50 reverse" name="email" placeholder="Email">
                <span class="error"><?php echo $emailErr; ?></span>
              </div>
              <div class="form-group">
                <input type="text" class="form-control pb_height-50 reverse" name="tel" placeholder="Tel">
                <span class="error"><?php echo $telErr; ?></span>
              </div>
              <div class="form-group">
                <span class="label-input100">Upload your image</span>
                <input class="form-control pb_height-50 reverse" type="file" name="file1" placeholder="Upload your Image">
                <span class="error"><?php echo $file1Err; ?></span>
              </div>
              <div class="form-group">
                <span class="label-input100">Upload your file csv</span>
                <input class="form-control pb_height-50 reverse" type="file" name="file2" placeholder="Upload your file CSV">
                <span class="error"><?php echo $file2Err; ?></span>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary btn-lg btn-block pb_btn-pill  btn-shadow-blue" value="Submit">
              </div>

            </form>


<!-- Modal -->
<div class="modal fade" id="myModal"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Information</h4>
      </div>
      <div class="modal-body">
        <p style="font-size: 15px; float: left; width: 60%;">
          <?php 
                echo "Firstname : $firstname";
                echo "<br>";
                echo "Lastname : $lastname";
                echo "<br>";
                echo "Email : $email";
                echo "<br>";
                echo "Tel : $tel";
                echo "<br>";
                echo "Year : $year";
                echo "<br>";
                echo "Faculty of : $faculty";
                echo "<br>";
                
          ?>
          <?php
            $fileName = $_FILES['file2']['name'];
            $filePath = "upload/" . $fileName;
            $uploadOk = 1;
            $fileType = strtolower(pathinfo($filePath,PATHINFO_EXTENSION));
            // Allow certain file formats
            if($fileType != "csv" ) {
              $file2Err = "Sorry, only CSV files are allowed.";
              $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
              $file2Err = "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
              if (move_uploaded_file($_FILES["file2"]["tmp_name"], $filePath)) {
                $file2Err ="";
              } else {
                $file2Err = "Sorry, there was an error uploading your file.";
              }
            }
            ?>
         
            <?php
            //read and calculate from file csv
            $row = 1;
            $totalCredit = 0;
            $totalNum = 0;
            $result ;
            if (($handle = fopen("$filePath", "r")) !== FALSE) {
              while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                if($row !== 1){
                  for ($i=3; $i < $num; $i++) {
                    $totalNum += ($data[$i-1]*$data[$i]);
                    $totalCredit += $data[$i-1];
                    }
                }
                $row++;
              }
              $result = round($totalNum/$totalCredit,2);
              fclose($handle);
            }
            ?>
        <a style="font-size: 30px"> <?php echo "Your Grade is : $result"; ?> </a>
        </p>
        <p style="float: right; width: 40%;">
          <?php
            $fileName = $_FILES['file1']['name'];
            $filePath = "upload/" . $fileName;
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($filePath,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
              $check = getimagesize($_FILES["file1"]["tmp_name"]);
                if($check !== false) {
                  $file1Err =  "File is an image - " . $check["mime"] . ".";
                  $uploadOk = 1;
                } else {
                  $file1Err = "File is not an image.";
                  $uploadOk = 0;
                }
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
              $file1Err = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
              $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
              $file1Err = "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
              if (move_uploaded_file($_FILES["file1"]["tmp_name"], $filePath)) {
                $file1Err="";
                echo "<img src=".$filePath." height=150 width=150 />";
              } else {
                $file1Err = "Sorry, there was an error uploading your file.";
              }
            }
            ?>
          </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



          </div> 
        </div>
      </div>
    </section>
    <!-- END section -->

    <script src="assets/js/jquery.min.js"></script>
    
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/jquery.mb.YTPlayer.min.js"></script>

    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/jquery.easing.1.3.js"></script>

    <script src="assets/js/main.js"></script>

	</body>
</html>