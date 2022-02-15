<?php /** @var DTO\BookDTO[] $model */ ?>

<h1>My Books</h1></br>

<a href="/Custom-Framework/books/addBook">Add new Book</a> | 
<a href="/Custom-Framework/users/profile">My Profile</a> |
<a href="logout.php">Logout</a></br></br>


<table border="1">
    <thead>
    <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Genre</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>   
    </thead>
    <tbody>
        <?php foreach($model as $book):?>
            <tr>
                <td><?= $book->getTitle(); ?></td>
                <td><?= $book->getAuthor(); ?></td>
                <td><?= $book->getGenre()->getName(); ?></td>
                <td><a href="/Custom-Framework/books/edit?id=<?= $book->getId();?>">Edit Book</a></td>
                <td><a href="delete-book.php?id=<?= $book->getId();?>">Delete book</a></td>
            </tr>
        <?php endforeach?>  
    </tbody>
</table>