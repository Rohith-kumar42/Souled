function errormessage() {
    let username = document.getElementById("uname").value;
    let password = document.getElementById("psw").value;
    let usernameError = document.getElementById("error1");
    let passwordError = document.getElementById("error");

    // Reset previous error messages
    usernameError.textContent = "";
    passwordError.textContent = "";

    // Check for empty username
    if (username == "" || username.length < 5) {
        usernameError.textContent = "Please enter a valid username (at least 5 characters).\n";
        usernameError.style.color = "#1999ff";
        usernameError.style.fontWeight = "bold";
        return false; // Prevent form submission
    }
    if (/^\d+$/.test(username)) {
        usernameError.textContent = "Username cannot contain only numbers.\n";
        usernameError.style.color = "#1999ff";
        usernameError.style.fontWeight = "bold";
        return false; // Prevent form submission
    }
    if (username.startsWith(" ")) {
        usernameError.textContent = "Username cannot start with a space.\n";
        usernameError.style.color = "#1999ff";
        usernameError.style.fontWeight = "bold";
        return false; // Prevent form submission
    }

    // Check for empty password
    if (password == "") {
        passwordError.textContent = "Please enter a password.\n";
        passwordError.style.color = "#1999ff";
        passwordError.style.fontWeight = "bold";
        return false; // Prevent form submission
    }

    // Redirect based on username
    switch (username) {
        case 'rohithkumarcbaalraj@gmail.com':
        case 'rohithkumarcbaalraj':
            window.location.href = "pages/homerk.html";
            return false; // Prevent form submission
        case 'dsiddarth05@gmail.com':
        case 'dsiddarth05':
            window.location.href = "pages/homesidd.html";
            return false; 
        case 'Sudhikumaran2005@gmail.com':
        case 'Sudhikumaran2005':
            window.location.href = "pages/homesudhi.html";
            return false; 
        case 'ukimanimaran@gmail.com':
        case 'ukimanimaran':
            window.location.href = "pages/homeuki.html";
            return false; 
        default:
            return true; 
    }
}
