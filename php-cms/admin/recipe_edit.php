<?php include('includes/database.php');
if ($SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["RecipeID"])) {
  $RecipeID = $_GET["RecipeID"];
  $query = "SELECT * FROM Recipes INNER JOIN Ingredients WHERE Recipes.RecipeID = Ingredients.RecipeID";
  $result = mysqli_query($connect, $query);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
  } else {
    die("No recipe found.");
  }
}
if ($SERVER["REQUEST_METHOD"] == "POST") {
  $RecipeID = $_POST["RecipeID"];
  $RecipeName = $_POST["RecipeName"];
  $Instructions = $_POST["Instructions"];
  $Servings = $_POST["Servings"];
  $PrepTime = $_POST["PrepTime"];
  $IngredientName = $_POST["IngredientsName"];
  $Quantity = $_POST["Quantity"];
  $query = "UPDATE Recipes SET 
  RecipeName='$RecipeName',
  Instructions='$Instructions',
  Servings = '$Servings',
  PrepTime = '$PrepTime'
  WHERE RecipeID = '$RecipeID'";
  $result = mysqli_query($connect, $query);
  if ($result) {
    $queryIng = "UPDATE Ingredients SET
IngredientName = '$IngredientsName',
  Quantity = '$Quantity'
  WHERE RecipeID = '$RecipeID'";
    $resultIng = mysqli_query($connect, $queryIng);
    if ($resultIng) {
      header("Location: index.php");
      exit();
    } else {
      echo "Failed to update Ingredients";
    }
  } else {
    echo "Failed to update Recipe";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Attraction</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <?php include("includes/nav.php"); ?>

</body>

</html>