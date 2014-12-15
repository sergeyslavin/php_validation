<?php

if(!defined("DEBUG_FO")) exit(0);

function pr($params) {
  echo "<pre>";
  echo print_r($params);
  echo "</pre>";
}

function bp($message = "BP") {
  echo "<br />";
  echo $message.": ";
  echo debug_print_backtrace();
}

function p_error($message) {
  echo "<div style='color: red'>".$message."</div>";
  die();
}

function error_to_string($error) {
  $ret_message = "";
  for($i = 0; $i < count($error); $i++) {
    $ret_message .= "'".$error[$i]."'";

    if($i+1 != count($error)) {
      $ret_message .= ", ";
    }
  }

  return $ret_message;
}
