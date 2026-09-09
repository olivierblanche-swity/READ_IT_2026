<?php

/**
 * ../app/views/templates/partials/_main.php
 */
?>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button
        type="button"
        class="navbar-toggle collapsed"
        data-toggle="collapse"
        data-target="#navbar"
        aria-expanded="false"
        aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo BACKOFFICE_BASE_URL; ?>">Back-Office Read-it 2026</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo BACKOFFICE_BASE_URL; ?>">DASHBOARD</a></li>
        <li class="dropdown">
          <a
            href="#"
            class="dropdown-toggle"
            data-toggle="dropdown"
            role="button"
            aria-haspopup="true"
            aria-expanded="false">GESTION <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li class="dropdown-header">GESTION DES POSTS</li>
            <li><a href="<?php echo BACKOFFICE_BASE_URL; ?>posts">Liste des posts</a></li>
            <li><a href="<?php echo BACKOFFICE_BASE_URL; ?>posts/add/form">Ajouter un post</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">GESTION DES CATÉGORIES</li>
            <li><a href="<?php echo BACKOFFICE_BASE_URL; ?>categories">Liste des catégories</a></li>
            <li><a href="<?php echo BACKOFFICE_BASE_URL; ?>categories/add/form">Ajouter une catégorie</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">GESTION DES TAGS</li>
            <li><a href="<?php echo BACKOFFICE_BASE_URL; ?>tags">Liste des tags</a></li>
            <li><a href="<?php echo BACKOFFICE_BASE_URL; ?>tags/add/form">Ajouter un tag</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">GESTION DES UTILISATEURS</li>
            <li><a href="<?php echo BACKOFFICE_BASE_URL; ?>users">Liste des utilisateurs</a></li>
            <li><a href="<?php echo BACKOFFICE_BASE_URL; ?>users/add/form">Ajouter un utilisateur</a></li>
          </ul>
        </li>
        <li><a href="<?php echo BACKOFFICE_BASE_URL; ?>users/logout">LOGOUT</a></li>
      </ul>
    </div>
    <!--/.nav-collapse -->
  </div>
</nav>