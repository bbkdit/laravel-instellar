<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Installation - Purchase Key</title>
</head>
<body>
    <h1>Enter Purchase Key</h1>
    <form action="{{ route('installer.verify-purchase-key') }}" method="POST">
        @csrf
        <div>
            <label for="purchase_key">Purchase Key:</label>
            <input type="text" name="purchase_key" id="purchase_key" required>
        </div>
        <button type="submit">Verify and Next</button>
    </form>
    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
</body>
</html>
