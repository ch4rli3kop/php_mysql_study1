<?php
require('../lib/db.php');
$conn = db_init($config['host'], $config['duser'], $config['dpw'], $config['dname']); 
$result = mysqli_query($conn, 'SELECT * FROM topic;');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body id='target'>
    <header>
        <h1><a href="./index.php">JavaScript</a></h1>
    </header>
    <nav>
        <ol>
        <?php
            while($row = mysqli_fetch_assoc($result)){
                echo '<li><a href="./index.php?id='.$row['id'].'">'.$row['title'].'</a></li>'."\n";
            }
        ?>
        </ol>
    </nav>
    <div id='control'>
        <input type="button" value="white" id="white_btn">
        <input type="button" value='black' id="black_btn">
        <a href="./write.php">쓰기</a>
    </div>

    <article>
        <form action="./process.php" method="POST">
            <p>
                제목 : <input type="text" name="title">
            </p>
            <p>
                작성자 : <input type="text" name="author">
            </p>
            <p>
                본문 : <textarea name="description"></textarea>
            </p>
            <input type="submit">
        </form>
    </article>

    <script>
        wbtn = document.getElementById('white_btn');
        wbtn.addEventListener('click', function(){
            document.getElementById('target').className='white';
        })
        bbtn = document.getElementById('black_btn');
        bbtn.addEventListener('click', function(){
            document.getElementById('target').className='black';
        })
    </script>
</body>
</html>