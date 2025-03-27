<?php
include('admin/includes/database.php');
include('admin/includes/config.php');
include('admin/includes/functions.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recipes</title>
  <link rel="stylesheet" href="admin/includes/styles.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <?php include('admin/includes/nav.php'); ?>
  <h1>Welcome to My Website!</h1>

  <p>This is the website frontend! </p>
  <main>
    <div>
      <?php
      $query = "SELECT * FROM `Recipes`";
      $result = mysqli_query($connect, $query);
      foreach ($result as $recipe) {
        echo '<div class="card">
      <img src="' . $recipe['Photo'] . '">
            <h5 class="card-title">' . $recipe['RecipeName'] . '</h5>
            <span class="card-author">Preptime:' . $recipe['PrepTime'] . '</span>
            <p class="card-description">Servings: ' . $recipe['Servings'] . '</p>
            <form action="recipe.php" method="get">
            <input type="hidden" name="RecipeID" value="' . $recipe['RecipeID'] . '">
            <button type="submit" class="btn btn-primary">Details</button>
            </form>
        </div>';
      }



      ?>
    </div>
  </main>
  <?php include('admin/includes/footer.php'); ?>

</body>

</html>