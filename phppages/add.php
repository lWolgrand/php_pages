<?php

// if(isset($_GET['submit'])){
//     echo $_GET['email'];
//     echo $_GET['title'];
//     echo $_GET['ingredients'];
// }

$title = $email = $ingredients = '';
$errors = array('email'=>'', 'title'=>'', 'ingredients'=>'');

if(isset($_POST['submit'])){
   
    //check de email
    if(empty($_POST['email'])){
        $errors['email'] = 'An email is requiered <br />';
    } else{
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'email must be a valid email adress';
        }
    }

    //check de titulo
    if(empty($_POST['title'])){
        $errors['title'] = 'A title is requiered <br />';
    } else{
        //uso de regex para validar Title
        $title = $_POST['title'];
        if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
            $errors['title'] = 'Title must be letter and spaces only';
        }
    }
    
    //check de email
    if(empty($_POST['ingredients'])){
        $errors['ingredients'] = 'At least one ingredient is requiered <br />';
        
    } else{
        $ingredients = $_POST['ingredients'];
        //uso de regex para validar campo de ingrediente
        if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
            $errors['ingredients'] = 'Ingredients must be a comma separated list';
        }

    }
    
    if(array_filter($errors)){
        // echo 'errors in the form';
    } else {
        // echo 'form is valid';
        header('Location: index.php');
    }

}

?>

<!DOCTYPE html>
<html>
<head>    
    <title>Document</title>
</head>
<body>
    
<?php include('header.php'); ?>

<section class="container grey-text">
    <h4 class="center"> Add Pizza</h4>
    
    <form class="white" action="add.php" method="POST">

        <label> Your email: </label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
        <div class="red-text"><?php echo $errors['email']; ?></div>

        <label> Pizza Title: </label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
        <div class="red-text"><?php echo $errors['title']; ?></div>

        <label> Ingredients: </label>
        <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
        <div class="red-text"><?php echo $errors['ingredients']; ?></div>

        <div class="center">             
            <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">        
        </div>

    </form>
</section>     

<?php include('footer.php'); ?>


</html>