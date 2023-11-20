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
        $.ajax({
            url: url,
            type: type,
            data: doForm.serialize(),
            success: function (data) {
                window.location.href = redirect;
                toastr.success(data.msg);
            },
            error: function (data) {
                if (data.responseJSON.msg) {
                    toastr.error(data.responseJSON.msg);
                }

                if (data.responseJSON.errors) {
                    let errors = data.responseJSON.errors;

                    for (let error in errors) {
                        let inputId = '#' + error;
                        let errorMessage = errors[error];
                        let labelId = `label[for="${error}"]`;
                        let html = `<p class="text-danger error-message">${errorMessage}</p>`;

                        $(inputId).parent().append(html);
                        $(labelId).addClass('text-danger');
                        $(inputId).addClass('is-invalid');
                    }
                }
            }
        });
    });
});
