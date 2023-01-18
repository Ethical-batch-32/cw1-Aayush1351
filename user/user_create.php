<?php
@include '../config.php';
session_start(); {
  if (isset($_FILES['image'])) {
    // echo "<pre>";
    // print_r($_FILES);
    // echo "</pre>";

    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];

    if (move_uploaded_file($file_tmp, "../recipe_images/" . $file_name)) {
      // echo "Successfull.";

    } else {
      echo "Could not be uploaded.";
    }



    if (isset($_POST['submit'])) {
    $user_name = $_SESSION['username'];
      $rname = ($_POST['rname']);
      $r_desc = ($_POST['rdesc']);
      $ingre = ($_POST['ingredi']);
      $inst = ($_POST['inst']);
      $rec_pre = ($_POST['preptime']);
      $rec_cook = ($_POST['cooktime']);
      $total_t = ($_POST['total_time']);
      $serves = ($_POST['serve']);
      // $image = ($_POST[$file_name]);
      // Attempt insert query execution
      $sql = "INSERT INTO recipi_info(name, recipi_name, image, recipi_desc, ingredients, instructions, recipe_preptime, recipe_cooktime, total_time, serves) VALUES ('$user_name','$rname','$file_name', '$r_desc' ,'$ingre','$inst','$rec_pre','$rec_cook','$total_t','$serves')";
      if (mysqli_query($con, $sql)) {
        echo "Records added successfully.";
      } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
      }

    }
  }

};
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="user_style.css">
    <link rel="stylesheet" href="content.css">
    <script src="https://kit.fontawesome.com/44715839c6.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
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
    <div class="container mt-5">
        <h1>Create a Recipe</h1>
        <p>Use the form below to create and share your own recipe with the world!</p>
  
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="recipe-name">Recipe Name</label>
            <input name="rname" type="text" class="form-control" id="recipe-name" placeholder="Enter recipe name">
          </div>
          <div class="form-group">
            <label for="recipe-type">Select Recipe Type</label>
            <select class="form-control" id="recipe-type">
              <option>Breakfast</option>
              <option>Lunch</option>
              <option>Dinner</option>
              <option>Dessert</option>
              <option>Other</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="formFileSm" class="form-label">Recipe Image</label>
            <input name='image' class="form-control form-control-sm" id="formFileSm" type="file">
          </div>
          <div class="form-group">
            <label for="recipe-description">Recipe Description</label>
            <textarea name="rdesc" class="form-control" id="recipe-description" rows="3" placeholder="Enter a brief description of the recipe"></textarea>
          </div>
          <div class="form-group">
            <label for="ingredients">Ingredients</label>
            <textarea name="ingredi" class="form-control" id="ingredients" rows="3" placeholder="Enter a list of ingredients, one per line"></textarea>
          </div>
          <div class="form-group">
            <label for="instructions">Instructions</label>
            <textarea name="inst" class="form-control" id="instructions" rows="6" placeholder="Enter the instructions for the recipe, one per line"></textarea>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="prep-time">Recipe Prep Time</label>
              <input name="preptime" type="text" class="form-control" id="prep-time" placeholder="20 minutes">
            </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="prep-time">Recipe cook Time</label>
              <input name="cooktime" type="text" class="form-control" id="prep-time" placeholder="20 minutes">
            </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="prep-time">Total Time</label>
              <input name="total_time" type="text" class="form-control" id="prep-time" placeholder="40 minutes">
            </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="prep-time">Serves</label>
              <input name="serve" type="text" class="form-control" id="prep-time" placeholder="2 people">
              <button name="submit" type="submit" class="btn btn-light" style="margin:20px;">Submit</button>
            </div>
        </div>
</form>
    </div>
</body>
</html>