$(document).ready(function () {
    var dropZone = $('#file_upload_label'); //Дропзона
    var maxFileSize = 2000000; //2 мегабута
    var ListingEl = [];

    if (typeof(window.FileReader) == 'undefined') {
        dropZone.text('Не поддерживается браузером!');
        dropZone.addClass('error');
    }

    dropZone[0].ondragover = function() {
        dropZone.addClass('hover');
        return false;
    };

    dropZone[0].ondragleave = function() {
        dropZone.removeClass('hover');
        return false;
    };

    dropZone[0].ondrop = function(event) {
        event.preventDefault();
        dropZone.removeClass('hover');
        dropZone.addClass('drop');
        //dropZone.text('Файл норм!');
        var files = event.dataTransfer.files;

        if (files.size > maxFileSize) {
            dropZone.text('Файл слишком большой!');
            dropZone.addClass('error');
            return false;
        }
        console.log(files);
        //console.log(fileReader, file, url);
        for (var i = 0; i < files.length; ++i) {
            preview(files[i]);
        }

        //$('#uploadImagesList').append('<img src="' + images + '">');
            //console.log("Filename: " + files.name);
            //console.log("Type: " + files.type);
            //console.log("Size: " + files.size + " bytes");
            //console.log(files);
            //console.log("Файлы Добавлены");

    };
    $('#addImages').on('change', function () {
        var files = document.getElementById("addImages").files;
        console.log(files);
        //console.log(fileReader, file, url);
        for (var i = 0; i < files.length; ++i) {
            preview(files[i]);
        }
        console.log("Добавить деталь");
    });

    function addListingEl(id, name, number, description, fileList) {
        for (var i = 0; i < ListingEl.length; ++i) {
            if (ListingEl[i] == id) {
                alert('Элемент с данным идентификатором присутствует');
                return false;
            } else {                        //РАЗОБРАТЬСЯ С ЭТИМ
                ListingEl.push(id);
                ListingEl[id] = [name, number, description, fileList];
                return
            }
        }

    }

    function preview(file) {
            var fileReader = new FileReader();
            fileReader.onload = function() {
                var url = fileReader.result;
                // Something like: data:image/png;base64,iVBORw...Ym57Ad6m6uHj96js
                console.log(url);
                //
                $('.prewiew_files_el').append('<div class="new_files_wrap_el" id="IMG'+ file.size +'f">');
                $('#IMG' + file.size + 'f').append('<img src="' + url + '">');
                //$('.new_files_el').append('</div>');
            }
            fileReader.readAsDataURL(file);
    }

    $('.new_detail').on('click', function () {

        addListingEl(0,'Залупа', 20, 'zalupa', 'file');

        //$('.view_el').append('<div class="new_el" id="IMG'+ file.size +'f">');
        console.log(ListingEl);
        console.log("Добавить деталь");
    });

    $('.delete_all_detail').on('click', function () {
        console.log("Удалить выделенные детали");
    });

    $('.new_change_el').on('click', function () {
        console.log("Редактировать деталь");
    });

    $('.new_del_el').on('click', function () {
        console.log("Удалить деталь");
    });
});