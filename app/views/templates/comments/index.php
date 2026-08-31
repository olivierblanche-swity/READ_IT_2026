<?php 
/**
 * @var array $comments
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

  <div class="comment-form-wrap pt-5">
    <h3 class="mb-5">Leave a comment</h3>
    <form action="#" class="p-5 bg-light" method="post">
      <div class="form-group">
        <label for="name">Name *</label>
        <input type="text" class="form-control" id="name">
      </div>
      <div class="form-group">
        <label for="message">Message</label>
        <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
      </div>
      <div class="form-group">
        <input type="hidden" name="postId" value="4" />
        <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
      </div>

    </form>
  </div>
</div>