<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
</head>

<body>
    <h1>Student List</h1>
    <?php if (isset($_SESSION["message"])): ?>
        <p><?php echo $_SESSION["message"]; ?></p>
    <?php endif; ?>


    <form method="POST" action="index.php">
        <input type="text" name="name" placeholder="Enter a new student name">
        <input type="text" name="email" placeholder="Enter a new student email">
        <button type="submit" name="add_student">Add Student</button>
    </form></br>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($student = $students->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $student['id']; ?></td>
                    <td><?php echo $student['name']; ?></td>
                    <td><?php echo $student['email']; ?></td>
                    <td>
                        <form method="POST" action="index.php" style="display:inline">
                            <input type="hidden" name="id" value="<?php echo $student['id']; ?>">
                            <button type="submit" name="delete_student">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>


</body>

</html>