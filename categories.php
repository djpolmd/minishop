<!doctype html>
<html>
	<head>
		<title>ft_minishop</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="css/ft_minishop.css">
		<link rel="stylesheet" type="text/css" href="css/categories_css.css">
	</head>
	<body>
		<div class="main-box">
			
			<!--  PHP Code Header  -->
			<?php
			require($_SERVER['DOCUMENT_ROOT']."/header.php"); 
			?>
			
			<div class="content-box">
				
				<!-- PHP Content Box -->
				
			<?php 
				include('settings/const.php');
				
				if (!isset($_GET['cat']))
					load_index_php();
					
				$request = "SELECT name FROM categories WHERE id='".
					mysqli_real_escape_string($sql_ptr, $_GET['cat'])."';";
				$result = mysqli_query($sql_ptr, $request);
				if (mysqli_num_rows($result) <= 0 ||
						!($row = mysqli_fetch_assoc($result)))
					load_index_php();
				echo '<div class="cat-header">'.ucfirst($row['name']).'</div>';
				$request = "SELECT id, name, price FROM items ".
					"WHERE category_id='".
					mysqli_real_escape_string($sql_ptr, $_GET['cat'])."' OR category_id2='".
					mysqli_real_escape_string($sql_ptr, $_GET['cat'])."';";
				$result = mysqli_query($sql_ptr, $request);
				
				if (mysqli_num_rows($result) > 0)
				{
					$itemPage = "/item.php?id=";
					while ($row = mysqli_fetch_assoc($result))
					{
						$ipath;
						if (!isset($row['id']) ||
							!($ipath = "$imgs_path/".$row['id'].'.jpeg') ||
							!file_exists($_SERVER['DOCUMENT_ROOT'].IPATH) ||
							($dat = getimagesize($_SERVER['DOCUMENT_ROOT'].IPATH)) === false ||
							$dat['mime'] !== 'image/jpeg')
								 IPATH;
								
						echo '<div class="cat-item-box"><div>'.
							'<a href="'.$itemPage.$row['id'].'">'.
							'<img src="'.$ipath.'" />'.
							'<div>'.$row['name'].' '.
							money_format('%!10.2n '.CURRENCY, (float)$row['price'] / 100.).
							'</div>'.
							"</a></div></div>";
					}
				}
				else
					echo "empty...";
				?>
			</div>
			<?php require($_SERVER['DOCUMENT_ROOT']."/footer.html");
			
			?>
		</div>
	</body>
</html>
