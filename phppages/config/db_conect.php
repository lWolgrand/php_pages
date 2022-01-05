<?php

 //conectando ao banco de dados. --endereço, nome do user, senha, nome do banco.
 $conn = mysqli_connect('localhost', 'wolgrand', 'ninety.quatro', 'php_pages');

 //checando conexão. Função de erro 
 if(!$conn){
     echo 'Connection error: ' . mysqli_connect_error();
 }

 ?>