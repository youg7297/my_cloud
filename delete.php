<script src="jquery-3.2.1.min.js"></script>
<script>
$(document).keydown(function (e) {
     if (e.which === 116) {
         if (typeof event == "object") {
             event.keyCode = 0;
         }
         return false;
     } else if (e.which === 82 && e.ctrlKey) {
         return false;
     }
}); 
</script>
<?php
    $dir = "";
    $f_name = "";
    if(isset($_GET["dir"])){
        $dir = $_GET["dir"];
    }
    if(isset($_GET["f_name"])){
        $f_name = $_GET["f_name"];
    }
    echo $dir.$f_name;
    if(unlink("$dir$f_name")){
        echo "파일이름 : ".$f_name;
        echo "<br>파일삭제 성공";
    }
    echo "<br><a href='index.php'>go back</a>";
?>