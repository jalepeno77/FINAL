<?php require_once('../../../private/initialize.php'); ?>
<?php require_login(); ?>

<?php

$id = $_GET['Route_ID'] ?? '1'; // PHP > 7.0

$route = Route::find_by_id($id);

?>

<?php $page_title = 'Show Route: ' . h($route->name()); ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content" role="main" tabindex="-1">

  <a class="back-link" href="<?php echo url_for('/staff/routes/index.php'); ?>">&laquo; Back to List</a>

  <div class="route show">

    <h1>Route: <?php echo h($route->name()); ?></h1>

    <div class="attributes">
      <dl>
        <dt>Route ID</dt>
        <dd><?php echo h($route->Route_ID); ?></dd>
      </dl>
      <dl>
        <dt>Route Name</dt>
        <dd><?php echo h($route->Route_Name); ?></dd>
      </dl>
      <dl>
        <dt>Difficulty</dt>
        <dd><?php echo h($route->Difficulty); ?></dd>
      </dl>
      <dl>
        <dt>Tire Tread</dt>
        <dd><?php echo h($route->Tire_Tread); ?></dd>
      </dl>
      <dl>
        <dt>Distance</dt>
        <dd><?php echo h($route->Distance); ?></dd>
      </dl>
      <dl>
        <dt>Water Access</dt>
        <dd><?php echo h($route->Water_Access); ?></dd>
      </dl>
      <dl>
        <dt>Description</dt>
        <dd><?php echo h($route->Description); ?></dd>
      </dl>

  </div>

</div>
