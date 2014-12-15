<?php

require_once 'validator/validator.php';

$validator_for_name = new Validator("name");

$validator_for_name->presence();

if($validator_for_name->validate(array("name" => ""))->is_valid()) {
  echo "Success!";
} else {
  pr($validator_for_name->errors);
}
