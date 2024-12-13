<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Location Submission</title>
</head>

<body>
    <h1>Index Blade</h1>
    <input type="text" id="lokasi">
    <div id="error-message"></div>

    <script>
        // Wrap everything in a self-executing function to avoid global scope issues
        (function() {
            // Get DOM elements
            const lokasiInput = document.getElementById('lokasi');
            const errorMessageEl = document.getElementById('error-message');

            // Function to display error messages
            function displayError(message) {
                console.error(message);
                if (errorMessageEl) {
                    errorMessageEl.textContent = message;
                    errorMessageEl.style.color = 'red';
                }
            }

            // Check if geolocation is supported
            if (!navigator.geolocation) {
                displayError('Geolocation is not supported by this browser.');
                return;
            }

            // Success callback for geolocation
            function successCallback(position) {
                try {
                    // Safely get coordinates
                    const latitude = position.coords.latitude;
                    const longitude = position.coords.longitude;

                    // Validate coordinates
                    if (!latitude || !longitude) {
                        throw new Error('Invalid coordinates');
                    }

                    // Set input value
                    if (lokasiInput) {
                        lokasiInput.value = `${latitude},${longitude}`;
                    }

                    // Prepare form data
                    const formData = new FormData();
                    formData.append('location', `${latitude},${longitude}`);

                    // Send POST request
                    fetch('/absences/{{ $class_name }}', {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                    'content'),
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.success) {
                                // Redirect if success
                                window.location.href = data.redirect;
                            } else {
                                // Tangani kesalahan
                                console.error(data.message);
                            }
                        })
                        .catch(error => {
                            displayError('Submission error: ' + error.message);
                        });

                } catch (error) {
                    displayError('Error processing location: ' + error.message);
                }
            }

            // Error callback for geolocation
            function errorCallback(error) {
                switch (error.code) {
                    case error.PERMISSION_DENIED:
                        displayError("User denied the request for Geolocation.");
                        break;
                    case error.POSITION_UNAVAILABLE:
                        displayError("Location information is unavailable.");
                        break;
                    case error.TIMEOUT:
                        displayError("The request to get user location timed out.");
                        break;
                    case error.UNKNOWN_ERROR:
                        displayError("An unknown error occurred.");
                        break;
                }
            }

            // Request current position
            navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
        })();
    </script>
</body>

</html>
