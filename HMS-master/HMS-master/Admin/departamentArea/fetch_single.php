<?php
include('db.php');
include('function.php');
if(isset($_POST["dep_id"]))
{
 $output = array();
 $statement = $connection->prepare(
  "SELECT * FROM db_departament
  WHERE dep_id = '".$_POST["dep_id"]."' 
  LIMIT 1"
 );
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output["emri"] = $row["emri"];
  $output["info"] = $row["info"];
  if($row["image"] != '')
  {
   $output['user_image'] = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row["image"].'" />';
  }
  else
  {
   $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
  }
 }
 echo json_encode($output);
}
?>
   