<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();

// Pagination setup
$recipes_per_page = 15;
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$offset = ($page - 1) * $recipes_per_page;

// Get total number of recipes
$total_query = 'SELECT COUNT(*) FROM recipes';
$total_result = mysqli_query($connect, $total_query);
$total_row = mysqli_fetch_row($total_result);
$total_recipes = $total_row[0];

// Get recipes for current page
$query = 'SELECT * FROM recipes LIMIT ' . $recipes_per_page . ' OFFSET ' . $offset;
$result = mysqli_query($connect, $query);

if (isset($_GET['delete'])) {
  $query = 'DELETE FROM recipes WHERE RecipeID = ' . $_GET['delete'] . ' LIMIT 1';
  mysqli_query($connect, $query);
  set_message('Recipe has been deleted');
  header('Location: recipes.php');
  die();
}

include('includes/header.php');
?>

<h2>Manage Recipes</h2>

<div class="container">
  <div class="row">
    <?php while ($record = mysqli_fetch_assoc($result)): ?>
      <div class="col-12 col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <img src="uploads/<?php echo $record['Photo']; ?>" class="card-img-top" alt="Recipe Image"
            style="height: 200px; object-fit: cover;">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?php echo htmlentities($record['RecipeName']); ?></h5>
            <p class="card-text"><strong>Instructions:</strong> <small><?php echo $record['Instructions']; ?></small></p>
            <p class="card-text"><strong>Prep Time:</strong> <?php echo $record['PrepTime']; ?> mins</p>
            <p class="card-text"><strong>Servings:</strong> <?php echo $record['Servings']; ?></p>

            <div class="d-flex flex-column mt-auto">
              <a href="recipes_edit.php?id=<?php echo $record['RecipeID']; ?>" class="btn btn-primary w-100 mb-2">Edit</a>
              <a href="recipes.php?delete=<?php echo $record['RecipeID']; ?>" class="btn btn-danger w-100 mb-2"
                onclick="return confirm('Are you sure you want to delete this recipe?');">Delete</a>
              <a href="details.php?RecipeID=<?php echo $record['RecipeID']; ?>" class="btn btn-info w-100">Details</a>
            </div>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div> <!-- End of row -->
</div> <!-- End of container -->


<!-- Pagination -->
<div class="pagination mt-4 d-flex justify-content-center">
  <?php
  $total_pages = ceil($total_recipes / $recipes_per_page);
  if ($page > 1) {
    echo '<a href="?page=' . ($page - 1) . '" class="btn btn-secondary">Previous</a>';
  }
  for ($i = 1; $i <= $total_pages; $i++) {
    if ($i == $page) {
      echo '<span class="btn btn-primary mx-1">' . $i . '</span>';
    } else {
      echo '<a href="?page=' . $i . '" class="btn btn-secondary mx-1">' . $i . '</a>';
    }
  }
  if ($page < $total_pages) {
    echo '<a href="?page=' . ($page + 1) . '" class="btn btn-secondary">Next</a>';
  }
  ?>
</div> <!-- End of pagination -->
</div> <!-- End of container -->

<p><a href="recipe_add.php" class="btn btn-success mt-4"><i class="fas fa-plus-square"></i> Add Recipe</a></p>

<?php
include('includes/footer.php');
?>