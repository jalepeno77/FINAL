<?php require_once('../private/initialize.php'); ?>

<?php

  // Get requested ID

  $id = $_GET['Route_ID'] ?? false;

  if(!$id) {
    redirect_to('routes.php');
  }

  // Find bicycle using ID

  $route = Route::find_by_id($id);

?>

<?php $page_title = 'Detail: ' . $route->name(); ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">

  <a href="routes.php">Back to Trail Selection</a>

  <div id="page">
  
      <h1>Route: <?php echo $route->name(); ?></h1>
  
      <div class="attributes">
        <dl>
          <dt>Route ID</dt>
          <dd><?php echo $route->Route_ID; ?></dd>
        </dl>
        <dl>
          <dt>Difficulty</dt>
          <dd><?php echo $route->Difficulty; ?></dd>
        </dl>
        <dl>
          <dt>Description</dt>
          <dd><?php echo $route->Description; ?></dd>
        </dl>
        <dl>
          <dt>Tire Tread</dt>
          <dd><?php echo $route->Tire_Tread; ?></dd>
        </dl>
        <dl>
          <dt>Distance</dt>
          <dd><?php echo $route->Distance; ?></dd>
        </dl>
        <dl>
          <dt>Water Access</dt>
          <dd><?php echo $route->Water_Access; ?></dd>
        </dl>

  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
