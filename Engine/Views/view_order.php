<section class="sec_form">
	<h2>Заказать пятаки</h2>
	<p>Пожалуйста заполните все поля формы и отправьте нам.</p>
	<form enctype="multipart/form-data" action="" class="form_order" method="POST">
        <label for="">Имя *</label>
		<div class="name_surname">
			<div id="name_surname">
				<input type="text" id="name" name="namer"  placeholder="">
				<label for="">Имя</label>
			</div>
			<div id="name_surname">
				<input type="text" id="surname" name="surname"  placeholder="">
				<label id="label_surname" for="">Фамилия</label>		
			</div>			
		</div>
		<label for="">Телефон</label>
		<input type="text" name="phone"  placeholder="+7 (495) 123-45-67">
		<label for="">Email *</label>
		<input type="text" name="email"  placeholder="name@site.ru">

		<label for="">Наименование детали *</label>
		<input type="text" id="detailname" name="" value="">
		<p>укажите название опоры, например: пятак</p>
		<label for="">Количество *</label>
		<input type="number" id="detailcol" name="" >
		<p>Укажите количество одинаковых деталей</p>
		<label for="">Описание</label>
		<textarea name="" id="detailarea" cols="30" rows="10"></textarea>
		<p>Примерные габариты детали ДхШхВ см. Дополнительная информация особенности или пожелания, если есть.</p>
		<input type="file" name="pictures[]" id="addImages" multiple="true" >

        <div class="detail">
            <div class="new_detail">+</div>
            <div class="delete_all_detail">-</div>
        </div>
		<input type="submit" id="enter_form" placeholder="Отправить">
	</form>
</section>