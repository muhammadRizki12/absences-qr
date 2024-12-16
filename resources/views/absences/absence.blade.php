<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
</head>

<body>
    <h1>.....</h1>

    <script>
        document.addEventListener('DOMContentLoaded', async () => {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(async (position) => {
                    const latitude = position.coords.latitude;
                    const longitude = position.coords.longitude;

                    console.log(`Latitude: ${latitude}, Longitude: ${longitude}`);

                    // Prepare data to send
                    const data = {
                        _token: "{{ csrf_token() }}",
                        class_name: "{{ $class_name }}",
                        latitude,
                        longitude
                    };

                    try {
                        const response = await fetch('/users/absences/{{ $class_name }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify(data)
                        });

                        if (response.ok) {
                            const data = await response.json();
                            // console.log('Response:', data);
                            window.location.href = data.redirect_url;
                            alert(data.message);
                        } else {
                            const data = await response.json();
                            window.location.href = data.redirect_url;
                            // console.error('Failed to send data:', response.statusText);
                            alert(data.message);
                        }
                    } catch (error) {
                        console.error('Error:', error);
                    }
                }, (error) => {
                    console.error('Error getting location:', error.message);
                });
            } else {
                alert('Geolocation is not supported by this browser.');
            }
        });
    </script>
</body>

</html>
