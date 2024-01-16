<script>
      (adsbygoogle = window.adsbygoogle || []).push({});
  </script>
  <!-- jQuery Min JS -->
  <script src="{{asset('assets/js/jquery.min.js')}}"></script>
  <!-- Popper Min JS -->
  <script src="{{asset('assets/js/popper.min.js')}}"></script>
  <!-- Bootstrap Min JS -->
  <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
  <!-- MeanMenu JS  -->
  <script src="{{asset('assets/js/jquery.meanmenu.js')}}"></script>
  <!-- Fingerprint JS  -->
  <script src="../cdn.jsdelivr.net/npm/fingerprintjs2/dist/fingerprint2.min.js"></script>
  <!-- Appear Min JS -->
  <script src="{{asset('assets/js/jquery.appear.min.js')}}"></script>
  <!-- Odometer Min JS -->
  <script src="{{asset('assets/js/odometer.min.js')}}"></script>
  <!-- Owl Carousel Min JS -->
  <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
  <!-- Magnific Popup Min JS -->
  <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
  <!-- Parallax Min JS -->
  <script src="{{asset('assets/js/parallax.min.js')}}"></script>
  <!-- Nice Select Min JS -->
  <script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>
  <!-- WOW Min JS -->
  <script src="{{asset('assets/js/wow.min.js')}}"></script>
  <!-- Form Validator Min JS -->
  <script src="{{asset('assets/js/form-validator.min.js')}}"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="{{asset('assets/js/sweetalert2.js')}}"></script>
  <!--  Plugin for BlockUI -->
  <script src="{{asset('assets/js/jquery.blockUI.js')}}"></script>
  <!--  Plugin for Image compression -->
  <script src="{{asset('assets/js/browser-image-compression.js')}}"></script>
  <!-- Data table -->
  <script src="{{asset('assets/js/datatables.net/js/jquery.dataTables.js')}}"></script>
  <script src="{{asset('assets/js/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
  <script src="{{asset('assets/js/data-table.js')}}"></script>
  <!-- Main JS -->
  <script src="{{asset('assets/js/main.js')}}"></script>
  <!-- Service Worker JS -->
  <script src="{{asset('assets/js/index.js')}}"></script>
  <!-- App-script JS -->
  <script src="{{asset('assets/js/app-script.js')}}"></script>
  <script type="text/javascript"  src="{{asset('assets/js/noty.js')}}"></script>




  <script src="https://js.paystack.co/v1/inline.js"></script>

  <script>
      function showNote(type, msg) {
          new Noty({
              type: ''+type,
              layout: 'bottomRight',
              text: ''+msg
          }).show();
      }
      $(function() {
          $('#cardBtn').click(function() {
              console.log("making payment");
              var amt = $('#amount').val();
              var name = $('#name').val();
              var email = $('#email').val();
              var phone = $('#phone').val();
              var service = $('#service').val();
              var address = $('#address').val();
              var _auth = $('#_auth').val();
              amt = amt.replace(/,/g, '');
               console.log(amt);
              $(this).attr("disabled", true);
              var handler = PaystackPop.setup({
                  key: 'pk_live_ce28323dfd295fd2c055b09a16b0122bca9013fa',
                  email: email,
                  amount: amt * 100,
                  metadata: {
                      custom_fields: [{
                          display_name: "Mobile Number",
                          variable_name: "mobile_number",
                          value: amt
                      }]
                  },
                  callback: function(response) {
                      console.log(response);
                      var data = {'pRef': response.reference, 'amount':amt, 'name':name,'email':email, 'phone':phone, 'service':service, 'address':address, '_token':_auth};
                      $.ajax({
                          url: "/wallet/card-payment",
                          type: "POST",
                          dataType: "JSON",
                          data: data,
                          success: function(data) {
                              console.log(data);
                              if(data.status == -1) {
                                  new Noty({
                                      type: 'warning',
                                      layout: 'bottomRight',
                                      text: data.msg
                                  }).show();
                                  // showNote('warning', data.msg);
                                  return false;
                              }
                              if((1 <= data.status) && (data.status <= 88)) {
                                  new Noty({
                                      type: 'warning',
                                      layout: 'bottomRight',
                                      text: data.msg
                                  }).show();
                                  // showNote('warning', data.msg);
                                  return false;
                              }
                              if(data.status == 404) {
                                  new Noty({
                                      type: 'warning',
                                      layout: 'bottomRight',
                                      text: data.msg
                                  }).show();
                                  // showNote('warning', data.msg);
                                  return false;
                              }
                              if(data.status == '503') {
                                  new Noty({
                                      type: 'warning',
                                      layout: 'bottomRight',
                                      text: data.msg
                                  }).show();
                                  return false;
                              }
                              if(data.status == 200) {
                                  console.log("successful section");
                                  new Noty({
                                      type: 'success',
                                      layout: 'bottomRight',
                                      text: data.msg
                                  }).show();
                                  window.location.href="/paymentsummary";
                                  // window.location.href= domain + "/paymentsummary/" + 1;
                              }
                              if(data.status == 100) {
                                  console.log("successful section");
                                  new Noty({
                                      type: 'success',
                                      layout: 'bottomRight',
                                      text: data.msg
                                  }).show();
                                  window.location.href="/paymentsummary";
                                  // window.location.href= domain + "/paymentsummary/" + 1;
                              }
                          },
                          error: function(error) {
                              console.log(error);
                              // new Noty({
                              //     type: 'error',
                              //     layout: 'bottomRight',
                              //     text: 'Unable to verify payment at this time. Kindly contact customer care for more details.'
                              // }).show();
                              showNote('warning', data.msg);
                              return false;
                          }
                      })
                  },
                  onClose: function(){
                      $('#cardBtn').attr("disabled", false);
                  }
              });
              handler.openIframe();
          });
      });
  </script>

