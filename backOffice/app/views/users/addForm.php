<?php

?>

<div class="col-md-6">
    <div class="page-header">
        <h1>Ajout d'un utilisateur</h1>
        <h4><a href="<?php echo htmlspecialchars(BACKOFFICE_BASE_URL ?? '', ENT_QUOTES, 'UTF-8'); ?>users">Retour aux utilisateurs</a></h4>
    </div>
    <h4>Nouvel Utilisateur : </h4>
    <form action="<?php echo htmlspecialchars(BACKOFFICE_BASE_URL ?? '', ENT_QUOTES, 'UTF-8'); ?>users/add/insert" method="post">
        <div>
            <label for="login">login : </label>
            <input type="text" id="login" name="login" placeholder="" value="" required />
        </div>
        <div>
            <label for="pwd">mot de passe : </label>
            <input type="password" id="pwd" name="pwd" autocomplete="new-password" required />
        </div>
        <div>
            <label for="firstname">Prénom : </label>
            <input type="text" id="name" name="firstname" placeholder="prénom"  required />
        </div>
        <div>
            <label for="lastname">Nom : </label>
            <input type="text" id="name" name="lastname" placeholder="nom" value="" />
        </div>
        <div>
            <label for="status">status : </label>
            <input id="status" name="status" placeholder="0 ou 1"></input>
        </div>
        <div>
            <input type="submit" class="btn btn-lg btn-primary" value="Ajouter" />
        </div>
    </form>
</div>