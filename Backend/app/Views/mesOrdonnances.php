<?php require_once __DIR__ . '/header.php'; ?>

<div class="container mt-4">
    <h2 class="mb-4">Mes ordonnances</h2>

    <?php if (empty($ordonnances)): ?>
        <p>Aucune ordonnance disponible.</p>
    <?php else: ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Médecin</th>
                    <th>Contenu</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ordonnances as $o): ?>
                    <tr>
                        <td><?= htmlspecialchars($o['date_ordonnance']) ?></td>
                        <td>Dr <?= htmlspecialchars($o['medecin_nom'] . ' ' . $o['medecin_prenom']) ?></td>
                        <td><?= nl2br(htmlspecialchars($o['contenu'])) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>