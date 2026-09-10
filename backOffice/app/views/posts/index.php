<?php
/** @var array $posts */
?>
<div class="col-md-12">
    <div class="page-header">
        <h1>LISTE DES POSTS</h1>
    </div>
    <h4><a href="<?php echo htmlspecialchars(BACKOFFICE_BASE_URL ?? '', ENT_QUOTES, 'UTF-8'); ?>posts/add/form">Ajout d'un post</a></h4>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Catégorie</th>
                    <th scope="col">Tags</th>
                    <th scope="col">Date de création</th>
                    <th scope="col">Commentaires</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                
                    <?php foreach ($posts as $post): ?>
                        <tr>
                            <td><?php echo (int) $post['id']; ?></td>
                            <td><?php echo htmlspecialchars($post['title']); ?></td>
                            <td><?php echo htmlspecialchars($post['firstname'] . ' ' . $post['lastname']); ?></td>
                            <td><?php echo htmlspecialchars($post['categoryName'] ?? '—'); ?></td>
                            <td>
                                <?php if (empty($post['tags'])): ?>
                                    Aucun tag
                                <?php else: ?>
                                    <?php foreach ($post['tags'] as $tag): ?>
                                        <span class="label label-info"><?php echo htmlspecialchars($tag); ?></span>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>
                            <td><?php echo htmlspecialchars($post['created_at'] ?? '—'); ?></td>
                            <td style="padding:0;position:relative;">
                                <a href="<?php echo htmlspecialchars(BACKOFFICE_BASE_URL ?? '', ENT_QUOTES, 'UTF-8'); ?>posts/<?php echo (int) $post['id']; ?>/comments" style="display:block;padding:8px;" aria-label="Voir les commentaires du post : <?php echo htmlspecialchars($post['title']); ?>">
                                    <span aria-hidden="true" style="position:absolute;inset:0;"></span><?php echo (int) $post['commentsCount']; ?>
                                </a>
                            </td>
                            <td>
                                <form action="<?php echo htmlspecialchars(BACKOFFICE_BASE_URL ?? '', ENT_QUOTES, 'UTF-8'); ?>posts/edit/form/<?php echo (int) $post['id']; ?>" method="post" style="display:inline;">

                                    <button type="submit" class="btn btn-primary">Modifier</button>
                                </form>
                                <form action="<?php echo htmlspecialchars(BACKOFFICE_BASE_URL ?? '', ENT_QUOTES, 'UTF-8'); ?>posts/delete/<?php echo (int) $post['id']; ?>" method="post" class="delete-form" style="display:inline;">

                                    <button type="submit" class="btn btn-secondary delete-btn">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                
            </tbody>
        </table>
    </div>
</div>
