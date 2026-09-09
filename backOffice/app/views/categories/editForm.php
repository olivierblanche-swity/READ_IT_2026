<?php
/**
 * @var array $category
 */
?>

<div class="col-md-6">
    <div class="page-header">
        <h1>Modification d'une catégorie</h1>
        <h4><a href="<?php echo BACKOFFICE_BASE_URL; ?>categories">Retour aux catégories</a></h4>
    </div>
    <form action="<?php echo BACKOFFICE_BASE_URL; ?>categories/update/<?php echo $category['id']; ?>" method="post">
        <div>
            <label for="name">Catégorie : </label>
            <input type="text" id="name" name="name" value="<?php echo $category['name']; ?>" />
        </div>
        <div>
            <input type="submit" class="btn btn-lg btn-primary edit-form" value="Modifier" />
        </div>
    </form>
</div>