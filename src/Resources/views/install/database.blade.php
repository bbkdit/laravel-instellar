<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Installation - Database</title>
</head>
<body>
    <h1>Database Setup</h1>
    <form action="{{ route('installer.run-migrations') }}" method="POST">
        @csrf
        <button type="submit">Run Migrations and Seeders</button>
    </form>
</body>
</html>
