$(function() {
  $("#signin").validate({
    rules: {
      email: {
        required: true,
        email: true
      },
      password: {
          required: true,
          minlength: 5
      },
    },
    messages: {
      password: {
        required: "Please provide a password",
      },
      email: "Please enter a valid email address",
    },
    submitHandler: function(form,event) {
      event.preventDefault();
      var url = site_url + '/admin/user/signin_action';
      var email = $('#email').val();
      var password = $('#password').val();
      var params = {email:email, password:password}
      $.ajax({
          type: 'post',
          url: url,
          data: params,
          success: function (res) {
            var data = JSON.parse(res);
            if(data.success){
              localStorage.setItem('signup_status',1);
              window.location.href = base_url + '/admin/dashboard';
            }else{
              noty({
               theme: 'app-noty',
                text: data.message,
                type: 'error',
                timeout: 10000,
                layout: 'topRight',
                closeWith: ['button', 'click'],
                animation: {
                  open: 'animated fadeInDown', // Animate.css class names
                  close: 'animated fadeOutUp', // Animate.css class names
                }
              });
            }
          }
      });
    }
  });
});
