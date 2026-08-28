<?php

/**
 * ../app/views/templates/partials/_aside.php
 * 
 * $categories id,name 
 *
 */
?>

<div class="sidebar-box">
  <form action="#" class="search-form">
    <div class="form-group">
      <span class="icon icon-search"></span>
      <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
    </div>
  </form>
</div>
<div class="sidebar-box ftco-animate">
  <div class="categories">
    <?php include '../app/views/templates/categories/_index.php'; ?>

  </div>
</div>

<div class="sidebar-box ftco-animate">
<?php include '../app/views/templates/posts/recentPost.php'; ?>
</div>

<div class="sidebar-box ftco-animate">
  <h3>Tag Cloud</h3>
  <div class="tagcloud">
    <?php include '../app/views//templates/tags/_index.php'; ?>

  </div>
</div>

</div>

</div>