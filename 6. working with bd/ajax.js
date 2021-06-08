$(document).ready(function () {
    $("form").submit(function () {
        var formID = $(this).attr('id');
        var formNm = $('#' + formID);
        $.ajax({
            type: "POST",
            url: '/post.php',
            data: formNm.serialize(),
            beforeSend: function () {
                // ����� ������ � �������� ��������
                $('#result').html('��������...');
            },
            success: function (data) {
                // ����� ������ ���������� ��������
                $('#result').html(data);
            },
            error: function (jqXHR, text, error) {
                // ����� ������ ������ ��������
                $('#result').html(error);
            }
        });
        return false;
    });
});