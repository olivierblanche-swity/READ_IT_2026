<?php

/**
 * @var array $author
 */
?>

<div class="col-md-6">
    <div class="page-header">
        <h1>Modification d'un auteur</h1>
        <h4><a href="<?php echo BACKOFFICE_BASE_URL; ?>authors">Retour aux auteurs</a></h4>
    </div>
    <form action="<?php echo BACKOFFICE_BASE_URL; ?>authors/update/<?php echo $author['id']; ?>" method="post">
        <div>
            <label for="firstname">Prénom : </label>
            <input type="text" id="name" name="firstname" placeholder="" value="<?php echo $author['firstname']; ?>" />
        </div>
        <div>
            <label for="lastname">Nom : </label>
            <input type="text" id="name" name="lastname" placeholder="" value="<?php echo $author['lastname']; ?>" />
        </div>
        <div>
            <label for="biography">Biographie : </label>
            <textarea id="biography" name="biography" rows="6" style="width: 100%; min-height: 150px; resize: vertical;" placeholder=""><?php echo htmlspecialchars($author['biography'] ?? ''); ?></textarea>
        </div>
        <div>
            <label for="image">image : </label>
            <input type="text" id="name" name="image" placeholder="" value="<?php echo $author['image']; ?>" />
        </div>
        <div>
            <input type="submit" class="btn btn-lg btn-primary edit-form" value="Modifier" />
        </div>
    </form>
</div>