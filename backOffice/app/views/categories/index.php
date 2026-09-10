<?php

/**
 * @var array $categories
 * 
 */
?>

<div class=" col-md-12">
    <div class="page-header ">
        <h1>LISTE DES CATEGORIES</h1>
    </div>

    <h4><a href="<?php echo htmlspecialchars(BACKOFFICE_BASE_URL ?? '', ENT_QUOTES, 'UTF-8'); ?>categories/add/form">Ajout d'une catégorie</a></h4>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category):; ?>
                <tr>
                    <td><?php echo (int) $category['id']; ?></td>
                    <td><?php echo htmlspecialchars($category['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>

                    <td>
                        <form action="<?php echo htmlspecialchars(BACKOFFICE_BASE_URL ?? '', ENT_QUOTES, 'UTF-8'); ?>categories/edit/form/<?php echo (int) $category['id']; ?>" method="post" style="display:inline;">
                            <input type="hidden" name="name" value="<?php echo (int) $category['id']; ?>">

                            <button type="submit" class="btn btn-primary">
                                Modifier
                            </button>
                        </form>

                        <form action="<?php echo htmlspecialchars(BACKOFFICE_BASE_URL ?? '', ENT_QUOTES, 'UTF-8'); ?>categories/delete/<?php echo (int) $category['id']; ?>" method="post" class="delete-form" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo (int) $category['id']; ?>">

                            <button type="submit" class="btn btn-secondary delete-btn">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>