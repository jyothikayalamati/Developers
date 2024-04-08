$(document).ready(function() {
    // Fetch user details via AJAX when the page is ready
    $.ajax({
        type: 'GET',
        url: 'php/get_user_details.php', // Change this URL to match your actual endpoint
        success: function(response) {
            // Parse the JSON response
            var userDetails = JSON.parse(response);
            
            // Update HTML elements with user details
            $('#username').text(userDetails.username);
            $('#age').text(userDetails.age);
            $('#dob').text(userDetails.dob);
            $('#contact').text(userDetails.contact);
        },
        error: function(xhr, status, error) {
            // Handle errors
            console.error(xhr.responseText);
            // Optionally, display an error message to the user
            // $('#profileError').text('Failed to fetch user details. Please try again later.');
        }
    });
});
