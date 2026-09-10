<?php

/**
 * @var array $tags
 * 
 */
?>

<div class=" col-md-12">
    <div class="page-header ">
        <h1>LISTE DES TAGS</h1>
    </div>

    <h4><a href="<?php echo htmlspecialchars(BACKOFFICE_BASE_URL ?? '', ENT_QUOTES, 'UTF-8'); ?>tags/add/form">Ajout d'un tag</a></h4>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tags as $tag):; ?>
                <tr>
                    <td><?php echo (int) $tag['id']; ?></td>
                    <td><?php echo htmlspecialchars($tag['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>

                    <td>
                        <form action="<?php echo htmlspecialchars(BACKOFFICE_BASE_URL ?? '', ENT_QUOTES, 'UTF-8'); ?>tags/edit/form/<?php echo (int) $tag['id']; ?>" method="post" style="display:inline;">
                            <input type="hidden" name="name" value="<?php echo (int) $tag['id']; ?>">

                            <button type="submit" class="btn btn-primary">
                                Modifier
                            </button>
                        </form>

                        <form action="<?php echo htmlspecialchars(BACKOFFICE_BASE_URL ?? '', ENT_QUOTES, 'UTF-8'); ?>tags/delete/<?php echo (int) $tag['id']; ?>" method="post" class="delete-form" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo (int) $tag['id']; ?>">

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