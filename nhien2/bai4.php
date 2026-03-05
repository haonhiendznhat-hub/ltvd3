<?php
// 1 tạo danh sách 20 sinh viên
$students = [
    ["ten" => "An", "ngaySinh" => "2005-01-01", "gioiTinh" => "Nữ", "toan" => 8, "van" => 9, "anh" => 8.5],
    ["ten" => "Bình", "ngaySinh" => "2005-02-15", "gioiTinh" => "Nam", "toan" => 7, "van" => 6, "anh" => 7.5],
];

// 2 tính Điểm TB cho từng sinh viên
foreach ($students as &$sv) {
    $sv['diemTB'] = ($sv['toan'] + $sv['van'] + $sv['anh']) / 3;
}
unset($sv); // hủy biến tham chiếu

// 3 gàm sắp xếp theo tên
function sapXepTheoTen($mang) {
    usort($mang, function($a, $b) {
        return strcmp($a['ten'], $b['ten']);
    });
    return $mang;
}

// 4 danh sách bạn Nữ
function danhSachNu($mang) {
    return array_filter($mang, function($sv) {
        return $sv['gioiTinh'] === "Nữ";
    });
}

// 5 danh sách sinh viên Giỏi (điểm tb > 8)
function sinhVienGioi($mang) {
    return array_filter($mang, function($sv) {
        return $sv['diemTB'] >= 8.0;
    });
}

// 6 bạn nữ có điểm tb cao nhất
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

// 7 kết quả
echo "<h3>Danh sách sinh viên Nữ:</h3>";
print_r(danhSachNu($students));

$topNu = nuDiemCaoNhat($students);
echo "<h3>Bạn nữ điểm cao nhất:</h3>";
echo $topNu['ten'] . " với " . round($topNu['diemTB'], 2) . " điểm.";
?>
