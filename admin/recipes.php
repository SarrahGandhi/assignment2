<?php

<<<<<<< HEAD:php-cms/admin/recipes.php
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

$query = 'SELECT *
  FROM recipes';
$result = mysqli_query($connect, $query);
=======
include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM recipes
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Recipe has been deleted' );
  
  header( 'Location: recipes.php' );
  die();
  
}

include( 'includes/header.php' );

$query = 'SELECT *
  FROM recipes';
$result = mysqli_query( $connect, $query );
>>>>>>> origin/main:admin/recipes.php

?>

<h2>Manage Recipes</h2>

<table>
<<<<<<< HEAD:php-cms/admin/recipes.php
    <tr>
        <th></th>
        <th align="center">ID</th>
        <th align="left">Name</th>
        <th align="center">Instructions</th>
        <th align="center">Prepare Time</th>
        <th align="center">Servings</th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    <?php while ($record = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td align="center">
                <img src="image.php?type=project&id=<?php echo $record['id']; ?>&width=300&height=300&format=inside">
            </td>
            <td align="center"><?php echo $record['RecipeID']; ?></td>
            <td align="left">
                <?php echo htmlentities($record['RecipeName']); ?>
            </td>
            <td align="left"> <small><?php echo $record['Instructions']; ?></small> </td>
            <td align="center"><?php echo $record['PrepTime']; ?></td>
            <td align="center"><?php echo $record['Servings']; ?></td>
            <td align="center" style="white-space: nowrap;"><?php echo htmlentities($record['servings']); ?></td>
            <td align="center"><a href="recipes_photo.php?id=<?php echo $record['RecipeID']; ?>">Photo</i></a></td>
            <td align="center"><a href="recipes_edit.php?id=<?php echo $record['RecipeID']; ?>">Edit</i></a></td>
            <td align="center">
                <a href="recipes.php?delete=<?php echo $record['RecipeID']; ?>"
                    onclick="javascript:confirm('Are you sure you want to delete this recipe?');">Delete</i></a>
            </td>
        </tr>
    <?php endwhile; ?>
=======
  <tr>
    <th></th>
    <th align="center">ID</th>
    <th align="left">Name</th>
    <th align="center">Instructions</th>
    <th align="center">Prepare Time</th>
    <th align="center">Servings</th>
    <th></th>
    <th></th>
    <th></th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td align="center">
        <img src="image.php?type=project&id=<?php echo $record['id']; ?>&width=300&height=300&format=inside">
      </td>
      <td align="center"><?php echo $record['RecipeID']; ?></td>
      <td align="left">
        <?php echo htmlentities( $record['RecipeName'] ); ?>
      </td>
      <td align="left"> <small><?php echo $record['Instructions']; ?></small> </td>
      <td align="center"><?php echo $record['PrepTime']; ?></td>
      <td align="center"><?php echo $record['Servings']; ?></td>
      <td align="center" style="white-space: nowrap;"><?php echo htmlentities( $record['servings'] ); ?></td>
      <td align="center"><a href="recipes_photo.php?id=<?php echo $record['RecipeID']; ?>">Photo</i></a></td>
      <td align="center"><a href="recipes_edit.php?id=<?php echo $record['RecipeID']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="recipes.php?delete=<?php echo $record['RecipeID']; ?>" onclick="javascript:confirm('Are you sure you want to delete this recipe?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
>>>>>>> origin/main:admin/recipes.php
</table>

<p><a href="recipe_add.php"><i class="fas fa-plus-square"></i>Add Recipe</a></p>


<?php

<<<<<<< HEAD:php-cms/admin/recipes.php
include('includes/footer.php');
=======
include( 'includes/footer.php' );
>>>>>>> origin/main:admin/recipes.php

?>