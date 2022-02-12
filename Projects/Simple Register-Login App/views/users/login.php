<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login Form</h1>
    <div id="error" style="color:green">
        <h1><?=$error;?></h1>
    </div>
    <form method="post">
        Username: <input type="text" name="username"></br>
        Password: <input type="password" name="password"></br>
        <input type="submit" name="login" value="Login Now!">
    </form>
</body>
</html>