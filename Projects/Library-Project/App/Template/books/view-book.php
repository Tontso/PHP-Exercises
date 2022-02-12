<?php /** @var App\Data\BookDTO $data */?>

<h1>View Book</h1><br>
<a href="my-profile.php">My Profile</a> <br><br>
<p><b>Book Title: </b><?= $data->getTitle();?></p>
<p><b>Book Author: </b><?= $data->getAuthor();?></p>
<p><b>Description: </b><?= $data->getDescription();?></p>
<p><b>Genre: </b><?= $data->getGenre()->getName();?></p>
<?php echo "ImageURL:". $data->getImageURL(); ?><br>
<img src="<?= $data->getImageURL()?>" alt="None" width="400" height="200">
