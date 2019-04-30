<?php
$dir = $_POST['dir'];
$folder = $_POST['folder'];
$upload_dir = "{$dir}/{$folder}";
if(trim($folder) == ""){
    exit("<script>alert('파일이름을 공백은 안됩니다.'); location.replace(document.referrer);</script>");
} 
mkdir("{$upload_dir}");
?>
<script>location.replace(document.referrer);</script>