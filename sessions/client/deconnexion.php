<?php
session_start();
if(isset($_SESSION['connect']))
{
	session_destroy();
	header('Location: ../../');
}
?>