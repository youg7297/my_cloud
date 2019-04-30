<?php
    if(!preg_match("/".$_SERVER['HTTP_HOST']."/i",$_SERVER['HTTP_REFERER'])){
        exit("<script>alert('부적절한 접근입니다'); location.replace('./');</script>");
    }
    $fail = '';
    $upload_dir = "upload";
    if(isset($_POST['dir'])) $upload_dir = $_POST['dir'];
    echo "file dir = " . $upload_dir . "<br><br>";
    foreach($_FILES['file_upload']['name'] as $key => $value){
        $name = $_FILES['file_upload']['name'][$key];
        $type = $_FILES['file_upload']['type'][$key];
        $size = $_FILES['file_upload']['size'][$key];
        $tmp_name = $_FILES['file_upload']['tmp_name'][$key];
        $error = $_FILES['file_upload']['error'][$key];

        if(move_uploaded_file($tmp_name, "{$upload_dir}/{$name}")){
            echo $key+1 . "번째 파일 업로드 성공<br>";
        } else {
            echo $key+1 . "번째 파일 업로드 실패<br>";
        }
        echo "name = " . $name . "<br>";
        echo "type = ". $type . "<br>";
        echo "size = ". $size . "byte<br>";
        echo "tmp_name = ". $tmp_name . "<br>";
        echo "error = ". $error . "<br><br>";
    }
    echo '<a href="index.php">돌아가기</a>';
    // if($fail == ''){
    //     echo '<script>alert("업로드 성공");</script>';
    //     echo "<script>location.replace('./?dir={$upload_dir}');</script>";
    // } else { 
    //     echo '<script>alert("'.$fail.'업로드 실패");</script>';
    //     echo "<script>location.replace('./);</script>";
    // }
?>