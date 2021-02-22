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
  /** (toast)
    * notification = {
    *  'alert => 'toast',
    *  'type' => 'show|info|success|warning|error|question',
    *  'title' => nullable|string
    *  'content => required|string|array
    * }
    **/
  
  /** (block)
    * div#block-alert is required
    * 
    * notification = {
    *  'alert => 'block',
    *  'type' => 'gray|blue|green|yellow|red|...',
    *  'title' => required|string
    *  'content => required|string|array
    * }
    **/
  
  if (notification == null) {
    return;
  }

  switch (notification.alert) {
    case 'toast':

      iziToast[notification.type]({
        title: defaultFor(notification.title, ''),
        message: defaultFor(notification.content, ''),
        position: 'topCenter',
        timeout: 3001,
        layout: (objHasProp(notification, 'title') ? 2 : 1)
      });

      break;

    case 'block':

      let notif_content = Array.isArray(notification.content) ? notification.content.join("<br>") : notification.content;

      let html =
        '<div class="border shadow border-' + notification.type + '-200 py-3 px-5 bg-' + notification.type + '-100 text-' + notification.type + '-900 text-sm " role="alert">' +
        '  <div class="text-sm font-bold flex justify-between">' +
        '  <span id="block-alert-title">' + notification.title + '</span>' +
        '  <button class="w-4" type="button" data-dismiss="alert" aria-label="Close" onclick="$(this).parentsUntil(\'div#block-alert\').remove()">' +
        '    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">' +
        '      <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />' +
        '    </svg>' +
        '  </button>' +
        '  </div>' +
        '  <div id="block-alert-content" class="text-sm">' +
              notif_content +
        '  </div>' +
        '</div>'
      ;

      let alert_block = $('div#block-alert')

      if (alert_block.length < 1) {
        log('div#block-alert is missing')
      } else {
        $('div#block-alert').html('');
        $('div#block-alert').append(html).hide().show('normal');
      }

      break;

  }
  
}
  