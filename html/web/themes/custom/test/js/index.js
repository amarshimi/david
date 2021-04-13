(function ($) {
  var ua = navigator.userAgent.toLowerCase();
  var isAndroid = ua.indexOf("android") > -1; //&& ua.indexOf("mobile");

  $('.print button').click(function(e) {
    e.preventDefault();
    if (isAndroid) {
      // https://developers.google.com/cloud-print/docs/gadget
      var gadget = new cloudprint.Gadget();
      gadget.setPrintDocument("url", $('title').html(), window.location.href, "utf-8");
      gadget.openPrintDialog();
    } else {
      window.print();
    }
    return false;
  });

})(jQuery);
