<?php
include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');
secure();
$recipes = $connect->query("SELECT * FROM Recipes");
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
  $query = "INSERT INTO Recipes (RecipeName,Instructions,PrepTime,Servings,Photo) VALUES ('$RecipeName','$Instructions','$PrepTime','$Servings','$imagePath')";
  $result = mysqli_query($connect, $query);
  if ($result) {
    echo "Recipe Added Successfully";
  } else {
    echo "Error :" . $connect->error;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ontario Public Schools</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <?php include("includes/nav.php");
  ?>
  <?php include("includes/database.php");
  $query = 'SELECT * FROM Recipes';
  $recipes = mysqli_query($connect, $query);

  ?>
  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <form action="recipe_add.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="RecipeName" class="form-label">Recipe Name</label>
              <input type="text" name="RecipeName" id="RecipeName" required>
            </div>
            <div class="mb-3">
              <label for="RecipeInstructions" class="form-label">Recipe Instructions</label>
              <input type="text" name="RecipeInstructions" id="RecipeInstructions" required>
            </div>
            <div class="mb-3">
              <label for="Servings" class="form-label">Servings</label>
              <input type="text" name="Servings" id="Servings" required>
            </div>
            <div class="mb-3">
              <label for="PrepTime" class="form-label">PrepTime</label>
              <input type="text" name="PrepTime" id="PrepTime" required>
            </div>


            <h3>Ingredients:</h3>
            <div id="ingredient-list">
              <div>
                <label for="ingredient[]">Ingredient:</label>
                <input type="text" name="ingredient[]" required>

                <label for="quantity[]">Quantity:</label>
                <input type="text" name="quantity[]" required>
                <br>
              </div>
            </div>

            <button type="button" onclick="addIngredient()">Add Another Ingredient</button>
            <div class="mb-3">
              <label for="image" class="form-label">Image</label>
              <input type="file" class="form-control" id="image" name="image">
            </div>


            <button type="submit" name="recipe_add">Add Recipe</button>

            <script>
              function addIngredient() {
                const ingredientList = document.getElementById('ingredient-list');
                const newIngredient = `
      <div>
        <label for="ingredient[]">Ingredient:</label>
        <input type="text" name="ingredient[]" required>
        <label for="quantity[]">Quantity:</label>
        <input type="text" name="quantity[]" required>
        <br>
      </div>
    `;
                ingredientList.insertAdjacentHTML('beforeend', newIngredient);
              }
            </script>


          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>