<section class="dbtest">
    <h1>Test de connexion DB</h1>

    <?php if (!empty($error)) : ?>
        <!-- Message d'erreur en cas d'échec de connexion -->
        <p style="color: red;"><strong>Erreur :</strong> <?= htmlspecialchars($error) ?></p>
    <?php else : ?>
        <!-- Affichage simple pour confirmer la connexion -->
        <p>Connexion à la base <strong><?= htmlspecialchars($dbname ?: 'inconnue') ?></strong> réussie ✅</p>
        <p>Tables disponibles :</p>
        <pre><?= htmlspecialchars(print_r($tables, true)) ?></pre>
    <?php endif; ?>
</section>
