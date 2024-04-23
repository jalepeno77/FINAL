<?php require_once('../../../private/initialize.php'); ?>
<?php require_login(); ?>

<?php

// Find all routes;
$routes = Route::find_all();

?>
<?php $page_title = 'Routes'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content" role="main" tabindex="-1">
  <div class="routes listing">
    <h1>Routes</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/staff/routes/new.php'); ?>">Add Route</a>
    </div>

      <table class="list">
        <caption>Details</caption>
        <tr>
          <th>ID</th>
          <th>Route Name</th>
          <th>Difficulty</th>
          <th>Tire Tread</th>
          <th>Distance</th>
          <th>Water Access</th>
          <th>Date Added</th>
          <th>Image</th>
          <th>Description</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
        </tr>

      <?php foreach($routes as $route) { ?>
        <tr>
          <td><?php echo h($route->Route_ID); ?></td>
          <td><?php echo h($route->Route_Name); ?></td>
          <td><?php echo h($route->Difficulty); ?></td>
          <td><?php echo h($route->Tire_Tread); ?></td>
          <td><?php echo h($route->Distance); ?></td>
          <td><?php echo h($route->Water_Access); ?></td>
          <td><?php echo h($route->Description); ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/routes/show.php?id=' . h(u($route->Route_ID))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/routes/edit.php?id=' . h(u($route->Route_ID))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/routes/delete.php?id=' . h(u($route->Route_ID))); ?>">Delete</a></td>
    	  </tr>
        
      <?php } ?>
  	</table>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
