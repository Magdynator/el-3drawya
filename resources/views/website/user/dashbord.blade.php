<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ATM Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div id="dashboardPage" class="page">
        <h2>Dashboard</h2>
        <div class="balance">
            <p>Balance: ${{ $data['point'] }}</p>
        </div>
        <div class="buttons">
            <form action="withdraw">
                <button href="withdraw">Lose</button>
            </form>
            <form action="Deposit">
                <button href="Deposit">Win</button>
            </form>
            <form action="transaction">
                <button href="transaction">Transaction History</button>
            </form>
            <form action="logout" method="post">
                @csrf
                <button href="logout">Logout</button>
            </form>

        </div>
    </div>

    <script src="javascript/script2.js"></script>
</body>

</html>