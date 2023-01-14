<?php

  include 'config.php';

  if(!empty($_POST)) {

    $save_id = $_POST['save_id'];
    $save_event_id = $_POST['save_event_id'];
    $save_goal = $_POST['save_goal'];
    $save_amt = $_POST['save_amt'];

    $sql = "INSERT INTO savings (save_id, save_event_id, save_goal, save_amt) VALUES ('$save_id','$save_event_id', '$save_goal', '$save_amt')";
     $result = $connection->query($sql);

    if($result) {
        echo 200;
    }
    else {
        die ("Invalid query: ". $connection->error);
        return;
    }
  }

?>