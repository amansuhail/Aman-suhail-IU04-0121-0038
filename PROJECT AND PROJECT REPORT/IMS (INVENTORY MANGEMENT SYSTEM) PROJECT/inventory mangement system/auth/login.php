<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Inventory MS - Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #f0f2f5;
        }

        .login-box {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 3px 10px #0002;
            width: 450px;
            max-width: 90%;
            text-align: center;
        }

        .login-box h2 {
            margin-bottom: 20px;
            color: #0ea5e9;
        }

        .login-box input {
            width: 90%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 16px;
        }

        .login-box input[type="submit"] {
            width: 95%;
            background: #0ea5e9;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }

        .login-box input[type="submit"]:hover {
            background: #0284c7;
        }

        
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-box">
            <h2><i class="fas fa-user-lock"></i> Login</h2>
            <form method="POST" action="login_user.php">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="submit" name="login" value="Login">
            </form>
            
        </div>
    </div>
</body>

</html>