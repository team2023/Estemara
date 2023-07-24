function validateEmail() {
    var emailInput = document.getElementById('Email');
    var emailError = document.getElementById('email-error');
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailPattern.test(emailInput.value)) {
      //Event.preventDefault();
      emailError.style.display = 'inline';
    }
    else{
      emailError.style.display = 'none';
    }
  }
  
  function validatePassword() {
    var usernameInput = document.getElementById('passowrd');
    var usernameError = document.getElementById('passowrd-error');

    if (usernameInput.value.length < 6) {
      usernameError.style.display = 'inline';
    } else {
      usernameError.style.display = 'none';
    }
  }
 
  function validatecPassword() {
    var passwordInput = document.getElementById('passowrd');
    var confirmPasswordInput = document.getElementById('confirem_passowrd');
    var passwordError = document.getElementById('conpassowrd-error');
    if (passwordInput.value !== confirmPasswordInput.value) {
      passwordError.style.display = 'inline';
    } else {
      passwordError.style.display = 'none';
    }
  }





  function validateArabicInput(inputId, errorId) {
    var arabicPattern = /^(?!\s).*[\u0600-\u06FF](?<!\s)$/;
    var inputText = inputId.value;
  
    if (!arabicPattern.test(inputText)) {
      errorId.style.display = 'inline';
    } else {
      errorId.style.display = 'none';
    }
  }