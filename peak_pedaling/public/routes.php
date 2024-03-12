<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'Inventory'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">

  <div id="page">
    <div class="intro">
      <img class="inset" src="<?php echo url_for('/images/AdobeStock_55807979_thumb.jpeg') ?>" />
      <h2>ROUTES</h2>
      <p>Choose the trail for you!</p>
      <p>We will give you all the details so you feel safe!</p>
    </div>

    <table id="selection">
      <tr>
        <th>Route Name</th>
        <th>Difficulty</th>
        <th>Description</th>
        <th>Tire Tread</th>
        <th>Distance</th>
        <th>Water Access</th>
        <th>&nbsp;</th>
      </tr>

<?php

$routes = Route::find_all();

?>
      <?php foreach($routes as $route) { ?>
      <tr>
        <td><?php echo $route->name(); ?></td>
        <td><?php echo $route->Difficulty; ?></td>
        <td><?php echo $route->Description; ?></td>
        <td><?php echo $route->Tire_Tread; ?></td>
        <td><?php echo $route->Distance; ?></td>
        <td><?php echo $route->Water_Access; ?></td>
        <td><a href="<?php echo url_for('/detail.php?Route_ID=' . $route->Route_ID); ?>">View</a></td>
      </tr>
      <?php } ?>

    </table>

  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
