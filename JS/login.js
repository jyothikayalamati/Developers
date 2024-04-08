$(document).ready(function() {
    // When the login form is submitted
    $('#loginForm').submit(function(event) {
       // Prevent the default form submission
       event.preventDefault();
       
       // Get form data
       var formData = $(this).serialize();
       
       // Send AJAX request to login.php
       $.ajax({
          type: 'POST',
          url: 'login.php',
          data: formData,
          success: function(response) {
             // If login is successful, redirect to profile page
             if (response === 'success') {
                window.location.href = 'profile.php';
             } else {
                // Display error message or handle unsuccessful login
                alert('Invalid email or password. Please try again.');
             }
          }
       });
    });
 });
 