<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>API Tester</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <form method="get" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
            <label for="post_num">Enter ID: </label>
            <input type="text" name="post_num" required> 
            <input type="submit" name="submit">
        </form>

        <?php
            require_once 'MyApiReader.php';
            $reader = new MyAPIReader('https://jsonplaceholder.typicode.com');

            if(isset($_GET['post_num']))
            {
                $post_num = $_GET['post_num'];
                $val = $reader->executeGet('/posts/' . $post_num);
                //print_r($val); ?>

                User ID: <?php echo $val['userId'] .'<br>'; ?>                
                Post ID: <?php echo $val['id'] .'<br>'; ?>
                Title: <?php echo $val['title'] .'<br>'; ?>
                Body: <?php echo $val['body'] .'<br>';  

            } 
        ?>

            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                <label for="title">Enter title: </label>
                <input type="text" name="title" required> 

                <label for="body">Enter body: </label>
                <input type="text" name="body" required> 

                <label for="userid">Enter userID: </label>
                <input type="text" name="userid" required> 

                <input type="submit" name="submit">
            </form>

        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $data = [
                    'title' => $_POST['title'],
                    'body' => $_POST['body'],
                    'userID' => $_POST['userid']
                ];
                $reader->executePost('/posts', $data);
            }
        ?>

    </body>
</html>
