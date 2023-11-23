// Get the input element by its ID
const positionInput = document.getElementById('position');

if (positionInput) {
    // Add an event listener for the 'change' event
    positionInput.addEventListener('change', function (event) {
        // Get the entered value and convert it to an integer
        let enteredValue = parseInt(event.target.value);

        // Check if the entered value is a valid number
        if (!isNaN(enteredValue)) {
            // Update the input value with the parsed integer
            event.target.value = enteredValue;
        } else {
            // If the entered value is not a valid number, set the input value to 0
            event.target.value = 0;
        }
    });
}


// Get the input element by its ID
const priceInput = document.getElementById('position');

if (priceInput) {
    // Add an event listener for the 'change' event
    priceInput.addEventListener('change', function (event) {
        // Get the entered value and convert it to an integer
        let enteredValue = parseInt(event.target.value);

        // Check if the entered value is a valid number
        if (!isNaN(enteredValue)) {
            // Update the input value with the parsed integer
            event.target.value = enteredValue;
        } else {
            // If the entered value is not a valid number, set the input value to 0
            event.target.value = 0;
        }
    });
}