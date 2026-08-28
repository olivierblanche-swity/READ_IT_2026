<?php include_once '../app/models/tagsModel.php';
global $conn;
$tags = \App\Models\TagsModel\findAll($conn);

foreach ($tags as $tag) : ?>

    <a href="<?php echo rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\'); ?>/tags/<?php echo $tag['id']; ?>/<?php echo Core\Helpers\slugify($tag['name']); ?>.html" class="tag-cloud-link"><?php echo htmlspecialchars($tag['name']); ?></a>
<?php endforeach; ?>