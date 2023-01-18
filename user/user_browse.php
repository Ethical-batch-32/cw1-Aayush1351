<?php
@include '../config.php';
session_start(); {
    // $name = "SELECT Username from usertable";
// $result = mysqli_query($con, $name);
// $row = mysqli_fetch_array($result);
    $user_name = $_SESSION['username'];
    $data = "SELECT * from recipi_info";
    $result = mysqli_query($con, $data);
}
;     

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
<style>
.card-box {
    border: 1px solid #ddd;
    padding: 20px;
    box-shadow: 0px 0px 10px 0px #c5c5c5;
    margin-bottom: 30px;
    float: left;
    border-radius: 10px;
}
.card-box .card-thumbnail {
    max-height: 200px;
    overflow: hidden;
    border-radius: 10px;
    transition: 1s;
}
.card-box .card-thumbnail:hover {
    transform: scale(1.2);
}
.card-box h3 a {
    font-size: 20px;
    text-decoration: none;
}
</style>
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


<div class="container">
        <div class="row">
        <div class="col-12">
            <h2 class="mt-4 mb-4">Recipes</h2>
        </div>
    <?php
    while ($row = mysqli_fetch_array($result)){  
      ?>
        <div class="col-md-6 col-lg-4">
            <!-- Bootstrap 5 card box -->
            <div class="card-box">
                <div class="card-thumbnail">
                    <img src="../recipe_images/<?php echo $row['image'] ?>" class="img-fluid" alt="">
                </div>
                <h3><a href="#" class="mt-2 text-danger"><?php echo $row['recipi_name']?></a></h3>
                <p class="text-secondary"><?php echo $row['recipi_desc']?></p>
                <a href="recipe_info.php?id=<?php echo $row['id']?>" class="btn btn-sm btn-danger float-right">Read more >></a>
                <h3><a href="#" class="mt-2 text-danger"><?php echo $row['name']?></a></h3>
            </div>
            
        </div>
<?php
     }
?>     
        
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/44715839c6.js" crossorigin="anonymous"></script>
</html>