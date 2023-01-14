<?php

include 'config.php';

// GET sub-category's event
$sql = "SELECT * FROM event";
$result = $connection->query($sql);

$resultArray = array();
$arrayIndex = 0;

if(is_object($result)) {

  if($result->num_rows>0) {

    while($row = $result->fetch_assoc()) {

      $data = array(
        "event_id" => $row["event_id"],
        "event_name" => $row["event_name"],
        "event_sub_id" => $row["event_sub_id"]
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