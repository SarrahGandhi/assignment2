<?php
include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();

// Initialize $RecipeID
$RecipeID = null;

// Handle initial page load (GET request)
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['RecipeID'])) {
  $RecipeID = $_GET['RecipeID'];
}

// Handle form submission (POST request)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $RecipeID = $_POST["RecipeID"];
  $RecipeName = mysqli_real_escape_string($connect, $_POST["RecipeName"]);
  $Instructions = mysqli_real_escape_string($connect, $_POST["Instructions"]);
  $PrepTime = mysqli_real_escape_string($connect, $_POST["PrepTime"]);
  $Servings = mysqli_real_escape_string($connect, $_POST["Servings"]);

  // Handle image upload if provided
  $ImagePath = null;
  if (!empty($_FILES['RecipeImage']['name'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["RecipeImage"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image is valid
    $check = getimagesize($_FILES["RecipeImage"]["tmp_name"]);
    if ($check !== false) {
      if (move_uploaded_file($_FILES["RecipeImage"]["tmp_name"], $target_file)) {
        $ImagePath = $target_file;
      } else {
        $_SESSION['message'] = "Failed to upload image.";
        $_SESSION['message_type'] = "danger";
      }
    } else {
      $_SESSION['message'] = "Invalid image file.";
      $_SESSION['message_type'] = "danger";
    }
  }

  // Update recipe details (include image if uploaded)
  $query = "UPDATE recipes 
              SET RecipeName = '$RecipeName', 
                  Instructions = '$Instructions', 
                  PrepTime = '$PrepTime', 
                  Servings = '$Servings'";
  if ($ImagePath) {
    $query .= ", ImagePath = '$ImagePath'";
  }
  $query .= " WHERE RecipeID = '$RecipeID'";

  $result = mysqli_query($connect, $query);

  if ($result) {
    // Update or delete existing ingredients
    if (!empty($_POST['ingredients'])) {
      foreach ($_POST['ingredients'] as $ingredientID => $ingredient) {
        $IngredientName = mysqli_real_escape_string($connect, $ingredient['name']);
        $Quantity = mysqli_real_escape_string($connect, $ingredient['quantity']);
        $delete = isset($ingredient['delete']) && $ingredient['delete'] == '1';

        if (!empty($ingredientID)) {
          if ($delete) {
            // Delete the ingredient
            $query2 = "DELETE FROM ingredients WHERE IngredientID = '$ingredientID' AND RecipeID = '$RecipeID'";
            if (!mysqli_query($connect, $query2)) {
              $_SESSION['message'] = "Failed to delete ingredient: " . mysqli_error($connect);
              $_SESSION['message_type'] = "danger";
              break;
            }
          } else {
            // Update the ingredient
            $query2 = "UPDATE ingredients 
                                   SET IngredientName = '$IngredientName', 
                                       Quantity = '$Quantity' 
                                   WHERE IngredientID = '$ingredientID' AND RecipeID = '$RecipeID'";
            if (!mysqli_query($connect, $query2)) {
              $_SESSION['message'] = "Failed to update ingredient: " . mysqli_error($connect);
              $_SESSION['message_type'] = "danger";
              break;
            }
          }
        }
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
          if (!mysqli_query($connect, $query3)) {
            $_SESSION['message'] = "Failed to insert new ingredient: " . mysqli_error($connect);
            $_SESSION['message_type'] = "danger";
            break;
          }
        }
      }
    }

    $_SESSION['message'] = "Updated successfully!";
    $_SESSION['message_type'] = "success";
  } else {
    $_SESSION['message'] = "Failed to update recipe: " . mysqli_error($connect);
    $_SESSION['message_type'] = "danger";
  }
}

// Fetch recipe and ingredients if $RecipeID is set
if ($RecipeID !== null) {
  $query = "SELECT RecipeName, RecipeID, PrepTime, Instructions, Servings, ImagePath
              FROM recipes
              WHERE RecipeID = '$RecipeID'";
  $result = mysqli_query($connect, $query);

  if ($result->num_rows > 0) {
    $recipe = $result->fetch_assoc();

    // Get ingredients for the recipe
    $query2 = "SELECT IngredientID, IngredientName, Quantity
                   FROM ingredients
                   WHERE RecipeID = '$RecipeID'";
    $ingredients = mysqli_query($connect, $query2);
  } else {
    die("No recipe found for RecipeID: $RecipeID");
  }
} else {
  die("No RecipeID provided in the request.");
}

include('includes/header.php');
?>

<main class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h1 class="mb-4">Edit Recipe</h1>

      <!-- Display flash message -->
      <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?php echo $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
          <?php echo $_SESSION['message']; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['message']);
        unset($_SESSION['message_type']); ?>
      <?php endif; ?>

      <!-- Form to edit recipe -->
      <form method="post" action="recipe_edit.php" enctype="multipart/form-data">
        <input type="hidden" name="RecipeID" value="<?php echo $recipe['RecipeID']; ?>">

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

        <!-- Instructions -->
        <div class="mb-3">
          <label for="Instructions" class="form-label">Instructions</label>
          <textarea name="Instructions" id="Instructions" rows="5" class="form-control"
            required><?php echo htmlspecialchars($recipe['Instructions']); ?></textarea>
        </div>

        <!-- Existing Image Preview -->
        <?php if (!empty($recipe['ImagePath'])): ?>
          <div class="mb-3">
            <label class="form-label">Current Image:</label>
            <div>
              <img src="<?php echo $recipe['ImagePath']; ?>" alt="Recipe Image" class="img-fluid mb-2"
                style="max-width: 200px;">
            </div>
          </div>
        <?php endif; ?>

        <!-- Upload New Image -->
        <div class="mb-3">
          <label for="RecipeImage" class="form-label">Upload New Image (optional)</label>
          <input type="file" name="RecipeImage" id="RecipeImage" class="form-control">
        </div>

        <h4 class="mt-4">Ingredients</h4>

        <!-- Existing Ingredients -->
        <?php while ($ingredient = mysqli_fetch_assoc($ingredients)): ?>
          <div class="mb-3 border p-3 rounded ingredient-item">
            <input type="hidden" name="ingredients[<?php echo $ingredient['IngredientID']; ?>][id]"
              value="<?php echo $ingredient['IngredientID']; ?>">
            <div class="mb-2">
              <label class="form-label">Ingredient Name</label>
              <input type="text" name="ingredients[<?php echo $ingredient['IngredientID']; ?>][name]" class="form-control"
                value="<?php echo htmlspecialchars($ingredient['IngredientName']); ?>" required>
            </div>
            <div class="mb-2">
              <label class="form-label">Quantity</label>
              <input type="text" name="ingredients[<?php echo $ingredient['IngredientID']; ?>][quantity]"
                class="form-control" value="<?php echo htmlspecialchars($ingredient['Quantity']); ?>" required>
            </div>
            <div>
              <button type="button" class="btn btn-danger btn-sm delete-ingredient"
                data-id="<?php echo $ingredient['IngredientID']; ?>">Delete</button>
              <input type="hidden" name="ingredients[<?php echo $ingredient['IngredientID']; ?>][delete]" value="0"
                class="delete-flag">
            </div>
          </div>
        <?php endwhile; ?>

        <!-- New Ingredients Section -->
        <div id="new-ingredients-container" class="mt-3"></div>

        <div class="mb-3">
          <button type="button" id="add-ingredient" class="btn btn-primary">Add Another Ingredient</button>
        </div>

        <!-- Submit Button -->
        <div class="mb-3">
          <button type="submit" class="btn btn-success">Update Recipe</button>
        </div>
      </form>

      <!-- Cancel Button -->
      <div class="mb-3">
        <a href="recipes.php" class="btn btn-secondary"><i class="fas fa-times"></i> Back to list</a>
      </div>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>

<script>
  let ingredientCount = 0;

  // Add new ingredient
  document.getElementById('add-ingredient').addEventListener('click', () => {
    ingredientCount++;
    const newIngredientHTML = `
      <div class="mb-3 border p-3 rounded">
        <div class="mb-2">
          <label class="form-label">Ingredient Name</label>
          <input type="text" name="new_ingredients[${ingredientCount}][name]" class="form-control" required>
        </div>
        <div class="mb-2">
          <label class="form-label">Quantity</label>
          <input type="text" name="new_ingredients[${ingredientCount}][quantity]" class="form-control" required>
        </div>
      </div>`;
    document.getElementById('new-ingredients-container').insertAdjacentHTML('beforeend', newIngredientHTML);
  });

  // Handle ingredient delete
  document.querySelectorAll('.delete-ingredient').forEach(button => {
    button.addEventListener('click', (e) => {
      const parentDiv = e.target.closest('.ingredient-item');
      parentDiv.querySelector('.delete-flag').value = '1';
      parentDiv.style.display = 'none';
    });
  });
</script>