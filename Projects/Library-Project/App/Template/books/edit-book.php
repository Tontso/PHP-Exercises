<?php /**
 * @var App\Data\EditBookDTO $data
 */?>

<h1>EDIT BOOK</h1><br>
<a href="my-profile.php">My Profile</a>

<form method="POST">
    Book Title:<input type="text" name="title" value="<?=$data->getBookDTO()->getTitle();?>"/></br>
    Book Author:<input type="text" name="author" value="<?= $data->getBookDTO()->getAuthor()?>"/></br>
    Description:<textarea rows="5" name="description" ><?=$data->getBookDTO()->getDescription();?></textarea></br>
    Image URL: <input type="text" name="image_url" value="<?= $data->getBookDTO()->getImageURL(); ?>"/><br/>
    Genre: <select name="genre_id"><br/>
        <?php foreach ($data->getGenres() as $genre): ?>
            <?php if ($data->getBookDTO()->getGenre()->getId() === $genre->getId()): ?>
                <option selected="selected" value="<?= $genre->getId(); ?>"><?= $genre->getName(); ?></option>
            <?php else: ?>
                <option value="<?= $genre->getId(); ?>"><?= $genre->getName(); ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select><br/>
    <input type="submit" name="edit" value="Edit">
</form>