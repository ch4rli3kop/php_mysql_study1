<?php
    $conn = mysqli_connect('localhost', 'root', '971224');
    mysqli_select_db($conn, 'opentutorials');
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
                echo '<li><a href="./index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>'."\n";
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
    <?php
    if(!empty($_GET['id'])){
        $sql = 'SELECT topic.id, title, description, name FROM topic LEFT JOIN user ON topic.author = user.id WHERE topic.id='.$_GET['id'];
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo '<h2>'.htmlspecialchars($row['title']).'</h2>';
        echo '<p>'.htmlspecialchars($row['name']).'</p>';
        echo strip_tags($row['description'], '<a><h1><h2><h3><h4><h5><ol><ul><li>');
    }
    ?>
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