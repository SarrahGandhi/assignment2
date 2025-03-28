<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();

if (isset($_GET['RecipeID'])) {
    $RecipeID = mysqli_real_escape_string($connect, $_GET['RecipeID']);

    // Delete recipe query
    $query = "DELETE FROM recipes WHERE RecipeID = '$RecipeID' LIMIT 1";

    if (mysqli_query($connect, $query)) {
        set_message('Recipe has been deleted successfully.');
    } else {
        set_message('Failed to delete the recipe: ' . mysqli_error($connect));
    }
}

// Redirect to the recipes page
header('Location: recipes.php');
die();
?>