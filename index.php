<?php
require_once("config.php");

$sql = new Sql();

$use = new Usuario();

$use->loadById(2);

echo $use;
/* $usuarios = $sql->select("SELECT * FROM tb_usuarios");

echo json_encode($usuarios); */
