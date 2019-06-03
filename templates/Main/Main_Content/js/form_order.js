$(document).ready(function () {
    var details = {element:[]};
    var dann;
    var detailname;
    var detailcol;
    var detailarea;
    var detailimg;

    $('input[type=file]').on('change', function(){
        detailimg = this.files;
    });

    $('.new_detail').on('click', function () {
        dann = $('.form_order').serializeArray();
        console.log(dann);
        console.log(detailimg);
        detailname = $('#detailname').val();
        detailcol = $('#detailcol').val();
        detailarea = $('#detailarea').val();
        details.element.push({"detailname":detailname, "detailcol": detailcol, "detailarea" : detailarea, "picture" : detailimg});
        alert('Добавить');
        $('<div>', { id: 'new_detail' , text: 'Новая деталь'}).appendTo('.detail');
    });

    $('.delete_all_detail').on('click', function () {
        alert('Удалить');
    });

    $('#enter_form').on('click', function () {
        console.log(details);
        console.log("Нажата");
        details = details.serialize();
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