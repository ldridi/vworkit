function initAjaxFormRecom()
{
    $('body').on('submit', '.ajaxFormRecom', function (e) {

        e.preventDefault();
        $('.loadRecom').show();
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            
        })
        
        .done(function (data) {
            if (typeof data.message !== 'undefined') {
                $('#msgRecom').fadeIn(500).delay(1000).fadeOut(500);
                $('.loadRecom').hide();
                $(':input','.ajaxFormRecom')
                .not(':button, :submit, :reset, :hidden')
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