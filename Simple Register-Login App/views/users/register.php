<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Register Form</h1>
    <div id="error" style="color:red">
        <h1><?=$error;?></h1>
    </div>
    <form method="post">
        Username: <input type="text" name="username"></br>
        Password: <input type="password" name="password"></br>
        Confirm password: <input type="password" name="confirm"></br>
        <input type="submit" name="register" value="Register Now">
    </form>
</body>
</html>