$target_dir = "uploads/"; // 上传文件保存目录
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); // 上传文件的完整路径
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // 获取上传文件类型

// 检查文件是否已存在
if (file_exists($target_file)) {
    echo "文件已存在。";
    $uploadOk = 0;
}

// 检查文件大小是否符合要求
if ($_FILES["fileToUpload"]["size"] > 500000) { // 500 KB
    echo "文件过大。";
    $uploadOk = 0;
}

// 检查文件格式是否符合要求
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    echo "仅支持 JPG, JPEG, PNG & GIF 文件。";
    $uploadOk = 0;
}

// 如果没问题，上传文件
if ($uploadOk == 0) {
    echo "上传失败。";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "文件 " . basename($_FILES["fileToUpload"]["name"]) . " 已上传。";
    } else {
        echo "上传失败。";
    }
}