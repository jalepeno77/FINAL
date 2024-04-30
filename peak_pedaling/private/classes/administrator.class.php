<?php

class Administrator extends DatabaseObject {

  static protected $table_name = "Administrators";
  static protected $db_columns = ['id', 'Email_Address', 'hashed_password', 'First_Name', 'Last_Name'];

  public $id;
  public $Email_Address;
  public $Password;
  public $First_Name;
  public $Last_Name;
  protected $hashed_password;
  public $confirm_password;
  protected $password_required = true;

  public function __construct($args=[]) {
    $this->Email_Address = $args['Email_Address'] ?? '';
    $this->Password = $args['Password'] ?? '';
    $this->First_Name = $args['First_Name'] ?? '';
    $this->Last_Name = $args['Last_Name'] ?? '';
    $this->confirm_password = $args['confirm_password'] ?? '';
  }

  public function full_name() {
    return $this->First_Name . " " . $this->Last_Name;
  }

  protected function set_hashed_password() {
    $this->hashed_password = password_hash($this->Password, PASSWORD_BCRYPT);
  }

  public function verify_password($password) {
    return password_verify($password, $this->hashed_password);
  }

  protected function create() {
    $this->set_hashed_password();
    return parent::create();
  }

  protected function update() {
    if($this->Password != '') {
      $this->set_hashed_password();
      // validate password
    } else {
      // password not being updated, skip hashing and validation
      $this->password_required = false;
    }
    return parent::update();
  }

  protected function validate() {
    $this->errors = [];

    if(is_blank($this->First_Name)) {
      $this->errors[] = "First name cannot be blank.";
    } elseif (!has_length($this->First_Name, array('min' => 2, 'max' => 255))) {
      $this->errors[] = "First name must be between 2 and 255 characters.";
    }

    if(is_blank($this->Last_Name)) {
      $this->errors[] = "Last name cannot be blank.";
    } elseif (!has_length($this->Last_Name, array('min' => 2, 'max' => 255))) {
      $this->errors[] = "Last name must be between 2 and 255 characters.";
    }

    if(is_blank($this->Email_Address)) {
      $this->errors[] = "Email cannot be blank.";
    } elseif (!has_length($this->Email_Address, array('max' => 255))) {
      $this->errors[] = "Last name must be less than 255 characters.";
    } elseif (!has_valid_email_format($this->Email_Address)) {
      $this->errors[] = "Email must be a valid format.";
    }

    if($this->password_required) {
      if(is_blank($this->Password)) {
        $this->errors[] = "Password cannot be blank.";
      } elseif (!has_length($this->Password, array('min' => 12))) {
        $this->errors[] = "Password must contain 12 or more characters";
      } elseif (!preg_match('/[A-Z]/', $this->Password)) {
        $this->errors[] = "Password must contain at least 1 uppercase letter";
      } elseif (!preg_match('/[a-z]/', $this->Password)) {
        $this->errors[] = "Password must contain at least 1 lowercase letter";
      } elseif (!preg_match('/[0-9]/', $this->Password)) {
        $this->errors[] = "Password must contain at least 1 number";
      } elseif (!preg_match('/[^A-Za-z0-9\s]/', $this->Password)) {
        $this->errors[] = "Password must contain at least 1 symbol";
      }

      if(is_blank($this->confirm_password)) {
        $this->errors[] = "Confirm password cannot be blank.";
      } elseif ($this->Password !== $this->confirm_password) {
        $this->errors[] = "Password and confirm password must match.";
      }
    }

    return $this->errors;
  }

  static public function find_by_email($Email_Address) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE Email_Address='" . self::$database->escape_string($Email_Address) . "'";
    $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

}

?>
