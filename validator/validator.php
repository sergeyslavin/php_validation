<?php

define("DEBUG_FO", true);

require_once 'rules.php';
require_once 'debug.php';

class Validator extends Rules {

  private $field_name;
  public $errors = array();

  public function __construct($field_name) {
    $this->field_name = $field_name;
  }

  public function validate($params) {

    if(isset($params[$this->field_name])) {

      $field_item = $params[$this->field_name];

      if(!empty($this->rules)) {

        foreach($this->rules as $function_name) {

          if(method_exists($this, "check_".$function_name["name"])) {

            $validation_result_success = call_user_func(array($this, "check_".$function_name["name"]), $field_item);

            if(!$validation_result_success) {
              $this->errors[$function_name["name"]] = array("message"=>$function_name["options"]["message"]);
            }
          }
        }
      }
    }
    return $this;
  }

  function is_valid() {
    return empty($this->errors);
  }
}
