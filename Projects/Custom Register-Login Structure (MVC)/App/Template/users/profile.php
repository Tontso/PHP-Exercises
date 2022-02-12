<?php /** @var \App\Data\UserDTO $data */ ?>

<h2>Your Profile</h2></br>
<form method="POST">
    <label>
    Username: <input type="text" name="username" value="<?= $data->getUsername()?>"/></br>
    </label>
    Password: <input type="text" name="password" /></br>
    Confirm Password: <input type="text" name="confirm_password" /></br>
    First Name: <input type="text" name="first_name" value="<?= $data->getFirstName()?>"/></br>
    Last Name: <input type="text" name="last_name" value="<?= $data->getLastName()?>"/></br>
    Birthday: <input type="text" name="born_on" value="<?= $data->getBornOn()?>"/></br>
    <input type="submit" name="edit" value="Edit"/>
</form>

You can <a href="logout.php">Logout</a>