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
            aria-controls="navbar"
          >
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">BACKOFFICE WED PROJECT</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">DASHBOARD</a></li>
            <li class="dropdown">
              <a
                href="#"
                class="dropdown-toggle"
                data-toggle="dropdown"
                role="button"
                aria-haspopup="true"
                aria-expanded="false"
                >GESTION <span class="caret"></span
              ></a>
              <ul class="dropdown-menu">
                <li class="dropdown-header">GESTION DES POSTS</li>
                <li><a href="#">Liste des posts</a></li>
                <li><a href="#">Ajouter un post</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">GESTION DES CATÉGORIES</li>
                <li><a href="#">Liste des catégories</a></li>
                <li><a href="#">Ajouter une catégorie</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">GESTION DES TAGS</li>
                <li><a href="#">Liste des tags</a></li>
                <li><a href="#">Ajouter un tag</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">GESTION DES UTILISATEURS</li>
                <li><a href="#">Liste des utilisateurs</a></li>
                <li><a href="#">Ajouter un utilisateur</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <!--/.nav-collapse -->
      </div>
    </nav>