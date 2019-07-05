$(document).ready(function () {
    var dropZone = $('#file_upload_label'); //Дропзона
    var maxFileSize = 2000000; //2 мегабута
    var ListFiles = [];
    var ListElem = [];
    var id = 0;

    function refreshElem()
    {
        $('.new_el').remove();

        for (var i = 0; i < Object.keys(ListElem).length; ++i)
        {
            $('.view_el').append('<div class="new_el" id="new_el_'+ i +'">');
            $('#new_el_'+ i +'').append('<div class="new_control_el" id="new_control_el_'+ i +'">');
            $('#new_control_el_'+ i +'').append('<span class="new_name_el" id="new_name_el'+ i +'">');
            $('#new_name_el'+ i +'').append('Деталь № '+ i +'');
            $('#new_control_el_'+ i +'').append('<input type="checkbox" class="checkbox" id="checkbox_'+ i +'" />');
            $('#new_control_el_'+ i +'').append('<label for="checkbox_'+ i +'" id="new_label_'+ i +'">');
            $('#new_label_'+ i +'').append('<p>Выделить</p>');
            $('#new_control_el_'+ i +'').append('<div class="new_change_el" id="new_change_el_'+ i +'">');
            $('#new_change_el_'+ i +'').append('<img src="' + document.location.protocol + '//' + document.location.host + '/templates/Main/Main_Content/img/compose.svg' +'" alt="">');
            $('#new_control_el_'+ i +'').append('<div class="new_del_el" id="new_del_el_'+ i +'">');
            $('#new_del_el_'+ i +'').append('<img src="' + document.location.protocol + '//' + document.location.host + '/templates/Main/Main_Content/img/error.svg' +'" alt="">');

            $('#new_el_'+ i +'').append('<div class="new_content_el" id="new_content_el_'+ i +'">');
            $('#new_content_el_'+ i +'').append('<p>Наименование детали: '+ ListElem[i].name +'</p>');
            $('#new_content_el_'+ i +'').append('<p>Количество: '+ ListElem[i].number +'</p>');
            $('#new_content_el_'+ i +'').append('<p>Описание: '+ ListElem[i].description +'</p>');

            $('#new_el_'+ i +'').append('<div class="new_files_el" id="new_files_el_'+ i +'">');
            console.log(ListElem[i].files.length);

            for (var j = 0; j < ListElem[i].files.length; ++j)
            {
                $('#new_files_el_'+ j).append('<div class="new_files_wrap_el" id="new_files_wrap_el_'+ id + '">');
                previewNew(ListElem[i].files[j], id);
                id++;
            }
        }
    }

    function refreshPrewiew(files)
    {
        var id = null;

        for (var i = 0; i < ListFiles.length; ++i)
        {
            if (files.name == ListFiles[i].name)
            {
                alert('Файл уже существует!');
                console.log(prefiles);
                return false;
            }
        }

        for (var i = 0; i < prefiles.length; ++i)
        {
            //for (var j = 0; j < ListFiles.length; ++j) {
            if (ListFiles.length > 0)
            {
                id = ListFiles.length;
            } else
                {
                id = 0;
                }
            //}
            $('.prewiew_files').append('<div class="new_prewiew_file" id="new_prewiew_file_'+ id + '">');
            preview(prefiles[i], id);
            ListFiles.push(prefiles[i]);
            ListFile.push(prefiles[i]);
        }
    }

    function preview(file, id) {
        var fileReader = new FileReader();
        fileReader.onload = function() {
            var url = fileReader.result;
            console.log(id);
            $('#new_prewiew_file_' + id).append('<img src="' + url + '">');
            $('#new_prewiew_file_' + id).append('<div class="new_prewiew_file_del" id="new_prewiew_file_del_' + id + '" >');
            $('#new_prewiew_file_del_' + id).append('<img src="' + document.location.protocol + '//' + document.location.host + '/templates/Main/Main_Content/img/error.svg' +'" alt="">');
        };
        fileReader.readAsDataURL(file);
    }

    function previewNew(file, id) {
        var fileReader = new FileReader();
        fileReader.onload = function() {
            var url = fileReader.result;
            console.log(id);
            $('#new_files_wrap_el_'+ id).append('<img src="' + url + '">');
            $('#new_files_wrap_el_'+ id).append('<div class="new_files_wrap_del_el" id="new_files_wrap_del_el_' + id + '" >');
            $('#new_files_wrap_del_el_' + id).append('<img src="' + document.location.protocol + '//' + document.location.host + '/templates/Main/Main_Content/img/error.svg' +'" alt="">');
        };
        fileReader.readAsDataURL(file);
    }


    function addListingEl(args) {
        var id = 0;
        console.log(args);
        if (ListElem.length == 0) {
            id = ListElem.length;
            ListElem.push(id);
            ListElem[id] = {
                name: args.name,
                number: args.number,
                description: args.description,
                files: args.ListFiles
            };
        } else if (ListElem.length > 0) {
            id = ListElem.length;
            ListElem.push(id);
            ListElem[id] = {
                name: args.name,
                number: args.number,
                description: args.description,
                files: args.ListFiles
            };
        }
        $('#detailname').val("");
        $('#detailcol').val("");
        $('#detailarea').val("");
        $('.prewiew_files').empty();
        ListFiles = [];
    }

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

        var files = event.dataTransfer.files;

        if (files.size > maxFileSize) {
            dropZone.text('Файл слишком большой!');
            dropZone.addClass('error');
            return false;
        }

        for (var i = 0; i < files.length; ++i) {
            if (ListFiles.length == 0) {
                console.log('LOX');
                ListFiles.push(files[i]);
            } else if (ListFiles.length > 0) {
                for (var j = 0; j < ListFiles.length; ++j) {
                    console.log(ListFiles[j]);
                    if (ListFiles[j].name == files[i].name) {
                        return alert('Файл уже существует!');
                    }
                }
                ListFiles.push(files[i]);
            }
        }

        refreshPrewiew(files);

        console.log('Лист превью файлов сформирован:');
        console.log(ListFiles);
    };

    $('#addImages').on('change', function () {
        var files = document.getElementById("addImages").files;
        previewMethod(files);
        console.log('Лист превью файлов сформирован:');
        console.log(ListFiles);
    });

    $(document).on('click', '.new_prewiew_file_del',function () {
        var id = $(this).attr('id');
        var regexp = /\d+/g;
        var replusce = id.match(regexp);

        $('.new_prewiew_file').remove();

        for (var i = 0; i < ListFiles.length; ++i) {
            if (i == replusce) {
                ListFiles.splice(i, 1);
                ListFile.splice(i, 1);
            }
        }

        for (var i = 0; i < ListFiles.length; ++i) {
            $('.prewiew_files').append('<div class="new_prewiew_file" id="new_prewiew_file_'+ i + '">');
            preview(ListFiles[i], i);
        }

        console.log('Превью файл удален лист префью файлов обновлён:');
        console.log(ListFiles);
        console.log(ListFile);
    });

    $('.new_detail').on('click', function () {
        var ListElemPush = {
            'name': $('#detailname').val(),
            'number': $('#detailcol').val(),
            'description': $('#detailarea').val(),
            'ListFiles': ListFiles
        };
        addListingEl(ListElemPush);

        refreshElem();

        //$('.view_el').append('<div class="new_el" id="IMG'+ file.size +'f">');
        console.log(ListElem);
        console.log(ListFile);
    });

    $(document).on('click', '.new_files_wrap_del_el', function () {
        var idel = $(this).attr('id');
        var regexp = /\d+/g;
        var idmatch = idel.match(regexp);
        var parent = $(this).parent().parent();
        console.log(parent);
        var idparent = parent.attr('id');
        console.log(idparent);
        var IdParentMatch = idparent.match(regexp);
        console.log(idmatch,' ', IdParentMatch);

        var name = ListFile[idmatch].name;
        console.log(ListFile[idmatch].name);
        $('#new_files_wrap_el_'+ idmatch).remove();
            console.log(ListElem[IdParentMatch].files);
            console.log(ListElem[IdParentMatch].files[0].name);
        for (var i = 0; i < ListElem[IdParentMatch].files.length; ++i) {
            console.log(ListElem[IdParentMatch].files[i].name);
            if (ListElem[IdParentMatch].files[i].name === name) {
                ListElem[IdParentMatch].files.splice(i, 1);
            }
        }
        console.log(ListElem);

        for (var i = 0; i < ListFile.length; ++i) {
            if (idmatch == i) {
                ListFile.splice(i, 1);
            }
        }
        console.log(ListFile);
        $('.new_el').remove();

        var key = Object.keys(ListElem).length - 1;
        console.log(key);
        $('.view_el').append('<div class="new_el" id="new_el_'+ key +'">');
        $('#new_el_'+ key +'').append('<div class="new_control_el" id="new_control_el_'+ key +'">');
        $('#new_control_el_'+ key +'').append('<span class="new_name_el" id="new_name_el'+ key +'">');
        $('#new_name_el'+ key +'').append('Деталь № '+ key +'');
        $('#new_control_el_'+ key +'').append('<input type="checkbox" class="checkbox" id="checkbox_'+ key +'" />');
        $('#new_control_el_'+ key +'').append('<label for="checkbox_'+ key +'" id="new_label_'+ key +'">');
        $('#new_label_'+ key +'').append('<p>Выделить</p>');
        $('#new_control_el_'+ key +'').append('<div class="new_change_el" id="new_change_el_'+ key +'">');
        $('#new_change_el_'+ key +'').append('<img src="' + document.location.protocol + '//' + document.location.host + '/templates/Main/Main_Content/img/compose.svg' +'" alt="">');
        $('#new_control_el_'+ key +'').append('<div class="new_del_el" id="new_del_el_'+ key +'">');
        $('#new_del_el_'+ key +'').append('<img src="' + document.location.protocol + '//' + document.location.host + '/templates/Main/Main_Content/img/error.svg' +'" alt="">');

        $('#new_el_'+ key +'').append('<div class="new_content_el" id="new_content_el_'+ key +'">');
        $('#new_content_el_'+ key +'').append('<p>Наименование детали: '+ ListElem[key].name +'</p>');
        $('#new_content_el_'+ key +'').append('<p>Количество: '+ ListElem[key].number +'</p>');
        $('#new_content_el_'+ key +'').append('<p>Описание: '+ ListElem[key].description +'</p>');

        $('#new_el_'+ key +'').append('<div class="new_files_el" id="new_files_el_'+ key +'">');
        console.log(ListElem[key].files.length);

        for (var i = 0; i < ListElem[key].files.length; ++i) {

            $('#new_files_el_'+ key).append('<div class="id'+ key +' new_files_wrap_el" id="new_files_wrap_el_'+ id + '">');
            previewNew(ListElem[key].files[i], id);
            //preview(, key);
            id++;
        }

        console.log('Превью файл удален лист префью файлов обновлён:');
        console.log(ListFiles);
    });


    $('.delete_all_detail').on('click', function () {
        console.log("Удалить выделенные детали");
    });

    $('.new_change_el').on('click', function () {
        console.log("Редактировать деталь");
    });

    $(document).on('click', '.new_del_el', function () {
        var id = $(this).attr('id');
        console.log(id);
        var regexp = /\d+/g;
        var idmt = id.match(regexp);
        var del = 'new_el_' + idmt;
        $('#' + del).remove();
        console.log("Удалить деталь");
        console.log(ListElem);
        ListElem.splice(idmt, 1);
        console.log(ListElem);
    });
});