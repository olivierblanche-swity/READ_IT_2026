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

    <h4><a href="<?php echo BACKOFFICE_BASE_URL; ?>tags/add/form">Ajout d'un tag</a></h4>

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
                    <td><?php echo $tag['id']; ?></td>
                    <td><?php echo $tag['name']; ?></td>

                    <td>
                        <form action="<?php echo BACKOFFICE_BASE_URL; ?>tags/edit/form/<?php echo $tag['id']; ?>" method="post" style="display:inline;">
                            <input type="hidden" name="name" value="<?php echo $tag['id']; ?>">

                            <button type="submit" class="btn btn-primary">
                                Modifier
                            </button>
                        </form>

                        <form action="<?php echo BACKOFFICE_BASE_URL; ?>tags/delete/<?php echo $tag['id']; ?>" method="post" class="delete-form" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $tag['id']; ?>">

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