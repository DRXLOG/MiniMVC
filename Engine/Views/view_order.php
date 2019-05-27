<section class="sec_form">
	<h2>Заказать пятаки</h2>
	<p>Пожалуйста заполните все поля формы и отправьте нам.</p>
	<form enctype="multipart/form-data" action="POST" class="form_order" method="POST">
		<label for="">Имя *</label>
		<div class="name_surname">
			<div id="name_surname">
				<input id="name" name="name" type="text" placeholder="">
				<label for="">Имя</label>
			</div>
			<div id="name_surname">
				<input id="surname" name="surname" type="text" placeholder="">
				<label id="label_surname" for="">Фамилия</label>		
			</div>			
		</div>
		<label for="">Телефон</label>
		<input name="phone" type="text" placeholder="+7 (495) 123-45-67">
		<label for="">Email *</label>
		<input name="email" type="text" placeholder="name@site.ru">

		<label for="">Наименование детали *</label>
		<input type="text">
		<p>укажите название опоры, например: пятак</p>
		<label for="">Количество *</label>
		<input type="number">
		<p>Укажите количество одинаковых деталей</p>
		<label for="">Описание</label>
		<textarea name="textarea" id="" cols="30" rows="10"></textarea>
		<p>Примерные габариты детали ДхШхВ см. Дополнительная информация особенности или пожелания, если есть.</p>
		<input id="addImages" type="file" multiple="true">

		<div id="UpImgLS">
			<div class="item template">
				<div class="img-wrap">
					<img src="image.jpg" alt="">
				</div>
				<div class="del_img">
					<p>-</p>
				</div>
			</div>
		</div>
		<!-- добавление элемента div -->
		<div class="g-recaptcha" data-sitekey="6LcCB6MUAAAAAMpUO5WbyjWfpA5ZcDoZ6_jTOGgl"></div>
		<!-- элемент для вывода ошибок -->
		<div class="text-danger" id="recaptchaError"></div>
		<!-- js-скрипт гугл капчи -->
		<script src='https://www.google.com/recaptcha/api.js'></script>

		<input id="enter_form" type="submit" placeholder="Отправить">
	</form>
</section>