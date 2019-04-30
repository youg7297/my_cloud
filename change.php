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
    $ch_name = "";
    $be_name = "";
    if(isset($_GET["dir"])){
        $dir = $_GET["dir"];
    }
    if(isset($_GET["ch_name"])){
        $ch_name = $_GET["ch_name"];
    }

    if(isset($_GET["be_name"])){
        $be_name = $_GET["be_name"];
    }
    if(rename($dir.$be_name, $dir.$ch_name)){
        echo "File name change succeeded.";
        echo "<br>Before filename change : ".$be_name;
        echo "<br>After changing the file name : ".$ch_name;
    } else {
        echo "File name change failed<br>";
    }
    echo "<br><a href='index.php'>go back</a>"
?>