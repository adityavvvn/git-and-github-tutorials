function validateForm() {
  // Get form field values
  const name = document.getElementById("name").value;
  const email = document.getElementById("email").value;
  const age = document.getElementById("age").value;
  const mobile = document.getElementById("mobile").value;
  const address = document.getElementById("address").value;

  let errorMessages = "";

  // Name validation: Ensure it’s non-empty and only contains letters
  const namePattern = /^[A-Za-z\s]+$/;
  if (!namePattern.test(name)) {
    errorMessages += "Name must contain only letters and spaces.\n";
  }

  // Email validation: Checked automatically by input type=email, but extra check
  if (email.trim() === "") {
    errorMessages += "Email is required.\n";
  }

  // Age validation: Ensure it’s a positive integer
  if (isNaN(age) || age < 1) {
    errorMessages += "Please enter a valid age.\n";
  }

  // Mobile number validation: Should be exactly 10 digits
  const mobilePattern = /^[0-9]{10}$/;
  if (!mobilePattern.test(mobile)) {
    errorMessages += "Mobile number must be exactly 10 digits.\n";
  }

  // Address validation: Ensure it’s non-empty
  if (address.trim() === "") {
    errorMessages += "Address is required.\n";
  }

  // Display error messages or submit form
  if (errorMessages) {
    document.getElementById("errorMessages").innerText = errorMessages;
    return false; // Prevent form submission
  } else {
    alert("Registration Successful!");
    return true;
  }
}
