<?php


?>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <h1>DASHBOARD</h1>
    <h2>Bonjour <?php echo htmlspecialchars($_SESSION['user']['firstname'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h2>
    <p>
        This is a template showcasing the optional theme stylesheet included
        in Bootstrap. Use it as a starting point to create something more
        unique by building on or modifying it.
    </p>
</div>