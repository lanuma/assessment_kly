var base_url = window.location.origin;

$(function () {
  ajaxSetup();
});

function ajaxSetup() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
}

// if ($('form').length) {
//   setInterval(function () {
//     $.ajax({
//       url: '/token',
//       type: 'POST',
//     }).fail(function (result) {
//       $('meta[name="csrf-token"]').attr('content', result.responseJSON.data.csrf_token);

//       ajaxSetup();
//     });
//   }, 1000 * 60 * 15); //every 15 mins
// }

function defaultFor(arg, val) {
  return typeof arg !== 'undefined' ? arg : val;
}

function objHasProp(obj, key) {
  return key.split(".").every(function (x) {
    if (typeof obj != "object" || obj === null || !x in obj)
      return false;
    obj = obj[x];
    return true;
  });
}

function redirect(url = null, timer = 0) {
    if (url == null) {
      return;
    }
  
    if (url.includes('datatable')) {
      $(url).DataTable().ajax.reload();
      return;
    }
  
    setTimeout(function () {
      if (url == 'reload()') {
        window.location.reload();
      } else if (url == 'back()') {
        history.back()
      } else {
        window.location.href = url;
      }
    }, timer)
}
  
function log(str) {
    console.log('%c ' + str + ' ', 'background: #222; color: #fff',);
}

function responded(notification = null) {
  /**
   * notification = {
   *  'alert => 'toast',
   *  'type' => '',
   *  'content => string|array
   * }
   */

  if (notification == null) {
    return;
  }

  switch (notification.alert) {
    case 'toast' :

      iziToast[notification.type]({
        title: defaultFor(notification.title, ''),
        message: notification.content,
        position: 'topCenter',
        timeout: 3001,
        layout: (objHasProp(notification, 'title') ? 2 : 1)
      });

      break;
  }
  
}
  