$(document).ready(function() {
    $('#registerForm').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();
        
        // Serialize form data
        var formData = $(this).serialize();
        
        // Send AJAX request to register.php
        $.ajax({
            type: 'POST',
            url: 'php/register.php',
            data: formData,
            success: function(response) {
                // Check the response from the server
                if (response.trim() === 'success') {
                    // Registration successful, redirect to login page or perform any other action
                    window.location.href = 'login.html';
                } else {
                    // Registration failed, display error message to the user
                    alert('Registration failed. Please try again.');
                }
            },
            error: function(xhr, status, error) {
                // Handle AJAX errors
                console.error(xhr.responseText);
                // Optionally, display an error message to the user
                // alert('An error occurred while processing your request. Please try again later.');
            }
        });
    });
});
