<?php
@include '../config.php';
session_start(); {
    $user_name = $_SESSION['username'];
    $data = "SELECT * from recipi_info WHERE name='$user_name'";
    $result = mysqli_query($con, $data);
}
;     
if(isset($_FILES['imagee'])){
	// echo "<pre>";
	// print_r($_FILES);
	// echo "</pre>";

	$file_name=$_FILES['imagee']['name'];
	$file_size=$_FILES['imagee']['size'];
	$file_tmp=$_FILES['imagee']['tmp_name'];
	$file_type=$_FILES['imagee']['type'];

	if(move_uploaded_file($file_tmp, "../profileimg/". $file_name)){
		// echo "Successfull.";

	}else{
		echo"Could not be uploaded.";
	}

}
if(isset($_POST['submit'])){
	// $image = ($_POST[$file_name]);
	// Attempt insert query execution
	$sql = "INSERT INTO bio (name, bio, image) VALUES ('$user_name','','$file_name')";
	if(mysqli_query($con, $sql)){
		// header('location:home.php');
		// echo "Records added successfully.";
	} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
	}
	
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="user_style.css">
    <script src="https://kit.fontawesome.com/44715839c6.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <section class="header">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
  <a href="user.php"><img src="../image/logo.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav" style="padding-left: 60%;">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" style="font-size: 100%;" aria-current="page" href="user.php">Home</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="user_browse.php"> Browse recipe</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="user_create.php"> Create recipe</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="my_profile.php">My profile</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="../login/logout.php">Log out</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    </section>
    <?php
    
    
    ?>
    <div class="content">
        <div class="container mt-5">
            <h1 class="text-center mb-5">Edit Profile</h1>
            <form action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="profile-picture">Profile Picture</label>
                <input type="file" name="imagee" class="form-control-file" id="profile-picture">
              </div>
              <br>
              <!-- <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Enter username">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password">
              </div> -->
              <!-- <div class="form-group">
                <label for="bio">Bio</label>
                <textarea name="bioo" class="form-control" id="bio" rows="3"></textarea>
              </div> -->
              <button type="submit" name="submit" value="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
      
</body>
</html>