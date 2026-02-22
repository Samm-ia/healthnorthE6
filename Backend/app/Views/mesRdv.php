<h1>Bienvenue sur votre Dashboard</h1>

<p>Bonjour <?= htmlspecialchars($_SESSION['user']['prenom']) ?>, vous êtes bien connecté !</p>

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
                    <th>Médecin</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rdvs as $rdv): ?>
                    <tr>
                        <td><?= htmlspecialchars($rdv['date_rdv']) ?></td>
                        <td><?= htmlspecialchars($rdv['heure']) ?></td>
                        <td><?= htmlspecialchars($rdv['medecin_nom']) ?></td>
                        <td><?= htmlspecialchars($rdv['statut']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
