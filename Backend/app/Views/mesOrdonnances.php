<h1>Mes ordonnances</h1>

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
                    <td><?= htmlspecialchars($o['date_creation']) ?></td>
                    <td>Dr <?= htmlspecialchars($o['medecin_nom'] . ' ' . $o['medecin_prenom']) ?></td>
                    <td><?= nl2br(htmlspecialchars($o['contenu'])) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
