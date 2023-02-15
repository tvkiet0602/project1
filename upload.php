<?php
    session_start();
    include 'connect.php';
    header("Content-Type: text/html; charset-UTFF-8");
    // Cỡ lớn nhất được upload (bytes)
    $maxsize   = 800000;

    ////Những loại file được phép upload
    $allowed    = array('jpg','jpeg');
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }

//    $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg");
//    $filename = $_FILES["image_url"]["name"];
//    $filetype = $_FILES["image_url"]["type"];
//    $filesize = $_FILES["image_url"]["size"];

    //Mở rộng tệp
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(!array_key_exists($ext, $allowed)) die("Lỗi: Vui lòng chọn định dạng tệp hợp lệ.");

    //Kich thuước tệp
//    $maxsize = 5 * 1024 * 1024;
    if($filesize > $maxsize) die("Lỗi: Kích thước tệp lớn hơn giới hạn cho phép.");

    //Lưu ảnh
    if(isset($_POST['btn-upload'])){
        if(in_array($filetype, $allowed)){
            // Kiểm tra xem tệp có tồn tại hay không trước khi tải lên
            if(file_exists("./assets/css/img/" . $filename)){
                echo $filename . " đã tồn tại.";
            } else{
                //echo $_FILES["photo"]["tmp_name"];
                if(move_uploaded_file($_FILES["image_url"]["tmp_name"], "./assets/css/img/" . $filename)){ // có thể có lỗi
                    echo "Tệp của bạn đã được tải lên thành công.";
                }else{
                    echo "Lỗi: không thể di chuyển tệp đến upload/";
                }
            }
        } else{
            echo "Lỗi: Đã xảy ra sự cố khi tải tệp của bạn lên. Vui lòng thử lại.";
        }
    }


?>