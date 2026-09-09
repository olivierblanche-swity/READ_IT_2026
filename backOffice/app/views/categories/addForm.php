<?php

?>

<div class="col-md-6">
    <div class="page-header">
        <h1>Ajout d'une catégorie</h1>
        <h4><a href="<?php echo BACKOFFICE_BASE_URL; ?>categories">Retour aux catégories</a></h4>
    </div>
    <form action="<?php echo BACKOFFICE_BASE_URL; ?>categories/add/insert" method="post">
        <div>
            <label for="name">Nouvelle Catégorie : </label>
            <input type="text" id="name" name="name" placeholder="" value="" />
        </div>
        <div>
            <input type="submit" class="btn btn-lg btn-primary" value="Ajouter" />
        </div>
    </form>
</div>