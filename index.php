<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $password = $_POST["passwordInput"] ?? "";
    $confPassword = $_POST["confPasswordInput"] ?? "";

    $pattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?!.*\s).{5,20}$/";

    function passwordError(){
        return '
            <h6>The password you\'ve made did not meet our requirements. Make sure that your password has at least:</h6>
            <p>* One (1) uppercase</p>
            <p>* One (1) lowecase</p>
            <p>* One (1) number</p>
            <p>* No whitespaces</p>
            <p>* A minimum of 5 characters</p>
            <p>* A maximum of 20 characters</p>
            <?php
        ';
    }

    function confPasswordError(){
        return '
            <h6>The password did not match the initial password you put in.</h6>
        ';
    }

    if (preg_match($pattern, $password) === 0) {
        $passwordError = passwordError();
    } elseif ($confPassword !== $password) {
        $confPasswordError = confPasswordError();
    } else {
        $_SESSION["fname"] = $_POST["fname"] ?? "";
        $_SESSION["lname"] = $_POST["lname"] ?? "";
        $_SESSION["emailInput"] = $_POST["emailInput"] ?? "";
        $_SESSION["passwordInput"] = $password;
        $_SESSION["confPasswordInput"] = $_POST["confPasswordInput"] ?? "";
        $_SESSION["bday"] = $_POST["bday"] ?? "";
        $_SESSION["gender"] = $_POST["gender"] ?? "";
        $_SESSION["course"] = $_POST["course"] ?? "";

        header("Location: register_process.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <script src="myScript.js"></script>
</head>

<body>
    <div class="container mt-5">
        <center>
            <h3>Registration Form</h3>
        </center>
        <form method="post">
            <div class="mb-3">
                <label for="fname" class="form-label">First Name:</label>
                <input type="text" id="fname" name="fname" class="form-control" placeholder="John" required>
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">Last Name:</label>
                <div class="input-group has-validation">
                    <input type="text" id="lname" name="lname" class="form-control" placeholder="Doe" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="emailInput" class="form-label">E-mail:</label>
                <input type="email" id="emailInput" name="emailInput" class="form-control" placeholder="johndoe@example.com" required>
            </div>
            <div class="mb-3">
                <label for="passwordInput" class="form-label">Password:</label>
                <input type="password" id="passwordInput" name="passwordInput" class="form-control" required>
                <div class="form-text">Password should contain at least one (1) uppercase, one (1) lowercase, one (1) number, no white spaces, minimum of 5 characters, maximum of 20 characters.</div>
                <input type="checkbox" onclick="myFunctionA()"> Show Password
                <?php
                if (isset($passwordError)) {
                ?>
                    <div class="text-danger">
                        <?= $passwordError ?>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="mb-3">
                <label for="confPasswordInput" class="form-label">Confirm Password:</label>
                <input type="password" id="confPasswordInput" name="confPasswordInput" class="form-control" required>
                <input type="checkbox" onclick="myFunctionB()"> Show Password
                <?php
                if (isset($confPasswordError)) {
                ?>
                    <div class="text-danger">
                        <?= $confPasswordError ?>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="mb-3">
                <label for="bday" class="form-label">Birthday:</label>
                <input type="date" id="bday" name="bday" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Gender:</label>
                <br>
                <input class="form-check-input" type="radio" name="gender" id="male" value="Male" required>
                <label class="form-check-label" for="male">Male</label>
                <input class="form-check-input" type="radio" name="gender" id="female" value="Female" required>
                <label class="form-check-label" for="female">Female</label>
            </div>
            <div class="mb-3">
                <label class="form-label" for="course">Course:</label>
                <select name="course" id="course" class="form-control" required>
                    <option value="" selected disabled>-- Select Course --</option>
                    <option value="BSCRIM">Bachelor of Science in Criminology</option>
                    <option value="BSCA">Bachelor of Science in Customs Administration</option>
                    <option value="BEEd">Bachelor of Elementary Education</option>
                    <option value="BSIT">Bachelor of Science in Information Technology</option>
                    <option value="BSM">Bachelor of Science in Midwifery</option>
                    <option value="BSN">Bachelor of Science in Nursing</option>
                    <option value="BSEd">Bachelor of Secondary Education</option>
                    <option value="BSTM">Bachelor of Science in Tourism Management</option>
                </select>
            </div>
            <div class="d-grid gap-2">
                <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Register">
            </div>
        </form>
    </div>
</body>

</html>