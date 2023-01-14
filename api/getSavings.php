<?php

include 'config.php';

// GET sub-category's event
$sql = "SELECT * FROM savings";
$result = $connection->query($sql);

$resultArray = array();
$arrayIndex = 0;

if(is_object($result)) {

  if($result->num_rows>0) {

    while($row = $result->fetch_assoc()) {

      $data = array(
        "save_id" => $row["event_id"],
        "save_event_id" => $row["save_event_id"],
        "save_goal" => $row["save_goal"],
        "save_amt" => $row["save_amt"],
      );

      $arrayResult[$arrayIndex] = $data;
      $arrayIndex++;

    }
  }
  else {
    showMessage(0,"Empty", "Empty result.", "");
    return;
  }
}
else {
  showMessage(0, "Failed", "Invalid request.","");
  return;
}

$json = array("Event" => $arrayResult);

$resultJson = json_encode($json);

echo $resultJson;

?>