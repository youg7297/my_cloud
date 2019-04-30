<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CLOUD</title>
    <script src="jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<?php
    $directory = "upload/";
    if(isset($_GET['dir'])) $directory = $_GET['dir'];
?>
<body>
    <div class="context">
        <div class="name"></div>
        <a href="" id="download" download>다운</a>
        <div class="delete">삭제</div>
        <div class="change">이름 변경</div>
    </div>
    
    <header>
        <p class="title">
            <a href="../cloud">MY CLOUD</a>
        </p>
    </header>
    <div class="menu">
        <form action="upload.ok.php" method="post" enctype="multipart/form-data">
            <label for="file_upload"><div class="upload_btn">파일 선택</div></label>
            <input type="file" name="file_upload[]" id="file_upload" multiple>
            <div id="cnt_file">0개 파일 선택</div>
            <input type="hidden" name="dir" value="<?=$directory?>">
            <button type="submit" class="upload_btn" id="ok_upload">파일 업로드</button>
        </form>
        <form action="mkdir.ok.php" method="post">
            <input type="text" class="new_folder" placeholder="폴더명" name="folder" required>
            <button type="submit" class="upload_btn">폴더 만들기</button>
            <input type="hidden" name="dir" value="<?=$directory?>">
        </form>
    </div>
    <ul class="file_list">
        <?php
        function scan($dir){
            $files = scandir($dir);
            foreach($files as $value){
                if($value == "." || $value == "..") continue;
                if(is_dir("{$dir}/{$value}")){
        ?>
            <a href="?dir=<?= $dir ?><?= $value ?>/">
                <li class="file folder" title="<?= $value ?>" data-name="<?= $value?>" data-type="folder">
                    <form action="change.php" id="change">
                        <p class="p"><?= $value?></p>
                        <input type="hidden" value="<?=$value?>" name="be_name">
                        <input type="hidden" value="<?=$dir?>" name="dir">
                    </form>
                    <form action="delete.php" id="delete">
                        <input type="hidden" value="<?=$value?>" name="f_name">
                        <input type="hidden" value="<?=$dir?>" name="dir">
                    </form>
                </li>
            </a>
        <?php
                } else {
        ?>
            <li class="file doc" title="<?= $value ?>" data-name="<?= $value?>" data-type="doc">
                <form action="change.php" id="change">
                    <p class="p"><?= $value?></p>
                    <input type="hidden" value="<?=$value?>" name="be_name">
                    <input type="hidden" value="<?=$dir?>" name="dir">
                </form>
                <form action="delete.php" id="delete">
                    <input type="hidden" value="<?=$value?>" name="f_name">
                    <input type="hidden" value="<?=$dir?>" name="dir">
                </form>
            </li>
        <?php
                }
            }
        }
        scan($directory);
        ?>
    </ul>
</body>
<script>
    $('#file_upload').change(function(){
        var files = $('#file_upload').prop('files');
        $('#cnt_file').text(files.length+"개 파일 선택");
        console.log(files);
    });
    $("#ok_upload").click(function(){
        if($('#file_upload').prop('files').length < 1){
            alert("파일을 선택하세요");
            return false;
        }
    });

    document.oncontextmenu = function() { return false; };


    $(document).click(function(){
        $('.context').hide();
    });
    $('.file').on('contextmenu', function(e){
        var name = $(this).attr("data-name");
        var type = $(this).attr("data-type");
        var x = e.pageX;
        var y = e.pageY;
        $('.name').text(name);
        $('#download').attr("href","<?= $directory ?>/"+name);
        $('#download').attr(name);
        $(".delete").click(function(){
            var conf = confirm("정말 삭제하시겠습니까?");
            if(conf == true){
                $("#delete").submit();
            }
        });
        $('.change').click(function(){
            var p = $(".file[data-name='"+name+"'] p");
            $(p).replaceWith('<input type="text" value="'+name+'" name="ch_name">');
            $(".file input").focus();
            $('#change').keydown(function(e) {
                if (e.keyCode == 13) {
                    $('#change').submit();
                }
            });
        });
        $('#change').attr("value", name);
        $('.context').css({
            top : y,
            left : x,
            display : "block"
        });
    });
</script>
</html>