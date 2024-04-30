<?php

require_once('../../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/routes/index.php'));
}
$id = $_GET['id'];
$route = Route::find_by_id($id);
if($route == false) {
  redirect_to(url_for('/staff/routes/index.php'));
}

if(is_post_request()) {

  // Save record using post parameters
  $args = $_POST['route'];
  $route->merge_attributes($args);
  $result = $route->save();

  if($result === true) {
    $session->message('The route was updated successfully.');
    redirect_to(url_for('/staff/routes/show.php?id=' . $id));
  } else {
    // show errors
  }

} else {

  // display the form

}

?>

<?php $page_title = 'Edit Route'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/routes/index.php'); ?>">&laquo; Back to List</a>

  <div class="route edit">
    <h1>Edit Route</h1>

    <?php echo display_errors($route->errors); ?>

    <form action="<?php echo url_for('/staff/routes/edit.php?id=' . h(u($id))); ?>" method="post">

      <?php include('form_fields.php'); ?>

      <div id="operations">
        <input type="submit" value="Edit Route" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
