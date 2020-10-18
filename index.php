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
    <h3>Make a GET request</h3>    
    <form method="get" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
            <fieldset>    
                <label for="post_num">Post ID: </label>
                <input type="text" name="post_num" required> 
                <input type="submit" name="submit">
            </fieldset>
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
            <h3>Make a POST request</h3> 
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                <fieldset>
                    <label for="title">Title: </label>
                    <input type="text" name="title" required> 
                    <br>
                    <label for="body">Body: </label>
                    <input type="text" name="body" required> 
                    <br>
                    <label for="userid">UserID: </label>
                    <input type="text" name="userid" required> 
                    <input type="submit" name="submit">
                </fieldset>
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
