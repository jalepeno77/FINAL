<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($route)) {
  redirect_to(url_for('/staff/routes/index.php'));
}
?>

<dl>
  <dt>Route</dt>
  <dd><input type="text" name="route[Route_name]" value="<?php echo h($route->Route_Name); ?>" /></dd>
</dl>

<dl>
  <dt>Difficulty</dt>
  <dd>
  <select name="route[Difficulty]">
      <option value=""></option>
    <?php foreach(Route::TIRES as $Difficulty) { ?>
      <option value="<?php echo $Difficulty; ?>" <?php if($route->Difficulty == $Difficulty) { echo 'selected'; } ?>><?php echo $Difficulty; ?></option>
    <?php } ?>
    </select>
  </dd>
</dl>

<dl>
  <dt>Tire Tread</dt>
  <dd>
    <select name="route[Tire_Tread]">
      <option value=""></option>
    <?php foreach(Route::TIRES as $Tire_Tread) { ?>
      <option value="<?php echo $Tire_Tread; ?>" <?php if($route->Tire_Tread == $Tire_Tread) { echo 'selected'; } ?>><?php echo $Tire_Tread; ?></option>
    <?php } ?>
    </select>
  </dd>
</dl>

<dl>
  <dt>Distance</dt>
  <dd><input type="text" name="route[Distance]" value="<?php echo h($route->Distance); ?>" /></dd>
</dl>
  
<dl>
  <dt>Water Access</dt>
  <dd>
    <input type="hidden" name="route[Water_Access]" value="0" />
    <input type="checkbox" name="route[Water_Access]" value="1" <?php if($route->Water_Access == "1") { echo 'checked'; } ?> />
  </dd>
</dl>

<dl>
  <dt>Description</dt>
  <dd><textarea name="route[Description]"><?php echo h($route->Description); ?></textarea></dd>
</dl>

