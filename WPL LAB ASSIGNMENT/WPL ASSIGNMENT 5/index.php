<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Facebook Sign-Up</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <h1>Facebook</h1>
    <form id="signupForm" action="signup.php" method="POST">
    <h2>Create a new account</h2>

    <div class="box">
        <input class="f-data" id="firstName" type="text" name="first_name" placeholder="First name" required />
        <input class="f-data" id="surname" type="text" name="surname" placeholder="Surname" required />
    </div>

    <label>Date of Birth</label>
    <div class="box">
        <input class="f-data" id="dob" type="date" name="dob">
    </div>

    <label>Gender</label>
    <br>
    <div class="box">
        <input type="radio" name="gender" value="male" id="male">
        <label for="male">Male</label>

        <input type="radio" name="gender" value="female" id="female">
        <label for="female">Female</label>
    </div>

    <input class="f-data" id="email" type="email" name="email" placeholder="Email address" required />
    <input class="f-data" id="password" type="password" name="password" placeholder="Password" required />
    <input class="f-data" id="confirmPassword" type="password" placeholder="Confirm password" required />

    <button class="f-data" type="submit">Sign Up</button>
</form>

    <script src="app.js"></script>
</body>

</html>
