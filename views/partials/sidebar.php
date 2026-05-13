<?php
/**
 * Partial : sidebar de navigation
 * Variables disponibles : $profile
 */
?>
<nav class="sidebar">
    <div class="sidebar-logo">
        <div class="sidebar-brand">WD<span class="brand-dot">.</span></div>
        <span class="sidebar-version">portfolio v1.0</span>
    </div>

    <ul class="nav-list">
        <?php foreach ($profile['nav'] as $i => $item): ?>
        <li>
            <a href="<?= htmlspecialchars($item['href']) ?>"
               class="nav-link <?= $i === 0 ? 'active' : '' ?>">
                <span class="nav-prefix"><?= htmlspecialchars($item['prefix']) ?></span>
                <?= htmlspecialchars($item['label']) ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>

    <div class="sidebar-footer">
        <span class="status-dot"></span>Disponible
    </div>
</nav>
