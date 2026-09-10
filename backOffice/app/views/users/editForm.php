<?php
/**@var array $user */
?>

<div class="col-md-6">
    <div class="page-header">
        <h1>Ajout d'un utilisateur</h1>
        <h4><a href="<?php echo htmlspecialchars(BACKOFFICE_BASE_URL ?? '', ENT_QUOTES, 'UTF-8'); ?>users">Retour aux utilisateurs</a></h4>
    </div>
    <h4>Nouvel Utilisateur : </h4>
    <form action="<?php echo htmlspecialchars(BACKOFFICE_BASE_URL ?? '', ENT_QUOTES, 'UTF-8'); ?>users/update/<?php echo (int) $user['id']; ?>" method="post">
        <div>
            <label for="login">login : </label>
            <input type="text" id="login" name="login" placeholder="" value="<?php echo htmlspecialchars($user['login'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"  />
        </div>
        <label for="pwd">Nouveau mot de passe :</label>
            <input type="password" id="pwd" name="pwd"
                    autocomplete="new-password"
                    placeholder="Laisser vide pour conserver le mot de passe actuel">
        <div>
            <label for="firstname">Prénom : </label>
            <input type="text" id="name" name="firstname" value="<?php echo htmlspecialchars($user['firstname'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"   />
        </div>
        <div>
            <label for="lastname">Nom : </label>
            <input type="text" id="name" name="lastname" value="<?php echo htmlspecialchars($user['lastname'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" value="" />
        </div>
        <div>
            <label for="status">status : </label>
            <input id="status" name="status" value="<?php echo htmlspecialchars($user['status'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"></input>
        </div>
        <div>
            <input type="submit" class="btn btn-lg btn-primary" value="Ajouter" />
        </div>
    </form>
</div>