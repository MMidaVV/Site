<?php
    $mysqli = new mysqli('127.0.0.1:3306','root','','webshool');
    if ($mysqli->connect_errno) {
        echo $mysqli->connect_error;
        exit;
    }
    $result = $mysqli->query("SELECT * FROM `gallery`");
    if ($mysqli->errno) {
        echo $mysqli->error;
        exit;
    }
?>
<html>
    <head>
			<link href="https://fonts.googleapis.com/css?family=Rubik:400,900&display=swap&subset=cyrillic" rel="stylesheet">    	
            <meta charset="utf-8"/>
            <title>Галерея</title>
            <link href="Css\css5.css" rel="stylesheet" type="text/css"/>
            
    </head>
    <body background="Img\fon.jpg">
    	<div class="cherta">     
            <ul class="spisok">
                <li class="levo"><div>Галлерея:</div></li>
                <li class="right_spisok"><div>
                    <a class="ssilka margin" onmouseover="guidance(this)" onmouseout="noguidance(this)" id="1" href="index.html">Главное меню</a>
                    <a class="ssilka margin" onmouseover="guidance(this)" onmouseout="noguidance(this)" id="2" href="html3.html">Профиль</a>
                    <a class="ssilka margin" onmouseover="guidance(this)" onmouseout="noguidance(this)" id="3" href="html5.html">Галерея</a>
                    <a class="ssilka margin" onmouseover="guidance(this)" onmouseout="noguidance(this)" id="4" href="html6.html">Игра</a>

                </div></li>
            </ul>
        </div>
        <div class="wrapper">
            <div id="gallery">
                <div id="big-image-box"></div>
                <div id="buttons">
                    <button onclick="prev()" id="prev_pic"><----сюды</button> <button onclick="next()" id="next_pic">туды----></button>
                </div>
                <?php
                    $counter = 1;
                    $pictureCount = 0;
                    while($row = $result->fetch_assoc()){
                        if ($counter >= 5) {
                            ?>
                                <div class="gallery-line">
                            <?php
                        }
                            echo '<div class="image-box">'
                                . '<img class="min-image" id="'.$pictureCount.'" src="'.$row['path'].'">'
                                . '</div>';
                        if ($counter >= 5) {
                            ?>
                                </div>
                            <?php
                                $counter = 1;
                                continue;
                        }
                        $counter++;
                    }
                ?>
            </div>
        </div>
        <form method="POST" action="Php\savePhoto.php" enctype="multipart/form-data">
            <input type="file" name="photo">
            <input type="submit">
        </form>         
        <script>
            document.getElementById('gallery').onclick = function (event) {
                if (event.target.classList.contains("min-image")) {
                    showBig(event.target.getAttribute("src"), event.target.getAttribute("id"));
                }
            }

            function showBig(src,  pictureId) {
                let image = document.createElement("img");
                image.setAttribute("src", src);
                let showBlock = document.getElementById('big-image-box');
                image.setAttribute("id","big-image");
                image.setAttribute("picture_id", pictureId);
                showBlock.innerHTML = "";
                showBlock.append(image);
                document.getElementById('buttons').style.display = 'flex';
            }

            function next() {
                let pictureId = Number(document.getElementById('big-image').getAttribute('picture_id'));
                if (pictureId == <?php echo $pictureCount; ?>) {
                    pictureId = 1;
                } else {
                    pictureId++;
                }
                let picture = document.getElementById(pictureId);
                let pictureSrc = picture.getAttribute('src');
                showBig(pictureSrc, pictureId);
            }

            function prev() {
                let pictureId = Number(document.getElementById('big-image').getAttribute('picture_id'));
                if (pictureId == 1) {
                    pictureId = <?php echo $pictureCount; ?>;
                } else {
                    pictureId--;
                }
                let picture = document.getElementById(pictureId);
                let pictureSrc = picture.getAttribute('src');
                showBig(pictureSrc, pictureId);
            }

        </script>
        <script>
            function guidance(element){
                element.setAttribute("class", "guidance");
            }
            function noguidance(element){
                element.setAttribute("class", "noguidance");
            } 
        </script>
    </body>
</html>