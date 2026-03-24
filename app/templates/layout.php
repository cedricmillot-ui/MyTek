<?php require_once __DIR__ . '/header.php'; ?>

<main>
    <?php
    if (isset($GLOBALS['__VIEW_PATH__']) && file_exists($GLOBALS['__VIEW_PATH__'])) {
        require $GLOBALS['__VIEW_PATH__'];
    } else {
        echo '<p>❌ Vue introuvable.</p>';
    }
    ?>
</main>

<?php require_once __DIR__ . '/footer.php'; ?>