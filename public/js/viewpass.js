const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#inputPasswordNew');
togglePassword.addEventListener('click', function(e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggle('bi-eye');
});

const toggleCPassword = document.querySelector('#toggleCPassword');
const cpassword = document.querySelector('#inputPasswordNewVerify');
toggleCPassword.addEventListener('click', function(e) {
    // toggle the type attribute
    const type = cpassword.getAttribute('type') === 'password' ? 'text' : 'password';
    cpassword.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggle('bi-eye');
});


const toggleCCPassword = document.querySelector('#togglePasswordc');
const ccpassword = document.querySelector('#inputPasswordNewC');
toggleCCPassword.addEventListener('click', function(e) {
    // toggle the type attribute
    const type = ccpassword.getAttribute('type') === 'password' ? 'text' : 'password';
    ccpassword.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggle('bi-eye');
});
