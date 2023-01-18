<?php
@include '../config.php';
session_start(); {
    $user_name = $_SESSION['username'];
    $data = "SELECT * from recipi_info WHERE name='$user_name'";
    $result = mysqli_query($con, $data);
     
if (isset($_GET['id'])){
    // Sanitize the provided item id to prevent SQL injection attacks
    $id = mysqli_real_escape_string($con, $_GET['id']);
$sql = "DELETE FROM recipi_info WHERE id= $id";

if (mysqli_query($con, $sql)) {
    //  $error[] = 'Record deleted successfully';
    header('location:my_profile.php');
} else {
    $error[] = 'There was a problem deleting the record';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
</head>
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
            $imgg = "SELECT * from bio WHERE name='$user_name'";
            $imgdata = mysqli_query($con, $imgg);

            if ($roww = mysqli_fetch_array($imgdata)) {
            }
              ?>
              
    <div class="content">
        <div class="container mt-5">
            <div class="d-flex justify-content-lg-around align-items-center mb-3">
              <img  src="http://localhost/LA/profileimg/<?php echo $roww['image']?>" alt="<?php echo $user_name?>" class="rounded-circle mb-3" style="height:150px; width:150px;">
              <?php
              $create = "SELECT * from usertable";
              $data = mysqli_query($con, $create);

              if ($row = mysqli_fetch_array($data)) {
              }
                ?>

              </div><h1><?php
                echo $user_name ?></h1>

                  <p>Member since:
                    <span class="post-date"><?php echo date('F jS, Y', strtotime($row['created_at']))?></span>
                  </p>
                  <?php
                  $bioo = "SELECT * from bio WHERE name='$user_name'";
                  $biodata = mysqli_query($con, $bioo);
                  if ($ro = mysqli_fetch_array($biodata)) {
                  }
              ?>
                  <!-- <p>Bio:<?php echo $ro['bio']?></p> -->
                  <button type="button" class="btn btn-primary" onclick="window.location.href = 'edit_profile.php';">Edit Profile</button>
                </div>
            </div>
            <?php
@include '../config.php';
{
    $data = "SELECT * FROM `recipi_info` WHERE name='$user_name'";
    $result = mysqli_query($con, $data);
}
;     

?>
            <div class="container">
        <div class="row">
        <div class="col-12">
            <h2 class="mt-4 mb-4">My recipes</h2>
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
                <a class="btn btn-danger" href="my_profile.php?id=<?php echo $row['id']?>">Delete Post</a>
                <a class="btn btn-danger px-2" href="recipe_info.php?id=<?php echo $row['id']?>" class="btn btn-sm btn-danger float-right">Read more</a>

                </ul>
                </div>
                <!-- <div class="dropdown">
                    <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                        Action
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="my_profile.php?id=<?=$row['id']?>">Delete Post</a>
                        <a class="dropdown-item" href="#">Read more</a>
                    </div>
                </div> -->
                <!-- <h3><a href="#" class="mt-2 text-danger"><?php echo $row['name']?></a></h3> -->
            </div>
            
        </div>
<?php
     }
?>     
        
    </div>


<script src="https://kit.fontawesome.com/44715839c6.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>