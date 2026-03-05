<?php
$students = [
    ["ten" => "An", "ngaySinh" => "2005-01-01", "gioiTinh" => "Nữ", "toan" => 8, "van" => 9, "anh" => 8.5],
    ["ten" => "Bình", "ngaySinh" => "2005-02-15", "gioiTinh" => "Nam", "toan" => 7, "van" => 6, "anh" => 7.5],
];


foreach ($students as &$sv) {
    $sv['diemTB'] = ($sv['toan'] + $sv['van'] + $sv['anh']) / 3;
}
unset($sv); 

function sapXepTheoTen($mang) {
    usort($mang, function($a, $b) {
        return strcmp($a['ten'], $b['ten']);
    });
    return $mang;
}

function danhSachNu($mang) {
    return array_filter($mang, function($sv) {
        return $sv['gioiTinh'] === "Nữ";
    });
}

function sinhVienGioi($mang) {
    return array_filter($mang, function($sv) {
        return $sv['diemTB'] >= 8.0;
    });
}
function nuDiemCaoNhat($mang) {
    $dsNu = danhSachNu($mang);
    if (empty($dsNu)) return null;
    
    $maxSV = null;
    foreach ($dsNu as $nu) {
        if ($maxSV == null || $nu['diemTB'] > $maxSV['diemTB']) {
            $maxSV = $nu;
        }
    }
    return $maxSV;
}

echo "<h3>Danh sách sinh viên Nữ:</h3>";
print_r(danhSachNu($students));

$topNu = nuDiemCaoNhat($students);
echo "<h3>Bạn nữ điểm cao nhất:</h3>";
echo $topNu['ten'] . " với " . round($topNu['diemTB'], 2) . " điểm.";
?>

