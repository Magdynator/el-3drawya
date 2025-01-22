<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ATM Web Interface</title>
    <link rel="stylesheet" href="style.css">
    <style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: center;
    }

    /* Style specific columns */
    td:first-child {
        font-weight: bold;
    }

    td:nth-child(2) {
        color: green;
        font-weight: bold;

    }
    </style>

</head>

<body>

    <div class="table-container">
        <h1>Transaction History</h1>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>الكمية</th>
                    <th>نوعها</th>
                    <th>الوقت</th>
                </tr>
            </thead>
            @php
            $i = 1;
            @endphp
            @foreach($transactions as $index => $transaction)
            <tbody>
                <tr>
                    @if($transaction-> user_id == Auth::user()->id)

                    <td>{{ $i }} </td>
                    <td>{{ $transaction-> point}}</td>
                    <td>{{ $transaction-> inOrOut}}</td>
                    <td>from {{ $transaction-> created_at->diffForHumans()}}</td>
                    @php
                    $i++;
                    @endphp
                    @endif
                </tr>
            </tbody>

            @endforeach

        </table>
        </br>
        <form action="dashboard">
            <button style="width : 80px; display: block;
            margin: 20px auto;" onclick="logout()" href="dashboard">Back</button>
        </form>
    </div>

    </div>

    <script src="script.js"></script>
</body>

</html>