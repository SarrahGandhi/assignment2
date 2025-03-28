<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();

if (isset($_GET['delete'])) {

  $query = 'DELETE FROM recipes
    WHERE id = ' . $_GET['delete'] . '
    LIMIT 1';
  mysqli_query($connect, $query);

  set_message('Recipe has been deleted');

  header('Location: recipes.php');
  die();
}

include('includes/header.php');

$query = 'SELECT * FROM recipes';
$result = mysqli_query($connect, $query);

?>

<h2>Manage Recipes</h2>

<div class="container">
  <div class="row">
    <?php while ($record = mysqli_fetch_assoc($result)): ?>
      <div class="col-12 col-md-4 mb-4">
        <div class="card h-100 shadow-sm">

          <div class="card-body">
            <h5 class="card-title"><?php echo htmlentities($record['RecipeName']); ?></h5>
            <p class="card-text"><strong>Instructions:</strong> <small><?php echo $record['Instructions']; ?></small></p>
            <p class="card-text"><strong>Prep Time:</strong> <?php echo $record['PrepTime']; ?> mins</p>
            <p class="card-text"><strong>Servings:</strong> <?php echo $record['Servings']; ?></p>
            <div class="d-flex justify-content-between">
              <a href="recipes_edit.php?id=<?php echo $record['RecipeID']; ?>" class="btn btn-primary">Edit</a>
              <a href="recipes.php?delete=<?php echo $record['RecipeID']; ?>" class="btn btn-danger"
                onclick="return confirm('Are you sure you want to delete this recipe?');">
                Delete
              </a>
            </div>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div> <!-- End of row -->
</div> <!-- End of container -->

<p><a href="recipe_add.php" class="btn btn-success"><i class="fas fa-plus-square"></i> Add Recipe</a></p>

<?php

include('includes/footer.php');

?>