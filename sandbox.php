<?php

    //ternary operators

     $score = 20;

    // if($score >40) {
    //     echo 'High score!';
    // } else {
    //     echo 'Low score!';
    // }

    // $value = $score > 40 ? 'high score!' : 'low score :(';
    // echo $value;

    // echo $score > 40 ? 'high score!' : 'low score :(';

    //echo $_SERVER['SERVER_NAME'];

    
    // sessions
    if(isset($_POST['submit'])) {

        // cookie for gender
        setcookie('gender', $_POST['gender'], time() +86400);

        session_start();

        $_SESSION['name'] = $_POST['name'];

        //echo $_SESSION['name'];

        header('Location: index.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

        <input type="text" name="name">

        <select name="gender">

            <option value="male">male</option>

            <option value="female">female</option>

        </select>

        <input type="submit" name="submit" value="submit">
        
    </form>
    
</body>
</html>