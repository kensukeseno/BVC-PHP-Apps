<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <div class="container">
        <h2>Register</h2>
        <?php if (isset($_SESSION["message"])): ?>
            <p><?php echo $_SESSION["message"]; ?></p>
        <?php endif; ?>
        <form method="POST" action="index.php">
            <div>
                <label for="username">Username:</label>
                <input id="username" placeholder="Enter your username" type="text" name="username" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input id="email" placeholder="Enter your email" type="email" name="email" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input id="password" placeholder="Enter your password" type="password" name="password" required>
            </div>
            <div>
                <label for="confirm_password">Confirm Password:</label>
                <input id="confirm_password" placeholder="Confirm your password" type="password" name="confirm_password" required>
            </div>
            <button type="submit" name="register">Register</button>
        </form>
    </div>
    <div>
        <p><a href="index.php?page=LoginView">Already have an account?</a></p>
    </div>
</body>

</html>