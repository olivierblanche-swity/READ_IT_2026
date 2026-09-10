<?php
/**
 * @var array $category
 */
?>

<div class="col-md-6">
    <div class="page-header">
        <h1>Modification d'une catégorie</h1>
        <h4><a href="<?php echo htmlspecialchars(BACKOFFICE_BASE_URL ?? '', ENT_QUOTES, 'UTF-8'); ?>categories">Retour aux catégories</a></h4>
    </div>
    <form action="<?php echo htmlspecialchars(BACKOFFICE_BASE_URL ?? '', ENT_QUOTES, 'UTF-8'); ?>categories/update/<?php echo (int) $category['id']; ?>" method="post">
        <div>
            <label for="name">Catégorie : </label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($category['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" />
        </div>
        <div>
            <input type="submit" class="btn btn-lg btn-primary edit-form" value="Modifier" />
        </div>
    </form>
</div>