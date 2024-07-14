<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Installation - Requirements</title>
</head>
<body>
    <h1>System Requirements</h1>
    <ul>
        @foreach ($requirements as $requirement => $status)
            <li>{{ ucfirst($requirement) }}: {{ $status ? 'Pass' : 'Fail' }}</li>
        @endforeach
    </ul>
    <a href="{{ route('installer.environment') }}">Next</a>
</body>
</html>
