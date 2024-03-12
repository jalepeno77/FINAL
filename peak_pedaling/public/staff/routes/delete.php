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

  // Delete route
  $result = $trail->delete();
  $session->message('The route was deleted successfully.');
  redirect_to(url_for('/staff/routes/index.php'));

} else {
  // Display form
}

?>

<?php $page_title = 'Delete Route'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/routes/index.php'); ?>">&laquo; Back to List</a>

  <div class="route delete">
    <h1>Delete Route</h1>
    <p>Are you sure you want to delete this route?</p>
    <p class="item"><?php echo h($route->name()); ?></p>

    <form action="<?php echo url_for('/staff/routes/delete.php?id=' . h(u($id))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Route" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
