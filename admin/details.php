<?php
include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();

include('includes/nav.php');
?>
<main class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['RecipeID'])) {
                $RecipeID = $_GET['RecipeID'];
                $query = "SELECT Recipes.RecipeName, Recipes.RecipeID, Recipes.PrepTime, Recipes.Instructions, Recipes.Servings,
                    Ingredients.IngredientName, Ingredients.Quantity
                    FROM Recipes
                    INNER JOIN Ingredients ON Recipes.RecipeID = Ingredients.RecipeID
                    WHERE Recipes.RecipeID = '$RecipeID'";
                $ingredientsdisplay = mysqli_query($connect, $query);
                $recipe = $ingredientsdisplay->fetch_assoc();
            }
            if ($recipe) {

                echo '<h1 class="display-4 mb-4">' . $recipe['RecipeName'] . '</h1>';

                echo '<img src="' . $recipe['Photo'] . '" alt="Recipe Image">';


                echo '<div class="list-group mb-4">';
                // Loop through ingredients
                mysqli_data_seek($ingredientsdisplay, 0);  // Reset the result pointer to the beginning
                while ($ingredient = mysqli_fetch_assoc($ingredientsdisplay)) {
                    echo '<li class="list-group-item">' . $ingredient['Quantity'] . ' ' . $ingredient['IngredientName'] . '</li>';
                }
                echo '</div>';

                echo '<h4>Servings: <span class="badge bg-success">' . '   ' . $recipe['Servings'] . '</span>Prep Time: <span class="badge bg-success">' . $recipe['PrepTime'] . ' Minutes</span></h4>';

                echo '<div class="mt-4"><h4>Instructions</h4><p>' . nl2br(str_replace('.', '.<br>', $recipe['Instructions'])) . '</p></div>';

            } else {
                echo '<div class="alert alert-warning" role="alert">No recipe found.</div>';
            }
            ?>
        </div>
    </div>
</main>
<?php
include('includes/footer.php');
?>