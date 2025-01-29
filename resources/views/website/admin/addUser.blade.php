@extends('website.template.master')
@section('content')
<link rel="stylesheet" href="css/userstyles.css">
<!-- Main Dashboard Content -->
<div class="regcontainer">
    <h1>Register</h1>
    <form action="reg" method="post" id="registrationForm" enctype="multipart/form-data">
        @csrf
        <label for="pin">PIN:</label>
        <input type="text" id="pin" name="pin" required>

        <label for="role">User Role:</label>
        <select id="role" name="role" required>
            <option value="">Select Role</option>
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>

        <label for="personal_id">Personal ID:</label>
        <input type="text" id="personal_id" name="personal_id" required>

        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="">Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>

        <label for="barcode">Barcode:</label>
        <input type="text" id="barcode" name="barcode" required>

        <label for="qrcode">QR Code:</label>
        <input type="text" id="qrcode" name="qrcode" required>

        <label for="points">Points:</label>
        <input type="number" id="points" name="points" value="0" min="0" required>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required>

        <label for="bio">Bio:</label>
        <textarea id="bio" name="bio" rows="4"></textarea>

        <label for="profile_picture">Profile Picture:</label>
        <input type="file" id="profile_picture" name="profile_picture" accept="image/*">

        <label for="Phonenumber">Phone number:</label>
        <input type="text" id="Phonenumber" name="Phonenumber" required>

        <label for="address">Address:</label>
        <textarea id="address" name="address" rows="4" required></textarea>

        <button type="submit">Register</button>
    </form>
    <p id="formFeedback"></p>
</div>
<script src="javascript/script.js"></script>

@endsection()