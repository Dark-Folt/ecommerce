<?php
session_start();
/**
 * on verifi si la variable connect est defeni
 * si elle est defini on fait un session_destroy()
 * et on redirige le client vers la page de connexion
 */
if(isset($_SESSION['connect']))
{
	session_destroy();
	header('Location: ../../');
}
?>