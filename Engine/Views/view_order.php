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
        <h3>Пожалуйста добавьте информацию о деталях</h3>
		<label for="">Наименование детали *</label>
		<input type="text" id="detailname" name="" value="">
		<p>укажите название опоры, например: пятак</p>
		<label for="">Количество *</label>
		<input type="number" id="detailcol" name="" >
		<p>Укажите количество одинаковых деталей</p>
		<label for="">Описание</label>
		<textarea name="" id="detailarea" cols="30" rows="10"></textarea>
		<p>Примерные габариты детали ДхШхВ см. Дополнительная информация особенности или пожелания, если есть.</p>
        <div class="file_upload">
            <label id="file_upload_label">
                <img src="<?php echo MAIN_IMG_PATH;?>upload.svg" alt="">
                <span>Перетащите или выберите файлы</span>
                <input type="file" name="pictures[]" id="addImages" multiple="true" >
            </label>
        </div>
        <div class="prewiew_files">

        </div>
        <div class="detail">
            <div class="control_el">
                <p>Добавить или удалить деталь</p>
                <input type="checkbox" class="checkbox" id="checkbox1" />
                <label for="checkbox1"><p>Выделить все</p></label>
                <div class="new_detail"><img src="<?php echo MAIN_IMG_PATH;?>plus.svg" alt=""></div>
                <div class="delete_all_detail"><img src="<?php echo MAIN_IMG_PATH;?>minus.svg" alt=""></div>
            </div>
            <div class="view_el">
                <div class="new_el" id="1_el">
                    <div class="new_control_el">
                        <span class="new_name_el">Деталь № 1</span>
                        <input type="checkbox" class="checkbox" id="checkbox2" />
                        <label for="checkbox2"><p>Выделить</p></label>
                        <div class="new_change_el"><img src="<?php echo MAIN_IMG_PATH;?>compose.svg" alt=""></div>
                        <div class="new_del_el"><img src="<?php echo MAIN_IMG_PATH;?>error.svg" alt=""></div>
                    </div>
                    <div class="new_content_el">
                        <p>Наименование детали: Колбаса</p>
                        <p>Количество: 2</p>
                        <p>Описание: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusamus adipisci at aut cum debitis dolore dolores ducimus harum magni modi necessitatibus, nihil qui quis recusandae, repellat rerum! Dolores, fugit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid asperiores commodi dignissimos dolorum, ea, eaque esse et excepturi exercitationem harum laborum magni odio perspiciatis quam quia sapiente sed ullam veniam! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur aut autem consectetur debitis, deserunt distinctio doloremque eius error esse facilis fugit harum maxime neque nihil non possimus praesentium ullam unde!</p>
                    </div>
                    <div class="new_files_el">
                        <div class="new_files_wrap_el"><img src="temp/temp_img/Деталь_0_f1.png" alt=""></div>
                        <div class="new_files_wrap_el"><img src="temp/temp_img/Деталь_0_DFGD2986.JPG" alt=""></div>
                        <div class="new_files_wrap_el"><img src="temp/temp_img/Деталь_0_G_A1zercGAc.jpg" alt=""></div>
                        <div class="new_files_wrap_el"><img src="temp/temp_img/Деталь_0_site1.png" alt=""></div>
                        <div class="new_files_wrap_el"><img src="temp/temp_img/Деталь_0_site2.png" alt=""></div>
                    </div>
                </div>
                <div class="new_el" id="2_el">
                    <div class="new_control_el">
                        <span class="new_name_el">Деталь № 2</span>
                        <input type="checkbox" class="checkbox" id="checkbox3" />
                        <label for="checkbox3"><p>Выделить</p></label>
                        <div class="new_change_el"><img src="<?php echo MAIN_IMG_PATH;?>compose.svg" alt=""></div>
                        <div class="new_del_el"><img src="<?php echo MAIN_IMG_PATH;?>error.svg" alt=""></div>
                    </div>
                    <div class="new_content_el">
                        <p>Наименование детали: Колбаса</p>
                        <p>Количество: 2</p>
                        <p>Описание: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusamus adipisci at aut cum debitis dolore dolores ducimus harum magni modi necessitatibus, nihil qui quis recusandae, repellat rerum! Dolores, fugit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid asperiores commodi dignissimos dolorum, ea, eaque esse et excepturi exercitationem harum laborum magni odio perspiciatis quam quia sapiente sed ullam veniam! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur aut autem consectetur debitis, deserunt distinctio doloremque eius error esse facilis fugit harum maxime neque nihil non possimus praesentium ullam unde!</p>
                    </div>
                    <div class="new_files_el">
                        <div class="new_files_wrap_el"><img src="temp/temp_img/Деталь_0_f1.png" alt=""></div>
                        <div class="new_files_wrap_el"><img src="temp/temp_img/Деталь_0_DFGD2986.JPG" alt=""></div>
                        <div class="new_files_wrap_el"><img src="temp/temp_img/Деталь_0_G_A1zercGAc.jpg" alt=""></div>
                        <div class="new_files_wrap_el"><img src="temp/temp_img/Деталь_0_site1.png" alt=""></div>
                        <div class="new_files_wrap_el"><img src="temp/temp_img/Деталь_0_site2.png" alt=""></div>
                    </div>
                </div>
                <div class="new_el" id="1_el">
                    <div class="new_control_el">
                        <span class="new_name_el">Деталь № 3</span>
                        <input type="checkbox" class="checkbox" id="checkbox4" />
                        <label for="checkbox4"><p>Выделить</p></label>
                        <div class="new_change_el"><img src="<?php echo MAIN_IMG_PATH;?>compose.svg" alt=""></div>
                        <div class="new_del_el"><img src="<?php echo MAIN_IMG_PATH;?>error.svg" alt=""></div>
                    </div>
                    <div class="new_content_el">
                        <p>Наименование детали: Колбаса</p>
                        <p>Количество: 2</p>
                        <p>Описание: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusamus adipisci at aut cum debitis dolore dolores ducimus harum magni modi necessitatibus, nihil qui quis recusandae, repellat rerum! Dolores, fugit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid asperiores commodi dignissimos dolorum, ea, eaque esse et excepturi exercitationem harum laborum magni odio perspiciatis quam quia sapiente sed ullam veniam! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur aut autem consectetur debitis, deserunt distinctio doloremque eius error esse facilis fugit harum maxime neque nihil non possimus praesentium ullam unde!</p>
                    </div>
                    <div class="new_files_el">
                        <div class="new_files_wrap_el"><img src="temp/temp_img/Деталь_0_f1.png" alt=""></div>
                        <div class="new_files_wrap_el"><img src="temp/temp_img/Деталь_0_DFGD2986.JPG" alt=""></div>
                        <div class="new_files_wrap_el"><img src="temp/temp_img/Деталь_0_G_A1zercGAc.jpg" alt=""></div>
                        <div class="new_files_wrap_el"><img src="temp/temp_img/Деталь_0_site1.png" alt=""></div>
                        <div class="new_files_wrap_el"><img src="temp/temp_img/Деталь_0_site2.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
		<input type="submit" id="enter_form" placeholder="Отправить">
	</form>
</section>