$(document).ready(function () {
    $('#ajax_form').submit(function (e) {
        e.preventDefault();
        let formData = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "/admin/dang-nhap",
            data: formData,
            dataType: 'json',
            success: function (_) {
                window.location.replace('/admin/tong-quan');
            },
            error: function (response) {
                resetForm()

                if (response.status === 422) {
                    $.each(response.responseJSON.errors, function (key, value) {
                        $('#ajax_form').find('#' + key).closest('.form-wrapper')
                            .find('.invalid-feedback').html(value).css(
                                'display', 'block');
                        $('#ajax_form').find('#' + key).closest('.form-wrapper')
                            .find('.form-label').addClass('text-danger');
                        $('#ajax_form').find('#' + key).addClass('is-invalid');
                    });
                } else {
                    response.responseJSON?.msg ? toastr.error(response.responseJSON.msg) : toastr.error('Đã có lỗi xảy ra.');
                }
            }
        });
    });
});

function resetForm() {
    $('#ajax_form').find('.invalid-feedback').css('display', 'none');
    $('#ajax_form').find('.form-label').removeClass('text-danger');
    $('#ajax_form').find('.is-invalid').removeClass('is-invalid');
}
