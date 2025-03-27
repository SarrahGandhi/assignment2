<?php
include('includes/database.php');

$query = 'SELECT * FROM Recipes INNER JOIN Ingredients ON Recipes.RecipeID = Ingredients.RecipeID';
$result = mysqli_query($connect, $query);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $RecipeName = $_POST["RecipeName"];
  $Instructions = $_POST["Instructions"];
  $PrepTime = $_POST["PrepTime"];
  $Servings = $_POST["Servings"];
  $RecipeID = $_POST["RecipeID"];
  $imagePath = "";

  if (!empty($_FILES["image"]["name"])) {
    $imagePath = 'uploads/' . $_FILES["image"]["name"];
    move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);
  }

  $query = "INSERT INTO Recipes (RecipeName, Instructions, PrepTime, Servings, Photo) 
            VALUES ('$RecipeName','$Instructions','$PrepTime','$Servings','$imagePath')";
  $result = mysqli_query($connect, $query);

  if ($result) {
    echo "<div class='alert alert-success'>Recipe Added Successfully</div>";
  } else {
    echo "<div class='alert alert-danger'>Error: " . $connect->error . "</div>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Recipe</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <?php include("includes/nav.php"); ?>

  <div class="container mt-5">
    <h2>Add Recipe</h2>
    <form action="recipe_add.php" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="RecipeName" class="form-label">Recipe Name</label>
        <input type="text" name="RecipeName" id="RecipeName" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="Instructions" class="form-label">Recipe Instructions (Seperate Each step with a period)</label>
        <textarea name="Instructions" id="Instructions" class="form-control" rows="4" required></textarea>
      </div>
      <div class="mb-3">
        <label for="Servings" class="form-label">Servings</label>
        <input type="number" name="Servings" id="Servings" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="PrepTime" class="form-label">Prep Time (in minutes)</label>
        <input type="number" name="PrepTime" id="PrepTime" class="form-control" required>
      </div>

      <h4>Ingredients:</h4>
      <div id="ingredient-list">
        <div class="mb-3">
          <label for="ingredient[]" class="form-label">Ingredient</label>
          <input type="text" name="ingredient[]" class="form-control" required>

          <label for="quantity[]" class="form-label">Quantity</label>
          <input type="text" name="quantity[]" class="form-control" required>
        </div>
      </div>

      <button type="button" class="btn btn-primary mb-3" onclick="addIngredient()">Add Another Ingredient</button>

      <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" id="image" name="image">
      </div>

      <button type="submit" class="btn btn-success">Add Recipe</button>
    </form>
  </div>

  <script>
    function addIngredient() {
      const ingredientList = document.getElementById('ingredient-list');
      const newIngredient = `
        <div class="mb-3">
          <label for="ingredient[]" class="form-label">Ingredient</label>
          <input type="text" name="ingredient[]" class="form-control" required>

          <label for="quantity[]" class="form-label">Quantity</label>
          <input type="text" name="quantity[]" class="form-control" required>
        </div>
      `;
      ingredientList.insertAdjacentHTML('beforeend', newIngredient);
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>