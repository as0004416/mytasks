$(document).ready(function () {
    $("form").submit(function () {
        var formID = $(this).attr('id');
        var formNm = $('#' + formID);
        $.ajax({
            type: "POST",
            url: '/post.php',
            data: formNm.serialize(),
            beforeSend: function () {
                // Вывод текста в процессе отправки
                $('#result').html('Отправка...');
            },
            success: function (data) {
                // Вывод текста результата отправки
                $('#result').html(data);
            },
            error: function (jqXHR, text, error) {
                // Вывод текста ошибки отправки
                $('#result').html(error);
            }
        });
        return false;
    });
});