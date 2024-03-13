var btn_eye = document.getElementById("login_view_password");

btn_eye.addEventListener('mousedown', togglePassword);

function togglePassword() {
    const passwordInput = document.getElementById("contrasena");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
}