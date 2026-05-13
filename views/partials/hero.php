<?php
/**
 * Partial : section héro / header
 * Variables disponibles : $profile
 */
?>
<header class="hero">
    <div class="avatar"><?= htmlspecialchars($profile['initials']) ?></div>
    <div class="hero-info">
        <div class="hero-tag"><?= htmlspecialchars($profile['tag']) ?></div>
        <h1 class="hero-name"><?= htmlspecialchars($profile['name']) ?></h1>
        <p class="hero-sub"><?= htmlspecialchars($profile['title']) ?></p>
        <div class="hero-badges">
            <?php foreach ($profile['badges'] as $badge): ?>
            <span class="badge"><?= htmlspecialchars($badge) ?></span>
            <?php endforeach; ?>
        </div>
    </div>
</header>
