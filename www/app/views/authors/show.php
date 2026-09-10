<?php /**
 * 
 * @var array $author
 * 
 * var disp $author array (authorId, lastname, firstname, biography, authorImage )
 */
?>

<div class="about-author d-flex p-4 bg-light">
  <div class="bio mr-5">
    <img src="images/<?php echo htmlspecialchars(rawurlencode($author['authorImage'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($author['lastname'] ?? '', ENT_QUOTES, 'UTF-8'); ?> <?php echo htmlspecialchars($author['firstname'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="img-fluid mb-4">
  </div>
  <div class="desc">
    <h3><?php echo htmlspecialchars($author['firstname'] ?? '', ENT_QUOTES, 'UTF-8'); ?> <?php echo htmlspecialchars($author['lastname'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h3>
    <p><?php echo htmlspecialchars($author['biography'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
  </div>
</div>