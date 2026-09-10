<?php include_once '../app/models/tagsModel.php';
global $conn;
$tags = \App\Models\TagsModel\findAll($conn);

foreach ($tags as $tag) : ?>

    <a href="tags/<?php echo (int) $tag['id']; ?>/<?php echo htmlspecialchars(Core\Helpers\slugify($tag['name']) ?? '', ENT_QUOTES, 'UTF-8'); ?>.html" class="tag-cloud-link"><?php echo htmlspecialchars($tag['name']); ?></a>
<?php endforeach; ?>