<?php

/** @var array $post
 * @var array $tags
 * @var array $author
 * @var array $comments
 * ../app/views/templates/posts/index.php
 * 
 * var disp $posts array (array (id,title,created_at,resume,image,content,authors_id, category_id))
 * var disp $tags array ( id, name )
 * var disp $author array (authorId, lastname, firstname, biography, authorImage )
 * var disp $comments array ( commentsId, pseudo, commentContent, commentCreatedAt)
 * 
 *  echo date('F,d Y \a\t g:ia', $created_at);  F=mois d=jour Y annee 4 chif \a\t =at g=heure i=sec a=am/pm
 */

?>

<p class="mb-5">
  <img src="images/<?php echo $post['image'] ?>" alt="<?php echo htmlspecialchars($post['title']); ?>" class="img-fluid">
</p>

<h1 class="mb-3 h1"><?php echo htmlspecialchars($post['title']); ?></h1>
<p><?php echo htmlspecialchars($post['content']); ?></p>

<h2 class="mb-3 mt-5">#2. Creative WordPress Themes</h2>
<p>Temporibus ad error suscipit exercitationem hic molestiae totam obcaecati rerum, eius aut, in. Exercitationem atque quidem tempora maiores ex architecto voluptatum aut officia doloremque. Error dolore voluptas, omnis molestias odio dignissimos culpa ex earum nisi consequatur quos odit quasi repellat qui officiis reiciendis incidunt hic non? Debitis commodi aut, adipisci.</p>
<p class="mb-5">
  <img src="images/image_2.jpg" alt="" class="img-fluid">
</p>
<p>Quisquam esse aliquam fuga distinctio, quidem delectus veritatis reiciendis. Nihil explicabo quod, est eos ipsum. Unde aut non tenetur tempore, nisi culpa voluptate maiores officiis quis vel ab consectetur suscipit veritatis nulla quos quia aspernatur perferendis, libero sint. Error, velit, porro. Deserunt minus, quibusdam iste enim veniam, modi rem maiores.</p>



<!-- tags -->
<div class="tag-widget post-tag-container mb-5 mt-5">
  <div class="tagcloud">
    <?php foreach ($tags as $tag): ?>
      <a href="tags/<?php echo $tag['tagsId']; ?>/<?php echo Core\Helpers\slugify($tag['tagsName']); ?>.html" class="tag-cloud-link"><?php echo htmlspecialchars($tag['tagsName']); ?></a>
    <?php endforeach; ?>
  </div>
</div>


<!-- authors -->
<?php include '../app/views/templates/authors/show.php'; ?>


<!-- comments -->
<?php include '../app/views/templates/comments/index.php'; ?>