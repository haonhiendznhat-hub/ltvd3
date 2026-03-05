<?php
function daoNguocMang($mang) {
    $ketQua = [];
    for ($i = count($mang) - 1; $i >= 0; $i--) {
        $ketQua[] = $mang[$i];
    }
    return $ketQua;
}
$numbers = [1, 2, 3, 4, 5];
print_r(daoNguocMang($numbers));
?>
