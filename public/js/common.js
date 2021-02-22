// only lowercase + number + underscore
$("input.mask1").on({
    keydown: function(e) {
      if (e.which === 32)
        return false;
    },
    change: function() {
      this.value = this.value.replace(/[^a-z0-9_]/gi, "");
    }
});

function deleteConfirmation(delete_url, quickRedirectBack = false) {
  iziToast.warning({
    timeout: 20000,
    close: false,
    overlay: true,
    displayMode: 'once',
    zindex: 999,
    title: 'Delete Confrimation !',
    message: 'Are you sure you want to delete this data ?',
    position: 'center',
    layout: 2,
    buttons: [
      ['<button><b>YES</b></button>', function (instance, toast) {
        // hide confirmation
        instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');

        // deleting data
        $.ajax({
          url: delete_url,
          type: 'DELETE',
          beforeSend: function () {
            // show deleting progress
            iziToast.warning({
              id: 'toast-deleting',
              timeout: false,
              close: false,
              overlay: true,
              displayMode: 'once',
              zindex: 999,
              title: 'Deleting',
              position: 'center',
            });
          }
        }).
        then( response => {
          setTimeout(function () {
            iziToast.hide({}, $('.iziToast#toast-deleting')[0]);
  
            if (quickRedirectBack) {
              redirect('back()')
            }
            if (objHasProp(response, 'data.redirect_to')) {
              redirect(response.data.redirect_to);
            }
          }, 1000)
        })
        .catch(error => {
          setTimeout(function () {
            iziToast.hide({}, $('.iziToast#toast-deleting')[0]);
  
            iziToast.error({
              timeout: false,
              overlay: true,
              displayMode: 'once',
              zindex: 999,
              title: 'Error !',
              message: error.statusText,
              position: 'center',
              layout: 2
            });
          }, 1000)
        });
      }],
      ['<button>NO</button>', function (instance, toast) {
        instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
      }],
    ],
    // onClosing: function(instance, toast, closedBy){
    //   console.info('Closing | closedBy: ' + closedBy);
    // },
    // onClosed: function(instance, toast, closedBy){
    //   console.info('Closed | closedBy: ' + closedBy);
    // }
  });
}