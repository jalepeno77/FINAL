
  <?php if(isset($peak_home)) { ?>

    <div class="expanding-wrapper">
      <?php $image_url = url_for('/images/' . $peak_home); ?>
      <img id="peak-home" src="<?php echo $image_url; ?>" />
      <footer>
        <?php include(SHARED_PATH . '/public_copyright_disclaimer.php'); ?>
      </footer>
    </div>

  <?php } else { ?>

    <footer>
      <?php include(SHARED_PATH . '/public_copyright_disclaimer.php'); ?>
    </footer>

  <?php } ?>

  </body>
</html>

<?php
db_disconnect($database);
?>
