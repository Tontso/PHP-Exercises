<?php /** @var DTO\GenreDTO[] $model */?>

<h1>ADD NEW BOOK</h1></br>

<a href="/Custom-Framework/users/profile">My Profile</a></br></br>

<form action="/Custom-Framework/books/addNewBookPost" method="POST">
    Book Title:<input type="text" name="title"/></br>
    Book Author:<input type="text" name="author"/></br>
    Description:<textarea rows="5" name="description"></textarea></br>
    Image URL:<input type="text" name="image_url"/></br>
    Genre: 
        <select name="genre_id">
            <?php foreach($model as $genre): ?>
            <option value="<?=$genre->getId() ?>"><?= $genre->getName() ?></option>
            <?php endforeach?>
        </select></br>
    <input type="submit" name="add" value="Add New Book">
</form>