<?php

include('settings/const.php');

function load_index_php()
{
	header(DName);
	exit ;
}

function save_action_and_reload($action)
{
	$_SESSION['last_action'] = $action;
	   $_POST['submit_type'] = NULL;
	header("location: ".$_SERVER['REQUEST_URI']);
	exit ;
}

function save_action_and_reload_noget($action)
{
	$_SESSION['last_action'] = $action;
     	$_POST['submit_type'] = NULL;
	header("location: ".$_SERVER['PHP_SELF']);
	exit ;
}

session_start();

$sql_ptr = mysqli_connect("localhost", "djpolmd", "", "rush00");   //database credensials -> must change

	if (!$sql_ptr || !mysqli_set_charset($sql_ptr, "utf8"))
		exit("mySQL error: ".mysqli_connect_error().PHP_EOL);

	if (!empty($_SESSION['last_action']))
	{
		echo '<div class="top-alert-box">'.
			$_SESSION['last_action'].
			'</div>';
		$_SESSION['last_action'] = NULL;
	}

?>

	<!-- Categories routes -->
		
<div class="top-box">
	<h1 class="site-title">
		<a href="/">Academy+Shop</a>
	</h1>
	<table>
		<tr>													
			<th><a href="/categories.php?cat=1">Clouth</a></th>
			<th><a href="/categories.php?cat=2">Tech</a></th>
			<th><a href="/categories.php?cat=3">Soft</a></th>
			<th><a href="/categories.php?cat=4">Hardware</a></th>
			<th><a href="/categories.php?cat=5">Other</a></th>
		</tr>
	</table>
</div>
