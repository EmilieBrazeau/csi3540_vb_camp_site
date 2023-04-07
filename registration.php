<!DOCTYPE html>
<html>
<head>
    <title>User Registration | PHP</title>
</head>
<body>
    <div>
        <form action="registration.php">
            <div class="container">
                <h1>Registration</h1>
                <p>Fill up the form with correct values.</p>
                <label for="firstName"><b>First Name</b></label>
                <input type="text" name="firstName" required>

                <label for="lastName"><b>Last Name</b></label>
                <input type="text" name="lastName" required>

                <label for="email"><b>Email address</b></label>
                <input type="email" name="email" required>

                <label for="phoneNumber"><b>Phone number</b></label>
                <input type="text" name="phoneNumber" required>

                <label for="password"><b>Password</b></label>
                <input type="password" name="password" required>

                <input type="submit" name="create" value="Sign up">
            </div>
        </form>
    </div>

</body>
</html>