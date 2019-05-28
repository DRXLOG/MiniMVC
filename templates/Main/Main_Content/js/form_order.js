$(document).ready(function () {
    var details = {element:[]};
    var detailname;
    var detailcol;
    var detailarea;
    var detailimg;

    $('input[type=file]').on('change', function(){
        detailimg = this.files;
    });

    $('.new_detail').on('click', function () {
        detailname = $('#detailname').val();
        detailcol = $('#detailcol').val();
        detailarea = $('#detailarea').val();
        details.element.push({"detailname":detailname, "detailcol": detailcol, "detailarea" : detailarea, "Фото" : detailimg});
        alert('Добавить');
        $('<div>', { id: 'new_detail' , text: 'Новая деталь'}).appendTo('.detail');
    });

    $('.delete_all_detail').on('click', function () {
        alert('Удалить');
    });

    $('#enter_form').on('click', function () {
        console.log("Нажата");
        $.ajax({
            url: document.location.protocol + "//" + document.location.host + "/Engine/Models/mail.php",
            type: "POST",
            data: details,
            contentType: false,
            processData: false,
            success: function(data) {
                alert('Файлы были успешно загружены' + data);
            }
        });
    });
});