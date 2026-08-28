 <h3>Recent Blog</h3>
  <?php
  /**
   *  $posts postsId, postsTitle, postsImage, postsCreatedAt, authorId, firstname, lastname, commentsCount
   */
  include_once '../app/models/postsModel.php';
  global $conn;
  $posts = \App\Models\PostsModel\findLast($conn);

  foreach ($posts as $post):
  $created_at = strtotime($post['postsCreatedAt']); ?>
    <div class="block-21 mb-4 d-flex">
      <a class="blog-img mr-4" style="background-image: url(images/<?php echo $post['postsImage']; ?>);"></a>
      <div class="text">
        <h3 class="heading"><a href="posts/<?php echo $post['postsId']; ?>/<?php echo Core\Helpers\slugify($post['postsTitle']); ?>.html"><?php echo $post['postsTitle']; ?></a></h3>
        <div class="meta">
          <div><a href="posts/<?php echo $post['postsId']; ?>/<?php echo Core\Helpers\slugify($post['postsTitle']); ?>.html"><span class="icon-calendar"></span> <?php echo date('F,d Y  g:ia', $created_at); ?></a></div>
          <div><a href="posts/<?php echo $post['postsId']; ?>/<?php echo Core\Helpers\slugify($post['postsTitle']); ?>.html"><span class="icon-person"></span> <?php echo $post['firstname'] . ' ' . $post['lastname']; ?></a></div>
          <div><a href="posts/<?php echo $post['postsId']; ?>/<?php echo Core\Helpers\slugify($post['postsTitle']); ?>.html"><span class="icon-chat"></span> <?php echo (int) $post['commentsCount']; ?></a></div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>