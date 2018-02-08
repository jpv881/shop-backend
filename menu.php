<?php
	session_start();
	if(isset($_GET['lang'])){
		$_SESSION['lang'] = $_GET['lang'];
	}
	
	$lang = $_SESSION['lang'];
	include("languages.php");
    ?>

<!-- start header -->
<div class="top_bg">
<div class="wrap">
	<div class="header">
		<div class="logo">
			<a href="index.php"><img src="images/logo.png" alt=""/></a>
		</div>
		<div class="logo">
			<a href="index.php?lang=es"><img src="img/es.png"></a>
			<a href="index.php?lang=en"><img src="img/en.png"></a>
		</div>
		 <div class="log_reg">
				<ul>
					<li><a href="login.php"><?php echo __('Login', $lang) ?></a> </li>
					<span class="log"> <?php echo __('or', $lang) ?> </span>
					<li><a href="register.php"><?php echo __('Register', $lang) ?></a> </li>								   
					<div class="clear"></div>
				</ul>
		</div>	
		<div class="web_search">
		 	<form>
				<input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
				<input type="submit" value=" " />
			</form>
	    </div>						
		<div class="clear"></div>

	</div>	
</div>
</div>
<!-- start header_btm -->
<div class="wrap">
<div class="header_btm">
		<div class="menu">
			<ul>
				<li class="active"><a href="index.php"><?php echo __('Home', $lang) ?></a></li>
				<li><a href="products.php?<?php echo $lang; ?>"><?php echo __('Products', $lang) ?></a></li>
				<li><a href="about.php"><?php echo __('About', $lang) ?></a></li>
				<li><a href="index.php"><?php echo __('Pages', $lang) ?></a></li>
				<li><a href="contact.php"><?php echo __('Contact', $lang) ?></a></li>
				<div class="clear"></div>
			</ul>
		</div>
		<div id="smart_nav">
			<a class="navicon" href="#menu-left"> </a>
		</div>
		<nav id="menu-left">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="products.php">products</a></li>
				<li><a href="about.php">about</a></li>
				<li><a href="index.php">pages</a></li>
				<li><a href="contact.php">Contact</a></li>
				<div class="clear"></div>
			</ul>
		</nav>
