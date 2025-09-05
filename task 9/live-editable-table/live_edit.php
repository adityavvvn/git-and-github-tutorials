<?php
include_once("db_connect.php");

$input = filter_input_array(INPUT_POST);

if ($input['action'] == 'edit') {
    $id = $input['id'];
    $update = [];

    if(isset($input['name'])) $update[] = "name='".$input['name']."'";
    if(isset($input['gender'])) $update[] = "gender='".$input['gender']."'";
    if(isset($input['age'])) $update[] = "age='".$input['age']."'";
    if(isset($input['designation'])) $update[] = "designation='".$input['designation']."'";
    if(isset($input['address'])) $update[] = "address='".$input['address']."'";

    if(count($update) > 0) {
        $sql_query = "UPDATE developers SET ".implode(",", $update)." WHERE id='".$id."'";
        mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
    }
}

echo json_encode($input);
?>
