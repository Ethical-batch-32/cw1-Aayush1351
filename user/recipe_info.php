
<?php
@include '../config.php';
session_start();
if (isset($_GET['id'])) {
  $id = mysqli_real_escape_string($con, $_GET['id']);
  $data = "SELECT * FROM recipi_info WHERE id = $id";
  $result = mysqli_query($con, $data);

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
    while ($row = mysqli_fetch_array($result)) {


        ?>
    <div class="container mt-5">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h1><?php echo $row['recipi_name']?></h1>
      </div>
      <div class="row">
        <div class="col-md-6">
          <!-- <img src="https://localhost/la/recipe_images/<?php $row['image']?>" alt="Recipe Image" class="img-fluid mb-3"> -->
          <img src="../recipe_images/<?php echo $row['image'] ?>" alt="Recipe Image" class="img-fluid mb-3">
          <p><?php echo $row['recipi_desc']?></p>
        </div>
      </div>
      <div class="col-md-6" style="background-color:orange;">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="p-2 text-black">Prep Time:</div>
            <div class="p-2 text-black"><?php echo $row['recipe_preptime']?></div>
            <div class="p-2 text-black">Cook Time:</div>
            <div class="p-2 text-black"><?php echo $row['recipe_cooktime']?></div>
            <div class="p-2 text-black">Total Time:</div>
            <div class="p-2 text-black"><?php echo $row['total_time']?></div>
            <div class="p-2 text-black">Serves:</div>
            <div class="p-2 text-black"><?php echo $row['serves']?></div>
          </div>
        </div>
        <div class="col-md-6">
          <h3>Ingredients:</h3>
          <div >

            <p>
              <?php echo $row['ingredients']?></p>

          </div>
          <!-- <ul>
            <li><?php // echo $row['ingredients']?></li>
            
          </ul> -->
          <h3>Instructions:</h3>
          <div >

<p>
<?php echo $row['instructions']?></p>

</div>
         <br>
            
            <!-- <li>In a medium bowl, whisk together the flour, baking powder, and salt.</li>
            <li>In a separate large bowl, beat the sugar and egg until smooth. Add the milk and melted butter, and mix until well combined.</li>
            <li>Add the dry ingredients to the wet ingredients and mix until just combined. Do not overmix.</li>
            <li>Pour the batter into a greased 9x9 inch baking pan and smooth the top with a spatula.</li>
            <li>Bake for 20-25 minutes, or until a toothpick inserted into the center comes out clean.</li>
            <li>Remove the pan from the oven and let it cool for a few minutes before serving.</li> -->
       
          <h3>Notes:</h3>
          <p>This recipe can be easily doubled to make a 9x9 inch pan of brownies. Simply increase the baking time to 30-35 minutes.</p>
        </div>
    </div>
    <?php
    }
    ?>
</body>
</html>