<?php require_once('../private/initialize.php'); ?>

<?php

  // Get requested ID

  $id = $_GET['id'] ?? false;

  if(!$id) {
    redirect_to('routes.php');
  }

  // Find bicycle using ID

  $route = Route::find_by_id($id);

?>

<?php $page_title = 'Detail: ' . $route->name(); ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main" role="main" tabindex="-1">

  <a href="routes.php">Back to Trail Selection</a>

  <div id="page">
  
      <h1>Route: <?php echo $route->name(); ?></h1>
  
      <div class="attributes">
        <dl>
          <dt>Route ID</dt>
          <dd><?php echo h($route->id); ?></dd>
        </dl>
        <dl>
          <dt>Difficulty</dt>
          <dd><?php echo h($route->difficulty()); ?></dd>
        </dl>
        <dl>
          <dt>Description</dt>
          <dd><?php echo h($route->Description); ?></dd>
        </dl>
        <dl>
          <dt>Tire Tread</dt>
          <dd><?php echo h($route->tire()); ?></dd>
        </dl>
        <dl>
          <dt>Distance</dt>
          <dd><?php echo h($route->Distance); ?></dd>
        </dl>
        <dl>
          <dt>Water Access</dt>
          <dd><?php echo h($route->Water_Access); ?></dd>
        </dl>

  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
