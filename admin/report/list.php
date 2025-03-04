<?php 
	 if (!isset($_SESSION['U_ROLE'])=='Administrator'){
      redirect(web_root."admin/index.php");
     } 
?>

 
<h1 align="center">To access this features please contact jannopalacios@gmail.com.</h1>