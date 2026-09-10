<?php

/**
 * @var array $comments
 * @var array $post
 */

?>
<div class="col-md-12">
    <div class="page-header">
        <h1>Commentaires du post : <?php echo htmlspecialchars($post['title']); ?></h1>
    </div>
    <p><a class="btn btn-primary" href="<?php echo htmlspecialchars(BACKOFFICE_BASE_URL ?? '', ENT_QUOTES, 'UTF-8'); ?>posts">Retour à la liste des posts</a></p>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Pseudo</th>
                    <th scope="col">Commentaire</th>
                    <th scope="col">Date de création</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!$comments): ?>
                    <tr><td colspan="5">Aucun commentaire pour ce post.</td></tr>
                <?php else: ?>
                    <?php foreach ($comments as $comment): ?>
                        <tr>
                            <td><?php echo (int) $comment['commentsId']; ?></td>
                            <td><?php echo htmlspecialchars($comment['pseudo']); ?></td>
                            <td style="white-space:pre-wrap;overflow-wrap:anywhere;"><?php echo htmlspecialchars($comment['commentContent'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($comment['commentCreatedAt']); ?></td>
                            <td>
                                <form action="<?php echo htmlspecialchars(BACKOFFICE_BASE_URL ?? '', ENT_QUOTES, 'UTF-8'); ?>posts/<?php echo (int) $post['id']; ?>/comments/delete/<?php echo (int) $comment['commentsId']; ?>" method="post" onsubmit="return confirm('Supprimer ce commentaire ?');">
                                    <button type="submit" class="btn btn-secondary">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
