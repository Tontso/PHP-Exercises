<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h1>Profile</h1>
    <h2 style="color:green">Welcome <?=$currentUser->getUsername() ?></h2>
    <a href="edit_profile.php">Edit your profile</a>
</body>
</html>