<?php

/**
 * @var array $tag
 */
?>

<div class="col-md-6">
    <div class="page-header">
        <h1>Modification d'un tag</h1>
        <h4><a href="<?php echo htmlspecialchars(BACKOFFICE_BASE_URL ?? '', ENT_QUOTES, 'UTF-8'); ?>tags">Retour aux tags</a></h4>
    </div>
    <form action="<?php echo htmlspecialchars(BACKOFFICE_BASE_URL ?? '', ENT_QUOTES, 'UTF-8'); ?>tags/update/<?php echo (int) $tag['id']; ?>" method="post">
        <div>
            <label for="name">Tag : </label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($tag['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" />
        </div>
        <div>
            <input type="submit" class="btn btn-lg btn-primary edit-form" value="Modifier" />
        </div>
    </form>
</div>