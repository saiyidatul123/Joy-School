<?php

include 'config.php';

$sql = "SELECT * FROM category";
$result = $connection->query($sql);

$resultArray = array();
$arrayIndex = 0;

if(is_object($result)) {

  if($result->num_rows>0) {

    while($row = $result->fetch_assoc()) {

      $data = array(
        "cat_id" => $row["cat_id"],
        "cat_name" => $row["cat_name"]
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

$json = array("Category" => $arrayResult);

$resultJson = json_encode($json);

echo $resultJson;

?>