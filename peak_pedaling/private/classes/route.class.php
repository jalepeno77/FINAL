<?php

class Route extends DatabaseObject {

  static protected $table_name = 'Route';
  static protected $db_columns = ['id', 'Difficulty', 'Route_Name', 'Description', 'Tire_Tread', 'Distance', 'Water_Access'];

  public $id;
  public $Difficulty;
  public $Route_Name;
  public $Description;
  public $Tire_Tread;
  public $Distance;
  public $Water_Access;
  
  public function __construct($args=[]) {
    $this->id = $args['id'] ?? '';
    $this->Difficulty = $args['Difficulty'] ?? '';
    $this->Route_Name = $args['Route_Name'] ?? '';
    $this->Description = $args['Description'] ?? '';
    $this->Tire_Tread = $args['Tire_Tread'] ?? '';
    $this->Distance = $args['Distance'] ?? '';
    $this->Water_Access = $args['Water_Access'] ?? '';
  }

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

  public function difficulty() {
    if($this->Difficulty > 0) {
      return self::DIFFICULTY_OPTIONS[$this->Difficulty];
    } else {
      return "Unknown";
    }
  }

  public function tire() {
    if($this->Tire_Tread > 0) {
      return self::TIRES[$this->Tire_Tread];
    } else {
      return "Unknown";
    }
  }

  protected function validate() {
    $this->errors = [];

    if(is_blank($this->Route_Name)) {
      $this->errors[] = "Route name cannot be blank.";
    } elseif (!has_length($this->Route_Name, array('min' => 2, 'max' => 255))) {
      $this->errors[] = "Route name must be between 2 and 255 characters.";
    }

    if(is_blank($this->Difficulty)) {
      $this->errors[] = "Difficulty cannot be blank.";
    }

    return $this->errors;
  }

}
