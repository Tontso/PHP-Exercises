<?php /** @var DTO\UserDTO $model */ ?>

<h1>Home Page</h1></br>
<h2>Welcome, <?= $model->getFullName()?></h2>
<a href="/Custom-Framework/books/addBook">Add new book</a></br> 
<a href="edit-profile.php">Edit your profile</a> | <a href="/Custom-Framework/users/logout">Logout</a></br></br>

<a href="/Custom-Framework/users/showMyBooks">My Books</a></br>
<a href="all-books.php">All books</a>