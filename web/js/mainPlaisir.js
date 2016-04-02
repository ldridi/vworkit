function initAjaxForm()
{
    $('body').on('submit', '.ajaxFormPlaisir', function (e) {

        e.preventDefault();
        $('.loadPlaisir').show();
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            
        })
        
        .done(function (data) {
            if (typeof data.message !== 'undefined') {
                $('#msgPlaisir').fadeIn(500).delay(1000).fadeOut(500);
                $('.loadPlaisir').hide();
                $(':input','.ajaxFormPlaisir')
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