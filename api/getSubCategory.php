<?php

include 'config.php';

$sql = "SELECT * FROM sub_category";
$result = $connection->query($sql);

$resultArray = array();
$arrayIndex = 0;

if(is_object($result)) {

  if($result->num_rows>0) {

    while($row = $result->fetch_assoc()) {

      $data = array(
        "sc_id" => $row["sc_id"],
        "sc_name" => $row["sc_name"],
        "sc_image" => $row["sc_image"],
        "sc_cat_id" => $row["sc_cat_id"]
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

$json = array("Sub-category" => $arrayResult);

$resultJson = json_encode($json);

echo $resultJson;

?>