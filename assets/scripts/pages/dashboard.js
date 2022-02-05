(function($) {
  $( document ).ready(function() {
    if(localStorage.getItem('signup_status') == 1){
      noty({
       theme: 'app-noty',
        text: 'Welcome to visit our system',
        type: 'success',
        timeout: 10000,
        layout: 'topRight',
        closeWith: ['button', 'click'],
        animation: {
          open: 'animated fadeInDown', // Animate.css class names
          close: 'animated fadeOutUp', // Animate.css class names
        }
      });
      localStorage.setItem('signup_status',0);
    }
  }); 
  
})(jQuery);
