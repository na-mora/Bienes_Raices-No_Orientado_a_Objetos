<?php

require 'app.php';

// En la funcion se define para que no sea ncessario el isset
function incluirTemplate($nombre, $inicio=false){
  
    include TEMPLATE_URL.$nombre.".php"; 

   
}

function estaAutenticado(): bool{
    // 18) Recibimos la informacion de $session 
    session_start(); // Ya podemos ingresar a la informacion de $_SESSION  

    // 19) Solo dejamos que entren a esta pagina las personas que estan autenticadas
    $auth = $_SESSION['login'];
    if($auth){

        return true;
    }
    
    return false;
    
    
}

?>