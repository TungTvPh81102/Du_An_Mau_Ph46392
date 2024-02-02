<?php
$data = array();
if (isset($_FILES['hinh']['name'])) {
    $fileName = $_FILES['hinh']['name'];
    $filePath = "../../../upload/" . $fileName;
    $fileExtentstion = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
    if ($fileExtentstion == 'jpg' || $fileExtentstion == 'png' || $fileExtentstion == 'jpeg') {
        if (move_uploaded_file($_FILES['hinh']['tmp_name'], $filePath)) {
            $data['file'] = $fileName;
            $data['url'] = $filePath;
            $data['uploaded'] = 1;
        } else {
            $data['uploaded'] = 0;
            $data['error']['mess'] = 'Lỗi';
        }
    } else {
        $data['uploaded'] = 0;
        $data['error']['mess'] = 'Sai định dạng ảnh';
    }
}
echo json_encode($data);
