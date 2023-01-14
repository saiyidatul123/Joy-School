<?php

include 'config.php';

// GET non-essentials' sub-category
$sql = "SELECT * FROM sub_category WHERE sub_category.sub_cat_id = 2";
$result = $connection->query($sql);

$resultArray = array();
$arrayIndex = 0;

if(is_object($result)) {

  if($result->num_rows>0) {

    while($row = $result->fetch_assoc()) {

      $data = array(
        "sub_id" => $row["sub_id"],
        "sub_name" => $row["sub_name"],
        "sub_image" => $row["sub_image"],
        "sub_cat_id" => $row["sub_cat_id"]
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