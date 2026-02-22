<h1>Espace Médecin</h1>

<p>Bonjour Dr <?= htmlspecialchars($_SESSION['user']['nom']) ?>, voici vos rendez-vous.</p>

<div class="container mt-5">
    <h2 class="mb-4">Mes rendez-vous</h2>

    <?php if (empty($rdvs)): ?>
        <p>Aucun rendez-vous trouvé.</p>
    <?php else: ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Patient</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rdvs as $rdv): ?>
                    <tr>
                        <td><?= htmlspecialchars($rdv['date_rdv']) ?></td>
                        <td><?= htmlspecialchars($rdv['heure']) ?></td>
                        <td><?= htmlspecialchars($rdv['patient_nom'] . ' ' . $rdv['patient_prenom']) ?></td>
                        <td><?= htmlspecialchars($rdv['statut']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
