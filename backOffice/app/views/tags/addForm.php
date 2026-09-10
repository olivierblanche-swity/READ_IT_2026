<?php

?>

<div class="col-md-6">
    <div class="page-header">
        <h1>Ajout d'un tag</h1>
        <h4><a href="<?php echo BACKOFFICE_BASE_URL; ?>tags">Retour aux tags</a></h4>
    </div>
    <form action="<?php echo BACKOFFICE_BASE_URL; ?>tags/add/insert" method="post">
        <div>
            <label for="name">Nouveau tag : </label>
            <input type="text" id="name" name="name" placeholder="" value="" />
        </div>
        <div>
            <input type="submit" class="btn btn-lg btn-primary" value="Ajouter" />
        </div>
    </form>
</div>