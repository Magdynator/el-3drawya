<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: linear-gradient(135deg, #6e8efb, #a777e3);
        color: #fff;
    }

    .login-container {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        padding: 20px 40px;
        border-radius: 12px;
        text-align: center;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    }

    h2 {
        margin-bottom: 20px;
    }

    input {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: none;
        border-radius: 5px;
        background: rgba(255, 255, 255, 0.2);
        color: #fff;
    }

    input:focus {
        outline: none;
        background: rgba(255, 255, 255, 0.4);
    }

    button {
        width: 100%;
        padding: 10px;
        margin-top: 10px;
        border: none;
        border-radius: 5px;
        background: #6e8efb;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    button:hover {
        background: #a777e3;
    }

    .links {
        margin-top: 15px;
        font-size: 14px;
    }

    .links a {
        color: #fff;
        text-decoration: none;
        margin: 0 5px;
    }

    .links a:hover {
        text-decoration: underline;
    }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Welcome to your website</h2>
        <form action="adminlog" method="post">
            @csrf
            <input type="password" name="pin" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html>