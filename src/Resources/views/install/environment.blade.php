<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Installation - Environment</title>
</head>
<body>
    <h1>Environment Settings</h1>
    <form action="{{ route('installer.save-environment') }}" method="POST">
        @csrf
        <div>
            <label for="db_host">Database Host:</label>
            <input type="text" name="db_host" id="db_host" required>
        </div>
        <div>
            <label for="db_port">Database Port:</label>
            <input type="text" name="db_port" id="db_port" required>
        </div>
        <div>
            <label for="db_database">Database Name:</label>
            <input type="text" name="db_database" id="db_database" required>
        </div>
        <div>
            <label for="db_username">Database Username:</label>
            <input type="text" name="db_username" id="db_username" required>
        </div>
        <div>
            <label for="db_password">Database Password:</label>
            <input type="password" name="db_password" id="db_password" required>
        </div>
        <button type="submit">Save and Next</button>
    </form>
</body>
</html>
