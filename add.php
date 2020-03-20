<?php

    // if(isset($_GET['submit'])){
    //     echo $_GET['email'];
    //     echo $_GET['title'];
    //     echo $_GET['ingredients'];
    // }

    include('config/db_connect.php');

    $title = $email = $ingredients = '';
    $errors = array('email'=>'', 'title'=>'', 'ingredients'=>'');

    if(isset($_POST['submit'])){

        //check email
        if(empty($_POST['email'])){
            $errors['email'] = 'An email is required <br />';
        } else {
            //echo htmlspecialchars($_POST['email']);
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'Email must be a valid email adress';
            }            
        }

        //check title
        if(empty($_POST['title'])){
            $errors['title'] = 'An title is required <br />';
        } else {
            //echo htmlspecialchars($_POST['title']);
            $title = $_POST['title'];
            // regEx for letters and spaces only
            //if(!preg_match('/^[a-zA-Z ]*$/', $title)){
            //regEx for letters,numbers and spaces only
            if(!preg_match('/^[a-zA-Z0-9\s]+$/', $title)){
                $errors['title'] = 'Title must be letters and spaces only!';
            }
        }

        //check ingredients
        if(empty($_POST['ingredients'])){
            $errors['ingredients'] =  'At least one ingredient is required <br />';
        } else {
            //echo htmlspecialchars($_POST['ingredients']);
            $ingredients = $_POST['ingredients'];
            // regEx for comma separated list
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
                $errors['ingredients'] = 'Ingredients must be a comma separated list!';
            }
        }

        // Redirect there's not any errors
        if(array_filter($errors)){
            //echo 'errors in the form';
        } else {

            //echo 'form is valid';

            // protect data goin to DB before SQL injection
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

            //create sql
            $sql = "INSERT INTO pizzas (title, ingredients, email) VALUES ('$title', '$ingredients', '$email')";

            // save to db and check
            if(mysqli_query($conn, $sql)){
                //success
                header('location: index.php');

            } else {
                // error
                echo 'query error: ' . mysqli_error($conn);
            }
            
            
        }



    }// end of POST check

?>



<!DOCTYPE html>
<html>

    <?php include 'templates/header.php'?>

    <section class="container grey-text">

        <h4 class="center">Add a Pizza</h4>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="white">
            <!-- EMAIL -->
            <label>Your Email:</label>
            <input type="text" name="email" value="<?php echo htmlspecialchars($email);?>">
            <div class="red-text"><?php echo $errors['email'];?></div>

            <!-- PIZZA TITTLE -->
            <label>Pizza Title:</label>
            <input type="text" name="title" value="<?= htmlspecialchars($title) ?>">
            <div class="red-text"><?php echo $errors['title'];?></div>

            <!-- INGREDIENTS -->
            <label>Ingredients (comma separated):</label>
            <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients);?>">
            <div class="red-text"><?php echo $errors['ingredients'];?></div>

            <!-- SUBMIT BTN -->
            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
            </div>

        </form>

    </section>

    <?php include 'templates/footer.php'?>
    
</html>