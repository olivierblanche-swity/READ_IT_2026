<?php

/**
 * @var array $tag
 */
?>

<div class="col-md-6">
    <div class="page-header">
        <h1>Modification d'un tag</h1>
        <h4><a href="<?php echo BACKOFFICE_BASE_URL; ?>tags">Retour aux tags</a></h4>
    </div>
    <form action="<?php echo BACKOFFICE_BASE_URL; ?>tags/update/<?php echo $tag['id']; ?>" method="post">
        <div>
            <label for="name">Tag : </label>
            <input type="text" id="name" name="name" value="<?php echo $tag['name']; ?>" />
        </div>
        <div>
            <input type="submit" class="btn btn-lg btn-primary edit-form" value="Modifier" />
        </div>
    </form>
</div>