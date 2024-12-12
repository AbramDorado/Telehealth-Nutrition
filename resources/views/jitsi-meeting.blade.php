@extends('layouts.master')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriMed Meeting</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
        body {
            background-color: #f4f7f6;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }
        .content {
            padding: 20px;
            text-align: center;
        }
        .jitsi-container {
            max-width: 1200px;
            margin: 0 auto;
            height: 500px;
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
            background: #fff;
        }
        .btn-custom {
            background-color: #28a745;
            color: white;
            font-size: 18px;
            padding: 10px 30px;
            border-radius: 5px;
            text-decoration: none;
        }
        .btn-custom:hover {
            background-color: #218838;
        }
        .footer {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>

    <div class="content">
        <div class="jitsi-container" id="jitsi-container"></div>
        <div class="mt-4">
            <a href="{{ url('nutritionforms') }}" class="btn btn-custom">Back to Dashboard</a>
        </div>
    </div>

    <script src="https://meet.jit.si/external_api.js"></script>
    <script>
        const domain = 'meet.jit.si';
        const options = {
            roomName: '{{ $roomName }}',  // Dynamic room name
            width: '100%',
            height: '500px',
            parentNode: document.querySelector('#jitsi-container'),
            configOverwrite: {
                // Optional: Custom configurations (e.g., disable certain features)
            },
            interfaceConfigOverwrite: {
                // Optional: Customize the interface (e.g., hide the 'kick' button)
                TOOLBAR_BUTTONS: ['microphone', 'camera', 'hangup', 'chat'],
            },
        };
        const api = new JitsiMeetExternalAPI(domain, options);
    </script>
</body>
</html>
@endsection