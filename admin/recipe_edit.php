<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['RecipeID'])) {
  $RecipeID = $_GET['RecipeID'];

  // Get recipe details
  $query = "SELECT recipes.RecipeName, recipes.RecipeID, recipes.PrepTime, recipes.Instructions, recipes.Servings, recipes.Photo
              FROM recipes
              WHERE recipes.RecipeID = '$RecipeID'";

  $result = mysqli_query($connect, $query);

  if ($result->num_rows > 0) {
    $recipe = $result->fetch_assoc();

    // Get ingredients for the recipe
    $query2 = "SELECT IngredientID, IngredientName, Quantity
                   FROM ingredients
                   WHERE RecipeID = '$RecipeID'";
    $ingredients = mysqli_query($connect, $query2);
  } else {
    die("No recipe found.");
  }
}

// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $RecipeID = $_POST["RecipeID"];
  $RecipeName = mysqli_real_escape_string($connect, $_POST["RecipeName"]);
  $Instructions = mysqli_real_escape_string($connect, $_POST["Instructions"]);
  $PrepTime = mysqli_real_escape_string($connect, $_POST["PrepTime"]);
  $Servings = mysqli_real_escape_string($connect, $_POST["Servings"]);

  // Handle image upload
  $Photo = $_POST["existing_photo"]; // Default to existing photo
  if (!empty($_FILES["Photo"]["name"])) {
    $target_dir = "../uploads/";
    $file_name = uniqid() . "_" . basename($_FILES["Photo"]["name"]);
    $target_file = $target_dir . $file_name;

    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if the file is a valid image (you can add more validations if needed)
    $check = getimagesize($_FILES["Photo"]["tmp_name"]);
    if ($check === false) {
      $_SESSION['message'] = "File is not an image.";
      $_SESSION['message_type'] = "danger";
      header("Location: index.php?error=upload");
      exit();
    }

    // Check file size (limit to 5MB, for example)
    if ($_FILES["Photo"]["size"] > 5000000) {
      $_SESSION['message'] = "Sorry, your file is too large.";
      $_SESSION['message_type'] = "danger";
      header("Location: index.php?error=upload");
      exit();
    }

    // Allow only certain file formats (JPG, JPEG, PNG, GIF)
    if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
      $_SESSION['message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $_SESSION['message_type'] = "danger";
      header("Location: index.php?error=upload");
      exit();
    }

    if (!is_dir($target_dir)) {
      mkdir($target_dir, 0755, true);
    }

    if (move_uploaded_file($_FILES["Photo"]["tmp_name"], $target_file)) {
      $Photo = $target_file;
    } else {
      $_SESSION['message'] = "Error uploading image.";
      $_SESSION['message_type'] = "danger";
      header("Location: index.php?error=upload");
      exit();
    }
  }


  // Update recipe details
  $query = "UPDATE recipes 
              SET RecipeName = '$RecipeName', 
                  Instructions = '$Instructions', 
                  PrepTime = '$PrepTime', 
                  Servings = '$Servings', 
                  Photo = '$Photo' 
              WHERE RecipeID = '$RecipeID'";

  $result = mysqli_query($connect, $query);

  if ($result) {
    // Update existing ingredients
    foreach ($_POST['ingredients'] as $ingredientID => $ingredient) {
      $IngredientName = mysqli_real_escape_string($connect, $ingredient['name']);
      $Quantity = mysqli_real_escape_string($connect, $ingredient['quantity']);

      if (!empty($ingredientID)) {
        $query2 = "UPDATE ingredients 
                       SET IngredientName = '$IngredientName', 
                           Quantity = '$Quantity' 
                       WHERE IngredientID = '$ingredientID' AND RecipeID = '$RecipeID'";
        mysqli_query($connect, $query2);
      }
    }

    // Insert new ingredients if added
    if (!empty($_POST['new_ingredients'])) {
      foreach ($_POST['new_ingredients'] as $new_ingredient) {
        if (!empty($new_ingredient['name']) && !empty($new_ingredient['quantity'])) {
          $NewIngredientName = mysqli_real_escape_string($connect, $new_ingredient['name']);
          $NewQuantity = mysqli_real_escape_string($connect, $new_ingredient['quantity']);

          $query3 = "INSERT INTO ingredients (RecipeID, IngredientName, Quantity) 
                        VALUES ('$RecipeID', '$NewIngredientName', '$NewQuantity')";
          mysqli_query($connect, $query3);
        }
      }
    }

    $_SESSION['message'] = "Updated successfully!"; // Your requested message
    $_SESSION['message_type'] = "success";
    header("Location: recipes.php"); // Redirect to recipes.php
    exit();
  } else {
    $_SESSION['message'] = "Failed to update recipe: " . mysqli_error($connect);
    $_SESSION['message_type'] = "danger";
    header("Location: recipes.php"); // Redirect even on failure to show error
    exit();
  }
}

