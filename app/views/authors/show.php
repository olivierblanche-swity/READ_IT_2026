<?php /**
 * 
 * @var array $author
 * 
 * var disp $author array (authorId, lastname, firstname, biography, authorImage )
 */
?>

<div class="about-author d-flex p-4 bg-light">
  <div class="bio mr-5">
    <img src="images/<?php echo $author['authorImage']; ?>" alt="<?php echo $author['lastname']; ?> <?php echo $author['firstname']; ?>" class="img-fluid mb-4">
  </div>
  <div class="desc">
    <h3><?php echo $author['firstname']; ?> <?php echo $author['lastname']; ?></h3>
    <p><?php echo $author['biography']; ?></p>
  </div>
</div>