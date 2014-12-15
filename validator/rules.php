<?php

class Rules {

  protected $rules = array();
  protected $allow_options = array("message");

  public function presence($options = array()) {
    if(!in_array("presence", $this->rules)) {
      $this->check_allow_options($options);

      if(!isset($options["message"])) {
        $options["message"] = "Should be required!";
      }

      $this->rules[] = array("name" => "presence", "options" => $options);
    }
  }

  protected function check_presence($value) {
    return !empty(trim($value));
  }

  private function check_allow_options($options) {
    $error = array();
    foreach($options as $key => $value) {
      if(!in_array($key, $this->allow_options)) {
        $error[] = $key;
      }
    }

    if(!empty($error)) {
      $error_message = error_to_string($error);
      p_error('Use of undefined options: '.$error_message);
    }
  }
}
