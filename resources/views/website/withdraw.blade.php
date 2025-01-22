<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ATM Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="dashboardPage" class="page">
        <h2>Dashboard</h2>
        <div class="balance">
            <p>Balance: ${{ $data['point'] }}</p>
        </div>
        <form id="form" action="Withdrawn" method="post">
            @csrf
            <label for="Withdraw">Lose:</label>
            <input type="number" name="withdraw" class="input" />
            <button id="submit">Lose</button>
        </form>
    </div>

</body>

</html>