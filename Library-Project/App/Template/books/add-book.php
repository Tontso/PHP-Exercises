<?php /** @var App\Data\GenreDTO[] $data */?>

<h1>ADD NEW BOOK</h1></br>

<a href="my-profile.php">My Profile</a></br></br>

<form method="POST">
    Book Title:<input type="text" name="title"/></br>
    Book Author:<input type="text" name="author"/></br>
    Description:<textarea rows="5" name="description"></textarea></br>
    Image URL:<input type="text" name="image_url"/></br>
    Genre: 
        <select name="genre_id">
            <?php foreach($data as $genre): ?>
            <option value="<?=$genre->getId() ?>"><?= $genre->getName() ?></option>
            <?php endforeach?>
        </select></br>
    <input type="submit" name="add">
</form>
