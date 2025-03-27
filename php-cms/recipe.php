<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recipe Details</title>
  <link rel="stylesheet" href="includes/styles.css">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
</head>

<body>
  <header>
    <?php include("includes/nav.php"); ?>
  </header>

  <main>
    <div class="container mt-4">
      <?php
      $RecipeID = $_GET['RecipeID'];
      include('includes/database.php');


      // SQL query to fetch recipe details and its ingredients
      $query = "SELECT Recipes.RecipeName, Recipes.RecipeID, Recipes.PrepTime, Recipes.Instructions, Recipes.Servings,
      Ingredients.IngredientName, Ingredients.Quantity
      FROM Recipes
      INNER JOIN Ingredients ON Recipes.RecipeID = Ingredients.RecipeID
      WHERE Recipes.RecipeID = '$RecipeID'";

      $ingredientsdisplay = mysqli_query($connect, $query);
      $recipe = mysqli_fetch_assoc($ingredientsdisplay);
      echo '<h1>' . $recipe['RecipeName'] . '</h1>';
      if (mysqli_num_rows($ingredientsdisplay) <= 0) {
        echo '<h1>No recipe found.</h1>';
      }
      echo '<div> ';
      foreach ($ingredientsdisplay as $ingredient) {
        echo '<div><p>' . $ingredient['Quantity'] . ' ' . $ingredient['IngredientName'] . '</p>
        
       
        </div>';
      }
      echo '<h3>Servings:' . $ingredient['Servings'] . '</h3>';

      echo '<h3>PrepTime:' . $ingredient['PrepTime'] . ' Minutes</h3>';
      echo '<p>Instructions:' . $ingredient['Instructions'] . '</p>';

      // Check if there are any results
      ?>
  </main>

</body>

</html>