<script>
    function showNote(type, msg) {
        new Noty({
            type: ''+type,
            layout: 'bottomRight',
            text: ''+msg
        }).show();
    }
    $(function() {
        $('#cardSTARTER').click(function() {
            console.log("making payment");
            var amt = $('#amount').val();
            var name = $('#name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var service = $('#service').val();
            var address = $('#address').val();
            var _auth = $('#_auth').val();
            amt = amt.replace(/,/g, '');
             console.log(amt);
            $(this).attr("disabled", true);
            var handler = PaystackPop.setup({
                key: 'pk_live_ce28323dfd295fd2c055b09a16b0122bca9013fa',
                email: email,
                amount: amt * 100,
                metadata: {
                    custom_fields: [{
                        display_name: "Mobile Number",
                        variable_name: "mobile_number",
                        value: amt
                    }]
                },
                callback: function(response) {
                    console.log(response);
                    var data = {'pRef': response.reference, 'amount':amt, 'name':name,'email':email, 'phone':phone, 'service':service, 'address':address, '_token':_auth};
                    $.ajax({
                        url: "/wallet/card-payment",
                        type: "POST",
                        dataType: "JSON",
                        data: data,
                        success: function(data) {
                            console.log(data);
                            if(data.status == -1) {
                                new Noty({
                                    type: 'warning',
                                    layout: 'bottomRight',
                                    text: data.msg
                                }).show();
                                // showNote('warning', data.msg);
                                return false;
                            }
                            if((1 <= data.status) && (data.status <= 88)) {
                                new Noty({
                                    type: 'warning',
                                    layout: 'bottomRight',
                                    text: data.msg
                                }).show();
                                // showNote('warning', data.msg);
                                return false;
                            }
                            if(data.status == 404) {
                                new Noty({
                                    type: 'warning',
                                    layout: 'bottomRight',
                                    text: data.msg
                                }).show();
                                // showNote('warning', data.msg);
                                return false;
                            }
                            if(data.status == '503') {
                                new Noty({
                                    type: 'warning',
                                    layout: 'bottomRight',
                                    text: data.msg
                                }).show();
                                return false;
                            }
                            if(data.status == 200) {
                                    console.log("successful section");
                                    new Noty({
                                        type: 'success',
                                        layout: 'bottomRight',
                                        text: data.msg
                                    }).show();
                                    window.location.href="/paymentsummary";
                                }
                                if(data.status == 100) {
                                    console.log("successful section");
                                    new Noty({
                                        type: 'success',
                                        layout: 'bottomRight',
                                        text: data.msg
                                    }).show();
                                    window.location.href="/paymentsummary";
                                }
                        },
                        error: function(error) {
                            console.log(error);
                            // new Noty({
                            //     type: 'error',
                            //     layout: 'bottomRight',
                            //     text: 'Unable to verify payment at this time. Kindly contact customer care for more details.'
                            // }).show();
                            showNote('warning', data.msg);
                            return false;
                        }
                    })
                },
                onClose: function(){
                    $('#cardSTARTER').attr("disabled", false);
                }
            });
            handler.openIframe();
        });
    });
</script>

<script>
    function showNote(type, msg) {
        new Noty({
            type: ''+type,
            layout: 'bottomRight',
            text: ''+msg
        }).show();
    }
    $(function() {
        $('#cardExtended').click(function() {
            console.log("making payment");
            var amt = $('#amount').val();
            var name = $('#name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var service = $('#service').val();
            var address = $('#address').val();
            var _auth = $('#_auth').val();
            amt = amt.replace(/,/g, '');
             console.log(amt);
            $(this).attr("disabled", true);
            var handler = PaystackPop.setup({
                key: 'pk_live_ce28323dfd295fd2c055b09a16b0122bca9013fa',
                email: email,
                amount: amt * 100,
                metadata: {
                    custom_fields: [{
                        display_name: "Mobile Number",
                        variable_name: "mobile_number",
                        value: amt
                    }]
                },
                callback: function(response) {
                    console.log(response);
                    var data = {'pRef': response.reference, 'amount':amt, 'name':name,'email':email, 'phone':phone, 'service':service, 'address':address, '_token':_auth};
                    $.ajax({
                        url: "/wallet/card-payment",
                        type: "POST",
                        dataType: "JSON",
                        data: data,
                        success: function(data) {
                            console.log(data);
                            if(data.status == -1) {
                                new Noty({
                                    type: 'warning',
                                    layout: 'bottomRight',
                                    text: data.msg
                                }).show();
                                // showNote('warning', data.msg);
                                return false;
                            }
                            if((1 <= data.status) && (data.status <= 88)) {
                                new Noty({
                                    type: 'warning',
                                    layout: 'bottomRight',
                                    text: data.msg
                                }).show();
                                // showNote('warning', data.msg);
                                return false;
                            }
                            if(data.status == 404) {
                                new Noty({
                                    type: 'warning',
                                    layout: 'bottomRight',
                                    text: data.msg
                                }).show();
                                // showNote('warning', data.msg);
                                return false;
                            }
                            if(data.status == '503') {
                                new Noty({
                                    type: 'warning',
                                    layout: 'bottomRight',
                                    text: data.msg
                                }).show();
                                return false;
                            }
                            if(data.status == 200) {
                                    console.log("successful section");
                                    new Noty({
                                        type: 'success',
                                        layout: 'bottomRight',
                                        text: data.msg
                                    }).show();
                                    window.location.href="/paymentsummary";
                                }
                                if(data.status == 100) {
                                    console.log("successful section");
                                    new Noty({
                                        type: 'success',
                                        layout: 'bottomRight',
                                        text: data.msg
                                    }).show();
                                    window.location.href="/paymentsummary";
                                }
                        },
                        error: function(error) {
                            console.log(error);
                            // new Noty({
                            //     type: 'error',
                            //     layout: 'bottomRight',
                            //     text: 'Unable to verify payment at this time. Kindly contact customer care for more details.'
                            // }).show();
                            showNote('warning', data.msg);
                            return false;
                        }
                    })
                },
                onClose: function(){
                    $('#cardExtended').attr("disabled", false);
                }
            });
            handler.openIframe();
        });
    });
</script>
