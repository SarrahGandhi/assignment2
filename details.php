<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="includes/styles.css">
</head>

<body>
    <header>
        <?php include("admin/includes/nav.php"); ?>
    </header>

    <main class="container mt-4">
        <?php
        $RecipeID = $_GET['RecipeID'];
        include('admin/includes/database.php');

        // SQL query to fetch recipe details and its ingredients
        $query = "SELECT Recipes.RecipeName, Recipes.RecipeID, Recipes.PrepTime, Recipes.Instructions, Recipes.Servings,
                  Ingredients.IngredientName, Ingredients.Quantity
                  FROM Recipes
                  INNER JOIN Ingredients ON Recipes.RecipeID = Ingredients.RecipeID
                  WHERE Recipes.RecipeID = '$RecipeID'";

        $ingredientsdisplay = mysqli_query($connect, $query);
        $recipe = mysqli_fetch_assoc($ingredientsdisplay);

        if (mysqli_num_rows($ingredientsdisplay) <= 0) {
            echo '<div class="alert alert-warning" role="alert">No recipe found.</div>';
        } else {
            echo '<h1 class="display-4 mb-4">' . $recipe['RecipeName'] . '</h1>';

            echo '<img src="image.php?type=recipes&RecipeID=' . $recipe['RecipeID'] . '&width=300&height=300&format=inside">';


            echo '<div class="list-group mb-4">';
            // Loop through ingredients
            mysqli_data_seek($ingredientsdisplay, 0);  // Reset the result pointer to the beginning
            while ($ingredient = mysqli_fetch_assoc($ingredientsdisplay)) {
                echo '<li class="list-group-item">' . $ingredient['Quantity'] . ' ' . $ingredient['IngredientName'] . '</li>';
            }
            echo '</div>';

            echo '<h4>Servings: <span class="badge bg-success">' . '   ' . $recipe['Servings'] . '</span>Prep Time: <span class="badge bg-success">' . $recipe['PrepTime'] . ' Minutes</span></h4>';

            echo '<div class="mt-4"><h4>Instructions</h4><p>' . nl2br(str_replace('.', '.<br>', $recipe['Instructions'])) . '</p></div>';

        }
        ?>
    </main>

</body>

</html>