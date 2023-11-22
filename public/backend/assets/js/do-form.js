$(function () {
    let doForm = $("#do-form");
    doForm.submit(function (e) {
        e.preventDefault();
        let url = doForm.attr('action');
        let type = doForm.attr('method');
        let redirect = doForm.attr('redirect');
        $(".error-message").remove();
        let elements = $(".text-danger, .is-invalid");
        elements.removeClass("text-danger").removeClass("is-invalid");
        let status = doForm.find("button:focus");
        if (status.val()) {
            doForm.append(`<input type="hidden" name="status" value="${status.val()}" />`);
        }

        $.ajax({
            url: url,
            type: type,
            data: doForm.serialize(),
            success: function (response) {
                window.location.href = redirect;
                toastr.success(response.msg);
            },
            error: function (response) {
                if (response.responseJSON.msg) {
                    toastr.error(response.responseJSON.msg);
                }

                if (response.responseJSON.errors) {
                    let errors = response.responseJSON.errors;

                    for (let error in errors) {
                        let inputId = '#' + error;
                        let errorMessage = errors[error];
                        let labelId = `label[for="${error}"]`;
                        let html = `<i class="text-danger error-message">${errorMessage}</i>`;

                        $(inputId).parent().append(html);
                        $(labelId).addClass('text-danger');
                        $(inputId).addClass('is-invalid');
                    }
                }
            }
        });
    });
});


$(document).ready(function () {
    $('body').on('click', '#delete-action', function () {
        let url = $(this).data('url');
        let tr = $(this).closest('tr');
        let table = $('#zero_config').DataTable();

        $.ajax({
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'DELETE',
            dataType: 'json',
            caches: false,
            contentType: false,
            processData: false,
            success: function (response) {
                toastr.success(response.msg);
                table.row(tr).remove().draw(false);
            },
            error: function (response) {
                toastr.error(response.responseJSON.msg);
            }
        });

    });
});
