<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Amazing Portfolio</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>

    <!-- Hero Section -->
    <section id="hero">
        <div class="hero-content">
            @if ($portfolio ['profile_picture'])
            <img src="{{ asset('uploads/users/'.$portfolio['profile_picture']) }}" alt="Profile Picture"
                class="profile-photo">
            @else
            <img src="{{ asset('images/profile.jpg') }}" alt="Profile Picture" class="profile-photo">
            @endif
            <div class="card">
                <h1>{{ $portfolio['point']}} point</h1>
            </div>
            </br>
            <div class="card">
                <p>Hi,{{$portfolio['first_name']}} {{ $portfolio ['last_name']}}</p>
            </div>
            </br>
            <div class="card">
                <p> personal id : {{ $portfolio ['personal_id']}} </p>
            </div>
            </br>
            <div class="card">
                <p> birthday : {{$portfolio ['date_of_birth']}}</p>
            </div>
            </br>
            <div class="card">
                <p> address : {{$portfolio['address']}}</p>
            </div>
            </br>
            <div class="card">
                <p> Phone Number : {{$portfolio['phone_number']}}</p>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer>
        <p> All Rights Reserved خدمة شباب العذراء محرم بك &copy; 2024 .</p>
        <div class="social-icons">
            <a href="https://www.facebook.com/al.3dra">Facebook</a>
        </div>
    </footer>

</body>

</html>