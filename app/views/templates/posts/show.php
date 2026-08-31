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

<!-- posts -->
<?php include '../app/views/templates/posts/_show.php'; ?>


<!-- tags -->
<?php include '../app/views/templates/tags/postsTag.php'; ?>


<!-- authors -->
<?php include '../app/views/templates/authors/show.php'; ?>


<!-- comments -->
<?php include '../app/views/templates/comments/index.php'; ?>