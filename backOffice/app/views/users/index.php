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

    <h4><a href="<?php echo htmlspecialchars(BACKOFFICE_BASE_URL ?? '', ENT_QUOTES, 'UTF-8'); ?>users/add/form">Ajout d'un utilisateur</a></h4>

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
                    <td><?php echo (int) $user['id']; ?></td>
                    <td><?php echo htmlspecialchars($user['login'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>**********</td>
                    <td><?php echo htmlspecialchars($user['firstname'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($user['lastname'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($user['status'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($user['created_at'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>

                    <td>
                        <form action="<?php echo htmlspecialchars(BACKOFFICE_BASE_URL ?? '', ENT_QUOTES, 'UTF-8'); ?>users/edit/form/<?php echo (int) $user['id']; ?>" method="post" style="display:inline;">
                            <input type="hidden" name="name" value="<?php echo (int) $user['id']; ?>">

                            <button type="submit" class="btn btn-primary">
                                Modifier
                            </button>
                        </form>

                        <?php if ((int) $user['id'] !== 1): ?>
                        <form action="<?php echo htmlspecialchars(BACKOFFICE_BASE_URL ?? '', ENT_QUOTES, 'UTF-8'); ?>users/delete/<?php echo (int) $user['id']; ?>" method="post" class="delete-form" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo (int) $user['id']; ?>">

                            <button type="submit" class="btn btn-secondary delete-btn">
                                Supprimer
                            </button>
                        </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>