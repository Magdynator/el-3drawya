<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="all.min.css">
    <link rel="stylesheet" href="SH.css">

    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="media.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg nav-bar">
        <div class="container">
            <a class="navbar-brand text-white" href="#"><h2>Dashboard</h2></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="text-white"><i class="fa-solid fa-bars icon"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link text-white" href="/admindashboard">Home</a>
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/users">Qr-bar code</a>
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/addUser">add user</a>
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/adminlogout">Logout</a>
                        
                    </li>
                    


                </ul>

            </div>
        </div>
    </nav>
@yield('content')

<script src="bootstrap.bundle.min.js"></script>

<script src="dashboard.js"></script>
</body>

</html>

