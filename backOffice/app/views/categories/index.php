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

    <h4><a href="<?php echo BACKOFFICE_BASE_URL; ?>categories/add/form">Ajout d'une catégorie</a></h4>

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
                    <td><?php echo $category['id']; ?></td>
                    <td><?php echo $category['name']; ?></td>

                    <td>
                        <form action="<?php echo BACKOFFICE_BASE_URL; ?>categories/edit/form/<?php echo $category['id']; ?>" method="post" style="display:inline;">
                            <input type="hidden" name="name" value="<?php echo $category['id']; ?>">

                            <button type="submit" class="btn btn-primary">
                                Modifier
                            </button>
                        </form>

                        <form action="<?php echo BACKOFFICE_BASE_URL; ?>categories/delete/<?php echo $category['id']; ?>" method="post" class="delete-form" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $category['id']; ?>">

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