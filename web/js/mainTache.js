function initAjaxFormTache()
{
    $('body').on('submit', '.ajaxFormTache', function (e) {

        e.preventDefault();
        $('.loadTache').show();
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            
        })
        
        .done(function (data) {
            if (typeof data.message !== 'undefined') {
                $('#msgTache').fadeIn(500).delay(1000).fadeOut(500);
                $('.loadTache').hide();
                $(':input','.ajaxFormTache')
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