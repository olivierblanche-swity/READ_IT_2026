<?php

?>

<div class="col-md-6">
    <div class="page-header">
        <h1>Ajout d'un auteur</h1>
        <h4><a href="<?php echo htmlspecialchars(BACKOFFICE_BASE_URL ?? '', ENT_QUOTES, 'UTF-8'); ?>authors">Retour aux auteurs</a></h4>
    </div>
    <h4>Nouvel Auteur : </h4>
    <form action="<?php echo htmlspecialchars(BACKOFFICE_BASE_URL ?? '', ENT_QUOTES, 'UTF-8'); ?>authors/add/insert" method="post">
        <div>
            <label for="firstname">Prénom : </label>
            <input type="text" id="name" name="firstname" placeholder="" value="" />
        </div>
        <div>
            <label for="lastname">Nom : </label>
            <input type="text" id="name" name="lastname" placeholder="" value="" />
        </div>
        <div>
            <label for="biography">Biographie : </label>
            <textarea id="biography" name="biography" rows="6" style="width: 100%; min-height: 150px; resize: vertical;" placeholder=""></textarea>
        </div>
        <div>
            <label for="image">image : </label>
            <input type="text" id="name" name="image" placeholder="" value="" />
        </div>
        <div>
            <input type="submit" class="btn btn-lg btn-primary" value="Ajouter" />
        </div>
    </form>
</div>