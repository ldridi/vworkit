function initAjaxFormMessage()
{
    $('body').on('submit', '.ajaxFormMessage', function (e) {

        e.preventDefault();
        $('.loadMessage').show();
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            
        })
        
        .done(function (data) {
            if (typeof data.message !== 'undefined') {
                $('#msgMessage').fadeIn(500).delay(1000).fadeOut(500);
                $('.loadMessage').hide();
                $(':input','.ajaxFormMessage')
                .not(':button, :submit, :reset, :hidden, :disabled')
                .val('')
                .removeAttr('checked')
                .removeAttr('selected')
            }
        })

        .fail(function (jqXHR, textStatus, errorThrown) {
            if (typeof jqXHR.responseJSON !== 'undefined') {
                if (jqXHR.responseJSON.hasOwnProperty('form')) {
                    $('#form_body').html(jqXHR.responseJSON.form);
                }

                $('.form_error').html(jqXHR.responseJSON.message);

            } else {
                alert(errorThrown);
            }

        });
    });
}