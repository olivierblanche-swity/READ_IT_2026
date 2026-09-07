<?php

/** 
 * @var array $tags
 *
 * var disp $tags array ( id, name )
 */
?>

<div class="tag-widget post-tag-container mb-5 mt-5">
    <div class="tagcloud">
        <?php foreach ($tags as $tag): ?>
            <a href="tags/<?php echo $tag['tagsId']; ?>/<?php echo Core\Helpers\slugify($tag['tagsName']); ?>.html" class="tag-cloud-link"><?php echo htmlspecialchars($tag['tagsName']); ?></a>
        <?php endforeach; ?>
    </div>
</div>