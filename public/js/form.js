$('form').attr('autocomplete', 'off');

var a = 1;
$('form.ajax').submit(function (e) {
    e.preventDefault();
  
    $(this).find("button[type='submit']").prop('disabled', true);
  
    let data = new FormData(this);

    $.ajax({
      url: $(this).data('action'),
      data: data,
      contentType: false,
      cache: false,
      processData: false,
      type: $(this).data('method'),
    //   beforeSend: function () {

    //   },
    //   complete: function () {

    //   }
    }).done(function (response) {
        if (objHasProp(response, 'data.notification')) {
            responded(response.data.notification);
        }
  
        if (objHasProp(response, 'data.redirect_to')) {
            redirect(response.data.redirect_to, 3000);
        }  
    }).fail(function (request, status, error) {
        if (objHasProp(request, 'responseJSON.data.notification')) {
            responded(request.responseJSON.data.notification);
        }
  
        if (objHasProp(request, 'responseJSON.data.redirect_to')) {
            redirect(request.responseJSON.data.redirect_to, 3000);
        }
  
        // if (objHasProp(request, 'status') && request.status == 429) {
        //     message: "Too many attempts, try again later"
        // }
    });
  
    $(this).find("button[type='submit']").prop('disabled', false);
  });
  