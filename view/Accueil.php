<?php $title = "Accueil"; ?>

<?php ob_start(); ?>

<p> accueil </p>

<?php $content = ob_get_clean(); ?>

<?php require __DIR__ . '/Template.php'; ?>