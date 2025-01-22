@extends('website.template.master')
@section('content')
<!-- Main Dashboard Content -->
<div class="container">
    <div class="main-content">
        <header class=" text-center">

            <h1 class="">Welcome, {{ $adminName}} !</h1>
            <p>Today is <span id="date"></span></p>
        </header>

        <!-- Stats Section -->
        <section class="stats">
            <div class="card">
                <h3>Total Users</h3>
                <p id="totalSales">{{ $count}}</p>
            </div>
            <div class="card">
                <h3>Total transaction </h3>
                <p id="newUsers">{{ $transactionHistory}}</p>
            </div>
            <div class="card">
                <h3>Traffic</h3>
                <p id="traffic">0 visits</p>
            </div>
        </section>

        <!-- Charts Section -->
        <section class="charts">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>personal id</th>
                            <th>first name</th>
                            <th>last name</th>
                            <th>point</th>
                            <th>age</th>
                            <th>phone number</th>
                            <th>adress</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        @php
                        $birthDate = \Carbon\Carbon::parse($user-> date_of_birth);

                        @endphp
                        <tr>
                            <td>{{$user -> personal_id}}</td>
                            <td>{{$user -> first_name}}</td>
                            <td>{{$user -> last_name}}</td>
                            <td>{{$user -> point}}</td>
                            <td>{{$birthDate ->age}}</td>
                            <td>{{$user -> phone_number}}</td>
                            <td>{{$user -> address}}</td>


                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </br>
        </section>

    </div>
</div>

@endsection()