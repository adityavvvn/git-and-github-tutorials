// Function to append value to the display
function appendToDisplay(value) {
  document.getElementById("display").value += value;
}

// Function to clear the display
function clearDisplay() {
  document.getElementById("display").value = "";
}

// Function to delete the last character from the display
function deleteLast() {
  let display = document.getElementById("display").value;
  document.getElementById("display").value = display.slice(0, -1);
}

// Function to calculate and display the result
function calculateResult() {
  try {
    let display = document.getElementById("display").value;
    let result = eval(display); // ⚠️ Be careful with eval
    document.getElementById("display").value = result;
  } catch (error) {
    document.getElementById("display").value = "Error";
  }
}
