<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Form</h1>
    <form action="process.php" method="POST">
        <input type="text" name="username" placeholder="Enter username">
        <input type="text" name="password" placeholder="Enter password">
        <input type="submit" >
    </form>

    <h2>Search:</h2>
    <form action="search.php">
        <input type="text" name="query">
        <button type="submit">Search</button>
    </form>
    <h2>Process:</h2>
    <form action="process.php" method="POST">
        <input type="text" name="username">
        <input type="text" name="password">
        <button type="submit">Process</button>
    </form>

</body>
</html>