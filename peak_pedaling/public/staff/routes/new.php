<?php

require_once('../../../private/initialize.php');

require_login();

if(is_post_request()) {

  // Create record using post parameters
  $args = $_POST['route'];
  $route = new Route($args);
  $result = $Route->save();

  if($result === true) {
    $new_id = $route->Route_ID;
    $session->message('The Route was created successfully.');
    redirect_to(url_for('/staff/routes/show.php?id=' . $new_id));
  } else {
    // show errors
  }

} else {
  // display the form
  $route = new Route;
}

?>

<?php $page_title = 'Create Route'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/routes/index.php'); ?>">&laquo; Back to List</a>

  <div class="route new">
    <h1>Create Route</h1>

    <?php echo display_errors($route->errors); ?>

    <form action="<?php echo url_for('/staff/routes/new.php'); ?>" method="post">

      <?php include('form_fields.php'); ?>

      <div id="operations">
        <input type="submit" value="Create Route" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
