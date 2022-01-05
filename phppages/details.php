<?php

include('config/db_conect.php');




if(isset($_POST['delete'])){

    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    $sql = "DELETE FROM pizzas WHERE id = $id_to_delete";

    if(mysqli_query($conn, $sql)){
        //deletado com sucesso
        header('Location: index.php');
    } else{
        //erro
        echo 'query error ' . mysqli_error($conn);
    }

}
//checando o request do id
if(isset($_GET['id'])){

    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // executando comando sql
    $sql = "SELECT * FROM pizzas WHERE id = $id";

    //obtendo o resultado da query
    $result = mysqli_query($conn, $sql);

    // resultado em array
    $pizza = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html>

<!-- inclusao de header separado em outro arquivo. (header.php).  -->
<?php include('header.php'); ?>

<div class="container center ">
    <?php if($pizza): ?>

        <h4><?php echo htmlspecialchars($pizza['title']); ?></h4>
        <p>Created by: <?php echo htmlspecialchars($pizza['email']); ?></p>
        <p><?php echo date($pizza['created_at']); ?></p>
        <h5>Ingredients:</h5>
        <p><?php echo htmlspecialchars($pizza['ingredients']); ?></p>

        <!-- Botão delete -->
        <form action="details.php" method="POST">
            <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id'] ?>">
            <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
        </form>

    <?php else: ?>

        <h5>No such pizza exists!</h5>

    <?php endif; ?>
</div>


<!-- Incluindo o footer sendo chamado de outro arquivo. (footer.php) -->
<?php include('footer.php'); ?>

</html>