<?php /** @var \DTO\UserViewModel $model */ ?>

<h1> Hello Mr/Ms <?= $model->getFirstName(); ?> <?= $model->getLastName()?></h1>

<div class="well bs-component">

</div>
<form action="/Custom-Framework/users/edit/4">
    Username: <input type="text" name="username"> <br>
    Password: <input type="text" name="password"> <br>
    Email: <input type="text" name="email"><br>
    Birthday: <input type="text" name="birthday"><br>
    <input type="submit" name="edit" value="Edit">
</form>