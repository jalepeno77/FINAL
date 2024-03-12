<?php

class Route extends DatabaseObject {

  static protected $table_name = 'Route';
  static protected $db_columns = ['id', 'brand', 'model', 'year', 'category', 'color', 'gender', 'price', 'weight_kg', 'condition_id', 'description'];

  public $Route_ID;
  public $Difficulty;
  public $Route_Name;
  public $Description;
  public $Tire_Tread;
  public $Distance;
  public $Date_Added;
  public $Water_Access;
  public $IMG_ID;
  
  public function __construct($args=[]) {
    $this->Route_ID = $args['Route_ID'] ?? '';
    $this->Difficulty = $args['Difficulty'] ?? '';
    $this->Route_Name = $args['Route_Name'] ?? '';
    $this->Description = $args['Description'] ?? '';
    $this->Tire_Tread = $args['Tire_Tread'] ?? '';
    $this->Distance = $args['Distance'] ?? '';
    $this->Date_Added = $args['Date_Added'] ?? '';
    $this->Water_Access = $args['Water_Access'] ?? '';
    $this->IMG_ID = $args['IMG_ID'] ?? '';
  }

  public const CATEGORIES = ['Road', 'Mountain', 'Hybrid', 'Cruiser', 'City', 'BMX'];

  public const TIRES = ['Cross Country', 'Trail', 'Enduro', 'Downhill'];

  public const DIFFICULTY_OPTIONS = [
    1 => 'Beginner',
    2 => 'Intermediate',
    3 => 'Advanced',
    4 => 'Expert',
    5 => 'Professional'
  ];

  public function name() {
    return "{$this->Route_Name}";
  }

  public function condition() {
    if($this->condition_id > 0) {
      return self::CONDITION_OPTIONS[$this->condition_id];
    } else {
      return "Unknown";
    }
  }

  protected function set_hashed_password() {
    $this->hashed_password = password_hash($this->password, PASSWORD_BCRYPT);
  }

  public function verify_password($password) {
    return password_verify($password, $this->hashed_password);
  }

  protected function create() {
    $this->set_hashed_password();
    return parent::create();
  }

  protected function update() {
    if($this->password != '') {
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

    if(is_blank($this->first_name)) {
      $this->errors[] = "First name cannot be blank.";
    } elseif (!has_length($this->first_name, array('min' => 2, 'max' => 255))) {
      $this->errors[] = "First name must be between 2 and 255 characters.";
    }

    if(is_blank($this->last_name)) {
      $this->errors[] = "Last name cannot be blank.";
    } elseif (!has_length($this->last_name, array('min' => 2, 'max' => 255))) {
      $this->errors[] = "Last name must be between 2 and 255 characters.";
    }

    if(is_blank($this->email)) {
      $this->errors[] = "Email cannot be blank.";
    } elseif (!has_length($this->email, array('max' => 255))) {
      $this->errors[] = "Last name must be less than 255 characters.";
    } elseif (!has_valid_email_format($this->email)) {
      $this->errors[] = "Email must be a valid format.";
   }

}
}

