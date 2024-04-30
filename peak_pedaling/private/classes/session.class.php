<?php

class Session {

  private $id;
  public $Email_Address;
  private $last_login;

  public const MAX_LOGIN_AGE = 60*60*24; // 1 day

  public function __construct() {
    session_start();
    $this->check_stored_login();
  }

  public function login($admin) {
    if($admin) {
      // prevent session fixation attacks
      session_regenerate_id();
      $this->id = $_SESSION['id'] = $admin->id;
      $this->Email_Address = $_SESSION['Email_Address'] = $admin->Email_Address;
      $this->last_login = $_SESSION['last_login'] = time();
    }
    return true;
  }

  public function is_logged_in() {
    // return isset($this->admin_id);
    return isset($this->id) && $this->last_login_is_recent();
  }

  public function logout() {
    unset($_SESSION['id']);
    unset($_SESSION['Email_Address']);
    unset($_SESSION['last_login']);
    unset($this->id);
    unset($this->Email_Address);
    unset($this->last_login);
    return true;
  }

  private function check_stored_login() {
    if(isset($_SESSION['id'])) {
      $this->id = $_SESSION['id'];
      $this->Email_Address= $_SESSION['Email_Address'];
      $this->last_login = $_SESSION['last_login'];
    }
  }

  private function last_login_is_recent() {
    if(!isset($this->last_login)) {
      return false;
    } elseif(($this->last_login + self::MAX_LOGIN_AGE) < time()) {
      return false;
    } else {
      return true;
    }
  }

  public function message($msg="") {
    if(!empty($msg)) {
      // Then this is a "set" message
      $_SESSION['message'] = $msg;
      return true;
    } else {
      // Then this is a "get" message
      return $_SESSION['message'] ?? '';
    }
  }

  public function clear_message() {
    unset($_SESSION['message']);
  }
}

?>
