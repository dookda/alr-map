<?php
$arr = array('เหมาะสม', 'เหมาะสมน้อย', 'ไม่เหมาะสม');
foreach ($arr as $value) {
    $value = $value;
}
// $arr is now array(2, 4, 6, 8)
echo json_encode($value); // break the reference with the last element
?>