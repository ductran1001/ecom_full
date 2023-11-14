$(document).ready(function () {
    $('#ajax_form').submit(function (e) {
        e.preventDefault();
        let formData = $(this).serialize();
        let url = $(this).attr('action');
        let type = $(this).attr('method');
        let replace = $(this).attr('replace');
        
        $.ajax({
            type: type,
            url: url,
            data: formData,
            dataType: 'json',
            success: function (_) {
                window.location.replace(replace);
            },
            error: function (response) {
                resetForm()

                if (response.status === 422) {
                    const errors = response.responseJSON.errors;
                    displayErrors(errors);
                } else {
                    toastr.error(response.responseJSON?.msg || 'Đã có lỗi xảy ra.');
                }
            }
        });
    });
});

function resetForm() {
    $('#ajax_form')
    .find('.invalid-feedback')
    .css('display', 'none')
    .end()
    .find('.form-label')
    .removeClass('text-danger')
    .end()
    .find('.is-invalid')
    .removeClass('is-invalid');
}

function displayErrors(errors) {
    $.each(errors, function (key, value) {
        const formGroup = $('#ajax_form').find('#' + key).closest('.form-wrapper');
        formGroup.find('.invalid-feedback').html(value).css('display', 'block');
        formGroup.find('.form-label').addClass('text-danger');
        $('#ajax_form').find('#' + key).addClass('is-invalid');
    });
}