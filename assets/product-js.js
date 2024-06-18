function openNav() {
    document.getElementById("myNav").style.width = "50%";
    var elements = document.getElementsByClassName("bg");
    for(var i=0; i<elements.length; i++) { 
    elements[i].style.opacity='20%';
    }

  }
  
  function closeNav() {
    document.getElementById("myNav").style.width = "0%";
    var elements = document.getElementsByClassName("bg");
    for(var i=0; i<elements.length; i++) { 
    elements[i].style.opacity='100%';
    }
  }
  function validateForm() {
    let username = document.forms["myForm"]["username"].value;
    let email = document.forms["myForm"]["email"].value;
    let phone = document.forms["myForm"]["phone"].value;
    let password = document.forms["myForm"]["password"].value;

    let usernameError = document.getElementById("error1");
    let emailError = document.getElementById("error2");
    let phoneError = document.getElementById("error3");
    let passwordError = document.getElementById("error4");

  // Reset previous error messages
    usernameError.textContent = "";
    emailError.textContent = "";
    phoneError.textContent = "";
    passwordError.textContent = "";

  // Check for empty username
  // ... (existing username validations)

  // Check for empty email
    if (email == "") {
        emailError.textContent = "Please enter an email address.\n";
        emailError.style.color = "#1999ff";
        emailError.style.fontWeight = "bold";
        return false; // Prevent form submission
    }

    if (!email.includes("@")) {
        emailError.textContent = "Email address must contain the @ symbol.\n";
        emailError.style.color = "#1999ff";
        emailError.style.fontWeight = "bold";
        return false; // Prevent form submission
    }

  // Add other email validations as needed
  // For example, you can check for a valid email format using a regular expression

  // Check for empty password
    if (password == "") {
        passwordError.textContent = "Password must be filled out.\n";
        passwordError.style.color = "#1999ff";
        passwordError.style.fontWeight = "bold";
        return false; // Prevent form submission
    }

  // Add other password validations as needed
  // For example, you can check for minimum length, special characters, etc.

  // If all validations pass, allow form submission
    return true;
}
