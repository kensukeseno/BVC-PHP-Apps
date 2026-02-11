<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <h2>Login</h2>

        <form method="POST" action="index.php">
            <div>
                <label for="email">Email:</label>
                <input id="email" placeholder="Enter your email" type="email" name="email" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input id="password" placeholder="Enter your password" type="password" name="password" required>
            </div>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
    <div>
        <p><a href="index.php?page=RegisterView">Go back to Register</a></p>
    </div>
</body>

</html>