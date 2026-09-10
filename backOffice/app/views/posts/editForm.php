<?php

/**
 * @var array $authors
 * @var array $categories 
 * @var array $tags
 * @var array $post
 */
$selectedTags = $post['tags'];
?>
<div class="col-md-12">
    <div class="page-header"><h1>MODIFIER UN POST</h1></div>
    <p><a href="<?php echo BACKOFFICE_BASE_URL; ?>posts">Retour à la liste des posts</a></p>
    <form action="<?php echo BACKOFFICE_BASE_URL; ?>posts/update/<?php echo (int) $post['id']; ?>" method="post">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Titre</th>
                    <th scope="col">Résumé</th>
                    <th scope="col">Contenu</th>
                    <th scope="col">Image</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Catégorie</th>
                    <th scope="col">Tags</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><input class="form-control" aria-label="Titre" type="text" name="title" maxlength="255" required value="<?php echo htmlspecialchars($post['title'] ?? ''); ?>"></td>
                    <td><textarea class="form-control" aria-label="Résumé" name="resume" rows="5" maxlength="255"><?php echo htmlspecialchars($post['resume'] ?? ''); ?></textarea></td>
                    <td><textarea class="form-control" aria-label="Contenu" name="content" rows="8" maxlength="21845"><?php echo htmlspecialchars($post['content'] ?? ''); ?></textarea></td>
                    <td><input class="form-control" aria-label="Image" type="text" name="image" maxlength="45" placeholder="image_1.jpg" value="<?php echo htmlspecialchars($post['image'] ?? ''); ?>"><small>Nom d’une image déjà présente sur le site.</small></td>
                    <td><select class="form-control" aria-label="Auteur" name="author_id" required>
                        <option value="">Choisir un auteur</option>
                        <?php foreach ($authors as $author): ?>
                            <option value="<?php echo (int) $author['id']; ?>" <?php if (($post['author_id'] ?? '') == $author['id']) echo 'selected'; ?>><?php echo htmlspecialchars(trim($author['firstname'] . ' ' . $author['lastname'])); ?></option>
                        <?php endforeach; ?>
                    </select></td>
                    <td><select class="form-control" aria-label="Catégorie" name="category_id" required>
                        <option value="">Choisir une catégorie</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo (int) $category['id']; ?>" <?php if (($post['category_id'] ?? '') == $category['id']) echo 'selected'; ?>><?php echo htmlspecialchars($category['name']); ?></option>
                        <?php endforeach; ?>
                    </select></td>
                    <td>
                        <?php foreach ($tags as $tag): ?>
                            <div class="checkbox"><label><input type="checkbox" name="tags[]" value="<?php echo (int) $tag['id']; ?>" <?php if (in_array($tag['id'], $selectedTags)) echo 'checked'; ?>> <?php echo htmlspecialchars($tag['name']); ?></label></div>
                        <?php endforeach; ?>
                        <?php if (!$tags): ?><small>Aucun tag disponible.</small><?php endif; ?>
                    </td>
                    <td><button type="submit" class="btn btn-primary">Modifier</button></td>
                </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>
