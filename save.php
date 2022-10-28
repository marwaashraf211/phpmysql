<?php
$connection=require_once('connection.php');

if(isset($_GET['id']))
{
    $connection->updateNote($id,$_POST);
}
else
{
    $connection->addNote($_POST);
}

header("location:index.php");


?>