<?php /** @var App\Data\BookDTO[] $data */ ?>

<h1>My Books</h1></br>

<a href="add-book.php">Add new Book</a> | 
<a href="my-profile.php">My Profile</a> |
<a href="logout.php">Logout</a></br></br>


<table border="1">
    <thead>
    <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Genre</th>
        <th>Added by User</th>
        <th>Details</th>
    </tr>   
    </thead>
    <tbody>
        <?php foreach($data as $book):?>
            <tr>
                <td><?= $book->getTitle(); ?></td>
                <td><?= $book->getAuthor(); ?></td>
                <td><?= $book->getGenre()->getName(); ?></td>
                <td><?=$book->getUser()->getUsername(); ?></td>
                <td><a href="view-book.php?id=<?= $book->getId();?>">Details</a></td>
            </tr>
        <?php endforeach?>  
    </tbody>
</table>