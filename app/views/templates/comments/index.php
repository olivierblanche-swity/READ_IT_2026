<?php 
/**
 * @var array $comments
 * 
 * var disp $comments array ( commentsId, pseudo, commentContent, commentCreatedAt)
 * 
 *  echo date('F,d Y \a\t g:ia', $created_at);  F=mois d=jour Y annee 4 chif \a\t =at g=heure i=sec a=am/pm
 */
?>


<div class="pt-5 mt-5">
  <h3 class="mb-5"><?php echo count($comments); ?> Comments</h3>
  <ul class="comment-list">
    <?php foreach ($comments as $comment):
      $created_at = strtotime($comment['commentCreatedAt']); ?>
      <li class="comment">
        <div class="comment-body">
          <h3><?php echo $comment['pseudo']; ?></h3>
          <div class="meta mb-3"><?php echo date('F,d Y \a\t g:ia', $created_at); ?></div>
          <p><?php echo $comment['commentContent']; ?></p>
        </div>
      </li>
    <?php endforeach; ?>


  </ul>
  <!-- FORM -->

  <?php include_once '../app/views/templates/comments/addForm.php'; ?>
</div>