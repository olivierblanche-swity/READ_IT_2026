<h3>Categories</h3>
<?php include_once '../app/models/categoriesModel.php';
global $conn;
$categories = \App\Models\CategoriesModel\findAll($conn);

foreach ($categories as $category) : ?>
    <li><a href="categories/<?php echo (int) $category['id']; ?>/<?php echo htmlspecialchars(Core\Helpers\slugify($category['name']) ?? '', ENT_QUOTES, 'UTF-8'); ?>.html"> <?php echo htmlspecialchars($category['name']); ?> <span class="ion-ios-arrow-forward"></span></a></li>

<?php endforeach; ?>