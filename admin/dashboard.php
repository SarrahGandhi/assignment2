<?php include("admin/includes/nav.php"); ?>
</header>
<?php
include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();

include('includes/header.php');
?>

<!-- Dashboard container with Bootstrap styling -->
<div class="container mt-5">
  <h2 class="text-center mb-4">Admin Dashboard</h2>

  <div class="row justify-content-center">
    <div class="col-md-6">
      <!-- List Group for Dashboard Links -->
      <div class="list-group">
        <a href="recipes.php" class="list-group-item list-group-item-action">
          <i class="fas fa-cogs"></i> Manage Recipes
        </a>
        <a href="users.php" class="list-group-item list-group-item-action">
          <i class="fas fa-users"></i> Manage Users
        </a>
        <a href="logout.php" class="list-group-item list-group-item-action text-danger">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      </div>
    </div>
  </div>
</div>

<?php
include('includes/footer.php');
?>