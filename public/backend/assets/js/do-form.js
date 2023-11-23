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
                handleFormErrors(response);
            }
        });
    });
});

const handleFormErrors = (response) => {
    if (response.responseJSON.errors) {
        const errors = response.responseJSON.errors;
        for (const error in errors) {
            const inputId = `#${error}`;
            const errorMessage = errors[error];
            const labelId = `label[for="${error}"]`;
            const html = `<i class="text-danger error-message">${errorMessage}</i>`;

            $(inputId).parent().append(html);
            $(labelId).addClass('text-danger');
            $(inputId).addClass('is-invalid');
        }
    } else {
        toastr.error(response.responseJSON.msg || 'Something went wrong');
    }
};

$(document).ready(function () {
    $('body').on('click', '#delete-action', function () {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
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
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });
                        table.row(tr).remove().draw(false);
                    },
                    error: function (response) {
                        Swal.fire({
                            title: "Error!",
                            text: response.responseJSON.msg,
                            icon: "error"
                        });
                    }
                });
            }
        });

    });
});

