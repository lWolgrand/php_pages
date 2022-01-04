<?php

 //conectando ao banco de dados. --endereço, nome do user, senha, nome do banco.
 $conn = mysqli_connect('localhost', 'wolgrand', 'xxxxxxxx', 'php_pages');

 //checando conexão. Função de erro 
 if(!$conn){
     echo 'Connection error: ' . mysqli_connect_error();
 }

//query para pizzas
$sql = 'SELECT title, ingredients, id FROM pizzas';

//fazer a query e obter o resultado
$result = mysqli_query($conn, $sql);

//fetch the resulting rows as an array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

print_r($pizzas);

?>

<!DOCTYPE html>
<html>
<head>    
    <title>Document</title>
</head>
<body>
    
<?php include('header.php'); ?>

<?php include('footer.php'); ?>


</html>
