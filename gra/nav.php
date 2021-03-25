<?php
	include "config.php";
?>
<nav id="nav">
	<a href="index.php" style="float: left"><?php echo $lang['stronag'] ?></a>
	<a href="news.php" style="float: left"><?php echo $lang['news'] ?></a>
	<a href="contact.php" style="float: left"><?php echo $lang['kontakt'] ?></a>
	<?php if (isset($_SESSION['active'])) { ?>
		<a href="account.php" style="float: left"><?php echo $lang['acc'] ?></a>
		<a href="logout.php" style="float: left"><?php echo $lang['wyl'] ?></a>
		<a class="login-info" style="float: left"><?php echo $lang['zal'].$_SESSION['active']; ?></a>
	<?php 
	}
	else {
	?>
		<a href="login.php" style="float: left"><?php echo $lang['zal2'] ?></a>
	<?php
	}
	?>
    <a href="rules.php" style="float: left"><?php echo $lang['zasady'] ?></a>
	<?php
		$address=substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'], "?"));
	?>
    <a href="<?php echo $address;?>?lang=en" style="float: right"><img src="images/en.png" ></a>
     <a href="<?php echo $address;?>?lang=pl" style="float: right"><img src="images/pl.png"></a>
      
</nav>