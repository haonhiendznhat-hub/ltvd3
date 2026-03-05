<?php
function timGiaTri($giaTri, $mang) {
    foreach ($mang as $index => $item) {
        if ($item === $giaTri) {
            return $index;
        }
    }
    return -1;
}
$traiCay = ["Apple", "Banana", "Cherry"];
echo timGiaTri("Banana", $traiCay); 
?>

