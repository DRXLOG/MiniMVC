$(document).ready(function () {
    var dann;
    var detailname;
    var detailcol;
    var detailarea;
    var detailimg;
    var i = 0;
    var filez;
    var del_file = [];
    var name_file = [];

    $('.new_detail').on('click', function () {
        detailname = $('#detailname').val();
        detailcol = $('#detailcol').val();
        detailarea = $('#detailarea').val();
        console.log(detailname);
        console.log(detailcol);
        console.log(detailarea);
        $('.form_order').append('<input type="hidden" name="order['+ i +'][Наименование]" value="'+ detailname +'">');
        $('.form_order').append('<input type="hidden" name="order['+ i +'][Количество]" value="'+ detailcol +'">');
        $('.form_order').append('<input type="hidden" name="order['+ i +'][Описание]" value="'+ detailarea +'">');
        //$('.form_order').append('<input type="hidden" name="order['+ i +'][Список файлов]" value="'+ filez +'">');
        for (var v = 0; v < name_file.length; ++v) {
            del_file.push(name_file[v]);
            $('.form_order').append('<input type="hidden" name="order['+ i +'][Список файлов]" value="'+ name_file[v] +'">');
        }
        i = i + 1;
        name_file = [];
        $('#detailname').val("");
        $('#detailcol').val("");
        $('#detailarea').val("");
    });


        $("#addImages").change(function(){ // Выполняем функцию после выбора файлов
             // Создаем массив
            filez = "";

            for(var i = 0; i < $(this).get(0).files.length; ++i) { // Запускаем цикл и перебираем все файлы

                name_file.push($(this).get(0).files[i].name); // Добавляем имена файлов в массив
            }
            for(var i = 0; i < del_file.length; ++i) {
                for (var v = 0; v < name_file.length; ++v) {
                    if (del_file[i] == name_file[v]) {
                        alert(del_file[i] + name_file[v]);
                        var index = name_file.indexOf(name_file[v]);
                        alert(index);
                        if (index > -1) {
                            name_file.splice(index, 1);
                        }
                    }
                }
            }
            //filez = JSON.parse(name_file);
            for (var i = 0; i < name_file.length; ++i) {
                filez = filez + name_file[i] + " ";
            }
            console.log(name_file); // Выводим список имен в id="result", разделенных запятой
            console.log(filez);
        });

    $('.delete_all_detail').on('click', function () {

        alert('Удалить');
    });

});