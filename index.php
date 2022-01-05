<?php

include('config/db_conect.php');

//query para pizzas
$sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

//fazer a query e obter o resultado
$result = mysqli_query($conn, $sql);

//fetch the resulting rows as an array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

//resultado
mysqli_free_result($result);

//fechando conexão
mysqli_close($conn);



// print_r($pizzas);

?>

<!DOCTYPE html>
<html>
<head>    
    <title>Document</title>
</head>
<body>
    
<!-- inclusao de header separado em outro arquivo.  -->
<?php include('header.php'); ?>

<h4 class="center grey-text">Pizzas!</h4>

<div class="container">
    <div class="row">
        
        <?php foreach($pizzas as $pizza): ?>

            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <div class="cad-content center">

                        <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                        <ul>
                            <?php foreach(explode(',', $pizza['ingredients']) as $ing): ?>

                            <li> <?php echo htmlspecialchars($ing); ?></li>

                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="card-action right-align">
                        <a class="brand-text" href="details.php?id=<?php echo $pizza['id']?>">more info</a>
                    </div>
                </div>
            </div>

            <?php endforeach; ?>

            <?php if(count($pizzas) >=3): ?>
                <p>there are 3 or more pizzas</p>
            <?php else: ?>
                <p>there are less than 3 pizzas</p>
            <?php endif; ?>


        </div>
    </div>
</div>


<!-- Incluindo o footer sendo chamado de outro arquivo. (footer.php) -->
<?php include('footer.php'); ?>


</html>