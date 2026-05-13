<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio – <?= htmlspecialchars($profile['name']) ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>

<div class="layout">

    <?php require_once __DIR__ . '/partials/sidebar.php'; ?>

    <main class="main">

        <?php require_once __DIR__ . '/partials/hero.php'; ?>

        <!-- Section À propos -->
        <section id="about" class="section">
            <div class="section-header">
                <span class="section-prefix">01</span>
                <h2>À propos</h2>
            </div>
            <p class="about-text"><?= $profile['about'] ?></p>
        </section>

        <!-- Section CV -->
        <section id="cv" class="section">
            <div class="section-header">
                <span class="section-prefix">02</span>
                <h2>Mon CV</h2>
            </div>
            <a href="<?= htmlspecialchars($profile['cv_file']) ?>"
               target="_blank"
               class="btn-cv">
                Télécharger mon CV
            </a>
        </section>

        <!-- Section Compétences -->
        <?php require_once __DIR__ . '/partials/competences.php'; ?>

        <!-- Section Contact -->
        <section id="contact" class="section">
            <div class="section-header">
                <span class="section-prefix">04</span>
                <h2>Contact</h2>
            </div>
            <div class="contact-grid">
                <?php foreach ($profile['contact'] as $item): ?>
                <a href="<?= htmlspecialchars($item['href']) ?>"
                   class="contact-card"
                   <?= isset($item['target']) ? 'target="' . htmlspecialchars($item['target']) . '"' : '' ?>>
                    <div class="contact-icon"><?= htmlspecialchars($item['icon']) ?></div>
                    <div>
                        <div class="contact-label"><?= htmlspecialchars($item['label']) ?></div>
                        <div class="contact-value"><?= htmlspecialchars($item['value']) ?></div>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </section>

    </main>
</div>

<?php require_once __DIR__ . '/partials/modal.php'; ?>

<!-- Données projets injectées depuis PHP → JS -->
<script>
    const PROJECTS     = <?= json_encode($allProjects,     JSON_UNESCAPED_UNICODE) ?>;
    const COMPETENCES  = <?= json_encode($competences,     JSON_UNESCAPED_UNICODE) ?>;
</script>
<script src="public/js/app.js"></script>

</body>
</html>
