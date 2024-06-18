// function clearInput() {
//     document.getElementById("SignupForm").reset();
// }

// function validateForm() 
// {
//     let x = document.forms["myForm"]["username"].value;
//     if (x == "")
//     {
//       alert("Username must be filled out");
//       return false;
//     }

//     let y = document.forms["myForm"]["email"].value;
//     if (y == "")
//     {
//         alert("Email must be filled out");
//         return false;
//     }

//     let z = document.forms["myForm"]["phone"].value;
//     if (z == "")
//     {
//         alert("Phone Number must be filled out");
//         return false;
//     }

//     let a = document.forms["myForm"]["password"].value;
//     if (a == "")
//     {
//         alert("Password must be filled out");
//         return false;
//     }
// }
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
    if (username == "" || username.length < 5) {
      usernameError.textContent = "Please enter a username.\n";
      usernameError.style.color = "#1999ff";
      usernameError.style.fontWeight = "bold";
      return false; // Prevent form submission
    }
    if (/^\d+$/.test(username)) {
        usernameError.textContent = "Username cannot contain only numbers.\n"; // Add new line
        usernameError.style.color = "#1999ff";
        usernameError.style.fontWeight = "bold";
        return false; // Prevent form submission
    }
    if (username.startsWith(" ")) {
      usernameError.textContent = "Username cannot start with a space.\n"; // Add new line
      usernameError.style.color = "#1999ff";
      usernameError.style.fontWeight = "bold";
      return false; // Prevent form submission
    }
  // Add other username validations as needed
  
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
  
  // Check for empty phone
    if (phone == "") {
        phoneError.textContent = "Phone Number must be filled out.\n";
        phoneError.style.color = "#1999ff";
        phoneError.style.fontWeight = "bold";
        return false; // Prevent form submission
      }
      if (phone.length < 10) {
        phoneError.textContent = "Phone Number must contain 10 numbers.\n";
        phoneError.style.color = "#1999ff";
        phoneError.style.fontWeight = "bold";
        return false; // Prevent form submission
      }
      
    // Check if phone number doesn't contain alphabets
      const alphabetRegex = /[a-zA-Z]/;
      if (alphabetRegex.test(phone)) {
        phoneError.textContent = "Phone Number must not contain alphabets.\n";
        phoneError.style.color = "#1999ff";
        phoneError.style.fontWeight = "bold";
        return false; // Prevent form submission
      }
      
  // Add other phone validations as needed
  
  // Check for empty password
    if (password == "") {
      passwordError.textContent = "Password must be filled out.\n";
      passwordError.style.color = "#1999ff";
      passwordError.style.fontWeight = "bold";
      return false; // Prevent form submission
    }
  
  // Add other password validations as needed
  
  // If all validations pass, allow form submission
    return true;
  }
  function clearInput() {
  // Clear input fields
    document.getElementById("username").value = "";
    document.getElementById("email").value = "";
    document.getElementById("phone").value = "";
    document.getElementById("password").value = "";

  // Clear error messages
    document.getElementById("error1").textContent = "";
    document.getElementById("error2").textContent = "";
    document.getElementById("error3").textContent = "";
    document.getElementById("error4").textContent = "";
}
