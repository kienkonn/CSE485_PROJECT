<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Kiểm tra nếu người dùng nhập URL của hình ảnh
    if (isset($_POST['image']) && !empty($_POST['image'])) {
        $imageUrl = $_POST['image'];

        // Kiểm tra nếu URL có phải là hình ảnh không
        if (filter_var($imageUrl, FILTER_VALIDATE_URL)) {
            // Kiểm tra nếu URL là hình ảnh bằng cách xem phần mở rộng
            $imageExt = strtolower(pathinfo($imageUrl, PATHINFO_EXTENSION));
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

            if (in_array($imageExt, $allowedExtensions)) {
                echo "URL hợp lệ và hình ảnh hợp lệ.";
                // Lưu đường dẫn vào cơ sở dữ liệu hoặc xử lý tiếp
            } else {
                echo "Đường dẫn không phải là hình ảnh hợp lệ (chỉ chấp nhận .jpg, .jpeg, .png, .gif).";
            }
        } else {
            echo "Đường dẫn không hợp lệ. Vui lòng nhập một URL hợp lệ.";
        }
    }

    // Kiểm tra nếu người dùng tải lên tệp hình ảnh
    elseif (isset($_FILES['image'])) {
        // Thư mục lưu trữ hình ảnh
        $uploadDir = 'uploads/';
        
        // Lấy thông tin file tải lên
        $fileTmpName = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileError = $_FILES['image']['error'];
        
        // Lấy phần mở rộng của file
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        
        // Các định dạng file được phép
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        
        // Kiểm tra lỗi tải lên
        if ($fileError === 0) {
            if (in_array($fileExt, $allowed)) {
                // Kiểm tra kích thước file (5MB là ví dụ, bạn có thể thay đổi)
                if ($fileSize <= 5000000) {
                    // Tạo tên file duy nhất để tránh trùng
                    $newFileName = uniqid('', true) . '.' . $fileExt;
                    $fileDestination = $uploadDir . $newFileName;
                    
                    // Di chuyển file đến thư mục uploads
                    if (move_uploaded_file($fileTmpName, $fileDestination)) {
                        echo "File đã được tải lên thành công.";
                        // Lưu đường dẫn file vào cơ sở dữ liệu hoặc thực hiện các bước tiếp theo
                    } else {
                        echo "Có lỗi xảy ra khi tải lên file.";
                    }
                } else {
                    echo "File quá lớn. Vui lòng tải lên file nhỏ hơn 5MB.";
                }
            } else {
                echo "Định dạng file không hợp lệ. Vui lòng tải lên file hình ảnh (jpg, jpeg, png, gif).";
            }
        } else {
            echo "Có lỗi khi tải lên file.";
        }
    } else {
        echo "Vui lòng chọn tệp hoặc nhập URL của hình ảnh.";
    }
}
?>
