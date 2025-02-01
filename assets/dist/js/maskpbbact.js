function rubahcari() {
  var checkBox = document.getElementById("nop-check");
  if (checkBox.checked == true) {
    document.getElementById("cari").placeholder = "00-00-000-000-000-0000-0";
    (function ($) {
      $(function () {
        $('.cari').mask('00-00-000-000-000-0000-0');
      });
    })(jQuery);
  } else {
    document.getElementById("cari").placeholder = "NAMA/ALAMAT";
    document.getElementById("cari").style = "text-transform:uppercase";
    (function ($) {
      $(function () {
        $('.cari').unmask();
      });
    })(jQuery);
  }
  
}
