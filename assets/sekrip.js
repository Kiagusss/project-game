
const signUpButton = document.getElementById('signUp');
   const signInButton = document.getElementById('signIn');
   const container = document.getElementById('container');

   signUpButton.addEventListener('click', () => {
      container.classList.add("right-panel-active");
   });

   signInButton.addEventListener('click', () => {
      container.classList.remove("right-panel-active");
   });

   $("#SIGNUPFORM").submit( (e) => {
      e.preventDefault();
      var form = $("#SIGNUPFORM").serialize();
      
      $.ajax({
        url : "ajax.php",
        method: 'post',
        data: form,
        success: function(res) {
          if(res === 'successs'){
            Swal.fire({
              icon: 'success',
              title: 'Nice',
              text: 'Register Successfully',
              timer: 2000,
              showConfirmButton: true,
              confirmButtonColor:'#444444',
              iconColor: '#444444',
            })
    
            setInterval(function(){
              location.reload()
              },3000)
            
    
          }else {
            Swal.fire({
              icon: 'error',
              title: 'Something went wrong',
              text: res,
              timer: 3000,
              showConfirmButton: true,
              confirmButtonColor:'#444444',
              iconColor: '#444444',
            })
    
          }
            $("#SIGNUPFORM")[0].reset();
            
         }
      })
    })
    
    
    $("#LoginForm").submit( (e) => {
      e.preventDefault();
      
      var form_login = $("#LoginForm").serialize();
      $.ajax({
         url : "ajax.php",
         method: 'POST',
         data: form_login,
         success: function(res) {
            var data = $.parseJSON(res);
            var name = document.querySelector('#login_user').value;
            if (data.status == 'success'){
    
              Swal.fire({
                icon: 'success',
                title: 'Login Success',
                text: 'Nice one',
                html:
                '<b>Welcome back, '+ name +'<br> </b>'+
                'change page in <strong></strong> sec.',
                timer: 5000,
                showConfirmButton: false,
                iconColor: '#444444',
                didOpen: () => {
                  
                  timerInterval = setInterval(() => {
                    Swal.getHtmlContainer().querySelector('strong')
                    .textContent = (Swal.getTimerLeft() / 1000)
                    .toFixed(0)
                  }, 100)
                },
                willClose: () => {
                  clearInterval(timerInterval)
                }
              })
            }else if (data.status == 'errors')  {
              Swal.fire({
                icon: 'error',
                title: 'Something Went Wrong',
                text: 'Fill Out The Form',
                timer: 3000,
                showConfirmButton: true,
                confirmButtonColor:'#444444',
                iconColor: '#444444',
              })
              return false;
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Something Went Wrong',
                text: 'Your Password Not Match',
                timer: 3000,
                showConfirmButton: true,
                confirmButtonColor:'#444444',
                iconColor: '#444444',
              })
              return false;
            }
    
    
            setInterval(function(){
            location.href = "home.php"
            },5000)
          }
        })
      })