?>

<?php include('includes/header.php'); ?>

<main class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h1 class="mb-4">Edit Recipe</h1>

      <!-- Form to edit recipe -->
      <form method="post" action="recipe_edit.php" enctype="multipart/form-data">
        <input type="hidden" name="RecipeID" value="<?php echo $recipe['RecipeID']; ?>">
        <input type="hidden" name="existing_photo" value="<?php echo $recipe['Photo']; ?>">

        <!-- Recipe Name -->
        <div class="mb-3">
          <label for="RecipeName" class="form-label">Recipe Name</label>
          <input type="text" name="RecipeName" id="RecipeName" class="form-control"
            value="<?php echo htmlspecialchars($recipe['RecipeName']); ?>" required>
        </div>

        <!-- Prep Time -->
        <div class="mb-3">
          <label for="PrepTime" class="form-label">Preparation Time (in minutes)</label>
          <input type="number" name="PrepTime" id="PrepTime" class="form-control"
            value="<?php echo htmlspecialchars($recipe['PrepTime']); ?>" required>
        </div>

        <!-- Servings -->
        <div class="mb-3">
          <label for="Servings" class="form-label">Servings</label>
          <input type="number" name="Servings" id="Servings" class="form-control"
            value="<?php echo htmlspecialchars($recipe['Servings']); ?>" required>
        </div>

        <!-- Upload Photo -->
        <div class="mb-3">
          <label for="Photo" class="form-label">Upload New Photo</label>
          <input type="file" name="Photo" id="Photo" class="form-control">
          <small>Current Photo: <a href="<?php echo '../'. $recipe['Photo']; ?>" target="_blank">View Photo</a></small>
        </div>

        <!-- Instructions -->
        <div class="mb-3">
          <label for="Instructions" class="form-label">Instructions</label>
          <textarea name="Instructions" id="Instructions" rows="5" class="form-control"
            required><?php echo htmlspecialchars($recipe['Instructions']); ?></textarea>
        </div>

        <h4 class="mt-4">Ingredients</h4>

        <!-- Loop through ingredients and display them -->
        <?php while ($ingredient = mysqli_fetch_assoc($ingredients)): ?>
          <div class="mb-3 border p-3 rounded ingredient-item">
            <input type="hidden" name="ingredients[<?php echo $ingredient['IngredientID']; ?>][id]"
              value="<?php echo $ingredient['IngredientID']; ?>">

            <!-- Ingredient Name -->
            <div class="mb-2">
              <label class="form-label">Ingredient Name</label>
              <input type="text" name="ingredients[<?php echo $ingredient['IngredientID']; ?>][name]" class="form-control"
                value="<?php echo htmlspecialchars($ingredient['IngredientName']); ?>" required>
            </div>

            <!-- Quantity -->
            <div>
              <label class="form-label">Quantity</label>
              <input type="text" name="ingredients[<?php echo $ingredient['IngredientID']; ?>][quantity]"
                class="form-control" value="<?php echo htmlspecialchars($ingredient['Quantity']); ?>" required>
            </div>
          </div>
        <?php endwhile; ?>

        <!-- New Ingredients Section -->
        <div id="new-ingredients-container" class="mt-3"></div>

        <!-- Button to Add More Ingredients -->
        <button type="button" id="add-ingredient" class="btn btn-primary mt-2">Add Ingredient</button>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-success mt-3">Update Recipe</button>

        <!-- Cancel Button -->
        <a href="recipes.php" class="btn btn-secondary mt-3">Cancel</a>
      </form>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>

<script>
  document.getElementById("add-ingredient").addEventListener("click", function () {
    const container = document.getElementById("new-ingredients-container");

    const ingredientHTML = `
      <div class="mb-3 border p-3 rounded">
        <div class="mb-2">
          <label class="form-label">Ingredient Name</label>
          <input type="text" name="new_ingredients[][name]" class="form-control" required>
        </div>
        <div>
          <label class="form-label">Quantity</label>
          <input type="text" name="new_ingredients[][quantity]" class="form-control" required>
        </div>
      </div>`;
    container.insertAdjacentHTML("beforeend", ingredientHTML);
  });
</script>