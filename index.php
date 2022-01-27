<?php
require_once("config.php");

$sql = new Sql();

$use = new Usuario();

/* $use->loadById(2); 
echo $use;*/

/* 
// Retorna uma lista de usuários no banco
$lista = Usuario::getList();

echo json_encode($lista);
 */

/* // Procura um Usuário no banco
$search = Usuario::Search("Nyx");

echo json_encode($search);
 */

//Autentificação
$usuario = new Usuario();

$login = "Nyx";
$password = "q2223e";

echo $usuario->Login($login, $password);
echo $usuario;


/* $usuarios = $sql->select("SELECT * FROM tb_usuarios");

echo json_encode($usuarios); */
