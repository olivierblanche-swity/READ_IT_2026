<?php

/**
 * @var array $authors
 * 
 */
?>

<div class=" col-md-12">
    <div class="page-header ">
        <h1>LISTE DES AUTEURS</h1>
    </div>

    <h4><a href="<?php echo BACKOFFICE_BASE_URL; ?>authors/add/form">Ajout d'un auteur</a></h4>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>id</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Biography</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($authors as $author):; ?>
                <tr>
                    <td><?php echo $author['id']; ?></td>
                    <td><?php echo $author['firstname']; ?></td>
                    <td><?php echo $author['lastname']; ?></td>
                    <td><?php echo $author['biography']; ?></td>
                    <td><?php echo $author['image']; ?></td>

                    <td>
                        <form action="<?php echo BACKOFFICE_BASE_URL; ?>authors/edit/form/<?php echo $author['id']; ?>" method="post" style="display:inline;">
                            <input type="hidden" name="name" value="<?php echo $author['id']; ?>">

                            <button type="submit" class="btn btn-primary">
                                Modifier
                            </button>
                        </form>

                        <form action="<?php echo BACKOFFICE_BASE_URL; ?>authors/delete/<?php echo $author['id']; ?>" method="post" class="delete-form" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $author['id']; ?>">

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