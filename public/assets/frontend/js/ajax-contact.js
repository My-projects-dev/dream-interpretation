$(document).ready(function () {
    $('#contactForm').submit(function (e) {
        e.preventDefault();

        // Store the original button text
        var originalBtnText = $('#submitButton').val();

        // Set the button text to the loader
        $('#submitButton').removeClass('blue-button').addClass('pink-button').val(sendingText).prop('disabled', true);

        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            success: function (response) {
                // Handle the successful response
                Swal.fire({
                    icon: 'success',
                    title: success,
                    text: response.message,
                });
            },
            error: function (xhr, status, error) {
                // Handle errors
                if (xhr.status == 422) {
                    // Validation error
                    var errors = xhr.responseJSON.errors;
                    var errorMessage = '';
                    $.each(errors, function (key, value) {
                        errorMessage += value[0] + '<br>';
                    });
                    Swal.fire({
                        icon: 'error',
                        title: validationError,
                        html: errorMessage,
                    });
                } else {
                    // Other errors
                    Swal.fire({
                        icon: 'error',
                        title: error,
                        text: wrong,
                    });
                }
                console.error('Error:', xhr.responseText);
            },
            complete: function () {
                // Revert button text to original text
                $('#submitButton').val(originalBtnText).removeClass('pink-button').addClass('blue-button').prop('disabled', false);
            }
        });
    });
});
