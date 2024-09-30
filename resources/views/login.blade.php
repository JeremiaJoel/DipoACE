<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DipoACE Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="background">
        <div class="overlay"></div>
        <div class="login-box">
            <div class="logo">
                <img src="img/dipoace.png" alt="DipoACE Logo">
            </div>
            <form class="login-form">
                <h2>LOGIN</h2>
                <div class="input-group">
                    <label for="email">Email/NIP/NIM</label>
                    <input type="text" id="email" name="email" placeholder="Email/NIP/NIM" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="forgot-password">
                    <a href="#">forgot your password?</a>
                </div>
                <button type="submit" class="login-btn">LOG IN</button>
            </form>
            <div class="create-account">
                <a href="#">CREATE AN ACCOUNT</a>
            </div>
        </div>
    </div>
</body>
</html>
