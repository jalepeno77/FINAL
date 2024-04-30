<?php
require_once('../../private/initialize.php');

$errors = [];
$Email_Address = '';
$Password = '';

if(is_post_request()) {

  $Email_Address = $_POST['Email_Address'] ?? '';
  $Password = $_POST['Password'] ?? '';

  // Validations
  if(is_blank($Email_Address)) {
    $errors[] = "Email Address cannot be blank.";
  }
  if(is_blank($Password)) {
    $errors[] = "Password cannot be blank.";
  }

  // if there were no errors, try to login
  if(empty($errors)) {
    $admin = Administrator::find_by_email($Email_Address);
    // test if admin found and password is correct
    if($admin != false && $admin->verify_password($Password)) {
      // Mark admin as logged in
      $session->login($admin);
      redirect_to(url_for('/staff/index.php'));
    } else {
      // username not found or password does not match
      $errors[] = "Log in was unsuccessful.";
    }

  }

}

?>

<?php $page_title = 'Log in'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <h1>Log in</h1>

  <?php echo display_errors($errors); ?>

  <form action="login.php" method="post">
    <label for="Email Address">Email Address:</label><br>
    <input type="text" name="Email_Address" value="<?php echo h($Email_Address); ?>"><br>
    <label for="Password">Password:</label><br>
    <input type="password" name="Password" value="<?php echo h($Password); ?>"><br>
    <input type="submit" name="submit" value="Submit">
  </form>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
