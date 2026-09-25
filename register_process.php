<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h5>Result:</h5>
        <?php
        echo "<p>Full Name: " . $_SESSION["fname"] . " " . $_SESSION["lname"] ."</p>";
        echo "<p>E-mail: " . $_SESSION["emailInput"] . "</p>";
        echo "<p>Password: " . $_SESSION["passwordInput"]  . "</p>";
        echo "<p>Confirmed Password: " . $_SESSION["confPasswordInput"] . "</p>";
        echo "<p>Birthday: " . $_SESSION["bday"] . "</p>";
        echo "<p>Gender: " . $_SESSION["gender"] . "</p>";
        echo "<p>Course of choice: " . $_SESSION["course"] . "</p>";
        ?>
    </div>
</body>

</html>