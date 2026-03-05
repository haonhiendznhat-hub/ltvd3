<?php
function xapXep(&$mang) { // Dùng dấu & để thay đổi trực tiếp mảng gốc
    $n = count($mang);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($mang[$j] > $mang[$j + 1]) {
                // Hoán vị
                $temp = $mang[$j];
                $mang[$j] = $mang[$j + 1];
                $mang[$j + 1] = $temp;
            }
        }
    }
}
$numbers = [4, 2, 8, 1];
xapXep($numbers);
print_r($numbers);
?>
