<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Главная</title>
	<link rel="stylesheet" href="<?php echo MAIN_CSS_PATH;?>template_index.css">
	<link rel="stylesheet" href="<?php echo MAIN_CSS_PATH;?>index.css">	
	<link rel="stylesheet" href="<?php echo MAIN_CSS_PATH;?>contact.css">	
	<link rel="stylesheet" href="<?php echo MAIN_CSS_PATH;?>order.css">	
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<div class="cForm_main">
	<div id="exit_form">X</div>
	<h1>Обратная связь</h1>
	<form method="post" action="" id="cForm_form"> <br />
		<input type="text" size="32" maxlength="36" name="name" placeholder="Вaшe имя" val=""> <br />
		<input type="text" size="32" maxlength="36" name="email" placeholder="Вaш email" val=""> <br />
		<input type="text" size="32" maxlength="36" name="phone" placeholder="Ваш номер" val=""> <br />
		<input type="submit" value="Отправить"/>
	</form>
</div>
<div class="cForm_button"><img src="<?php echo MAIN_IMG_PATH; ?>phone.svg" alt=""></div>
<div class="main_block">
	<div class="main_menu">
		<ul>
			<li><a href="/">Главная</a></li>
			<li><a href="shop">Пятаки</a></li>
			<li><a href="contact">Контакты</a></li>
			<li><a href="order">Заказать</a></li>
		</ul>
	</div>	
	<?php include SITE_PATH.DS.'Engine'.DS.'Views'.DS.$content_view.'.php'; ?>
	<div class="main_footer">
		<h1>© Drxlog Script Foundation</h1>
	</div>
</div>
<script src="<?php echo MAIN_JS_PATH; ?>jquery-3.4.0.js"></script>
<script src="<?php echo MAIN_JS_PATH; ?>index.js"></script>
<script src="<?php echo MAIN_JS_PATH; ?>form_order.js"></script>
</body>
</html>