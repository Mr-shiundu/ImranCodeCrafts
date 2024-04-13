// JavaScript code for website functionality

// Example function to toggle dark mode using Dark Reader
function toggleDarkMode() {
    const darkModeEnabled = document.documentElement.getAttribute('data-darkreader-mode') === 'dynamic';
    document.documentElement.setAttribute('data-darkreader-mode', darkModeEnabled ? 'light' : 'dynamic');
}

// Example function to handle form submission
function submitForm() {
    // Retrieve form data
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const message = document.getElementById('message').value;

    // Example: Validate form data
    if (!name || !email || !message) {
        alert('Please fill out all fields');
        return;
    }

    // Example: Send form data to server using fetch API
    fetch('https://api.example.com/submit-form', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            name,
            email,
            message,
        }),
    })
    .then(response => {
        if (response.ok) {
            alert('Form submitted successfully');
        } else {
            throw new Error('Form submission failed');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred, please try again later');
    });
}

// Example event listener to trigger function on button click
document.getElementById('submitBtn').addEventListener('click', submitForm);
