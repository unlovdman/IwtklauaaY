<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scan BISINDO Signs</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <style>
        video {
            width: 100%;
            height: auto;
            border: 1px solid black;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto text-center py-10">
        <h1 class="text-4xl font-bold">Scan BISINDO Signs</h1>
        <video id="video" autoplay></video>
        <button id="capture" class="mt-5 bg-blue-500 text-white py-2 px-4 rounded">Capture</button>
        <canvas id="canvas" style="display: none;"></canvas>
    </div>

    <script>
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const captureButton = document.getElementById('capture');

        //akses kamera
        navigator.mediaDevices.getUserMedia({ video: true })
            .then(stream => {
                video.srcObject = stream;
            })
            .catch(err => {
                console.error("Error accessing the camera: ", err);
            });

        //capture img
        captureButton.addEventListener('click', () => {
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            canvas.getContext('2d').drawImage(video, 0, 0);
            const imageData = canvas.toDataURL('image/jpeg');

            //send img ke server
            fetch('/process-image', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ image: imageData })
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                alert('Image processed successfully!');
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>
</body>
</html>