<?php
/**
 * Partial : tableau de compétences E4
 * Variables disponibles : $competences, $groupedProjects
 */
?>
<section id="skills" class="section">
    <div class="section-header">
        <span class="section-prefix">03</span>
        <h2>Tableau de compétences E4</h2>
    </div>
    <p class="skills-intro">
        Cliquez sur une cellule <span class="cell-example">●</span> pour consulter le projet associé.
    </p>

    <div class="table-wrapper">
        <table class="skills-table">
            <thead>
                <tr>
                    <th class="col-project">Réalisation</th>
                    <?php foreach ($competences as $key => $label): ?>
                    <th class="col-skill" title="<?= htmlspecialchars($label) ?>">
                        <span class="skill-short"><?= strtoupper($key) ?></span>
                        <span class="skill-full"><?= htmlspecialchars($label) ?></span>
                    </th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($groupedProjects as $catKey => $category): ?>

                <!-- Séparateur de catégorie -->
                <tr class="row-category">
                    <td colspan="<?= 1 + count($competences) ?>">
                        <?= htmlspecialchars($category['label']) ?>
                    </td>
                </tr>

                <?php foreach ($category['projects'] as $projectId => $project): ?>
                <tr>
                    <td class="project-name"><?= htmlspecialchars($project['title']) ?></td>
                    <?php foreach ($competences as $compKey => $compLabel): ?>
                    <td <?php if (isset($project['skills'][$compKey])): ?>
                            class="cell-active"
                            data-project="<?= htmlspecialchars($projectId) ?>"
                            data-skill="<?= htmlspecialchars($compKey) ?>"
                            title="Voir le projet"
                        <?php endif; ?>>
                        <?= isset($project['skills'][$compKey]) ? '●' : '' ?>
                    </td>
                    <?php endforeach; ?>
                </tr>
                <?php endforeach; ?>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Légende -->
    <div class="legend">
        <div class="legend-item">
            <span class="legend-dot"></span> Compétence mobilisée
        </div>
        <div class="legend-cols">
            <?php foreach ($competences as $key => $label): ?>
            <span><strong><?= strtoupper($key) ?></strong> <?= htmlspecialchars($label) ?></span>
            <?php endforeach; ?>
        </div>
    </div>
</section>
