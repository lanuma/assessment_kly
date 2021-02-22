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