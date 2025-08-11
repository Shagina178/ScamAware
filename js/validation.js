document.addEventListener('DOMContentLoaded', () => {
    
    // Select the form and the password fields
    const registrationForm = document.getElementById('registration-form');
    const loginForm = document.getElementById('login-form');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirmPassword');
    const inputs = document.querySelectorAll("#registration-form input, #login-form input"); 
    const toggles = document.querySelectorAll('.toggle-password');

    //Password visibility
    toggles.forEach(btn => {
  btn.addEventListener('click', () => {
    const targetId = btn.dataset.target;
    const targetInput = document.getElementById(targetId);
    if (!targetInput) return;

    const willShow = targetInput.type === 'password';       
    targetInput.type = willShow ? 'text' : 'password';

    // Toggle visual state on the button so CSS swaps the SVG
    btn.classList.toggle('visible', willShow);

    // Update accessibility attributes
    btn.setAttribute('aria-pressed', willShow ? 'true' : 'false');
    btn.setAttribute('aria-label', willShow ? 'Hide password' : 'Show password');
  });
});

    // Placeholders disappear when typing
    inputs.forEach(input => {
        input.addEventListener("input", function () {
            if (this.value.length > 0) {
                this.dataset.placeholder = this.dataset.placeholder || this.placeholder; // store once
                this.placeholder = "";
            } else {
                this.placeholder = this.dataset.placeholder || "";
            }
        });
    });

      // Only apply password match check on registration page
    if (registrationForm) {
        registrationForm.addEventListener('submit', (event) => {
            if (password.value !== confirmPassword.value) {
                event.preventDefault();
                alert("Passwords do not match. Please try again.");
                password.style.borderColor = 'red';
                confirmPassword.style.borderColor = 'red';
            }
        });
    }

});
