<?php

/**
 * @var array $users
 * 
 */
?>

<div class=" col-md-12">
    <div class="page-header ">
        <h1>LISTE DES UTILISATEURS</h1>
    </div>

    <h4><a href="<?php echo BACKOFFICE_BASE_URL; ?>users/add/form">Ajout d'un utilisateur</a></h4>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>id</th>
                <th>Login</th>
                <th>Password</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Status</th>
                <th>Crée le :</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user):; ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['login']; ?></td>
                    <td>**********</td>
                    <td><?php echo $user['firstname']; ?></td>
                    <td><?php echo $user['lastname']; ?></td>
                    <td><?php echo $user['status']; ?></td>
                    <td><?php echo $user['created_at']; ?></td>

                    <td>
                        <form action="<?php echo BACKOFFICE_BASE_URL; ?>users/edit/form/<?php echo $user['id']; ?>" method="post" style="display:inline;">
                            <input type="hidden" name="name" value="<?php echo $user['id']; ?>">

                            <button type="submit" class="btn btn-primary">
                                Modifier
                            </button>
                        </form>

                        <form action="<?php echo BACKOFFICE_BASE_URL; ?>users/delete/<?php echo $user['id']; ?>" method="post" class="delete-form" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

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