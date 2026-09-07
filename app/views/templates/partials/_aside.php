<?php

/**
 * ../app/views/templates/partials/_aside.php
 * 
 * $categories id,name 
 *
 */
?>

<div class="sidebar-box">
  <form action="posts/search" method="get" class="search-form" onsubmit="event.preventDefault(); const value = this.elements.query.value.trim(); if (value !== '') { const baseUrl = document.querySelector('base').href.replace(/\/?$/, '/'); window.location.assign(baseUrl + 'posts/search/' + encodeURIComponent(value.replace(/\s+/g, '-'))); }">
    <div class="form-group">
      <span class="icon icon-search"></span>
      <input name="query" type="text" class="form-control" placeholder="Type a keyword and hit enter">
    </div>
  </form>
</div>
<div class="sidebar-box ftco-animate">
  <div class="categories">
    <?php include '../app/views/categories/_index.php'; ?>

  </div>
</div>

<div class="sidebar-box ftco-animate">
  <?php include '../app/views/posts/recentPost.php'; ?>
</div>

<div class="sidebar-box ftco-animate">
  <h3>Tag Cloud</h3>
  <div class="tagcloud">
    <?php include '../app/views/tags/_index.php'; ?>

  </div>
</div>