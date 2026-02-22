<h1>Dossier Patient</h1>

<div class="container mt-4">

    <h2>Informations personnelles</h2>
    <ul class="list-group mb-4">
        <li class="list-group-item"><strong>Nom :</strong> <?= htmlspecialchars($patient['nom']) ?></li>
        <li class="list-group-item"><strong>Prénom :</strong> <?= htmlspecialchars($patient['prenom']) ?></li>
        <li class="list-group-item"><strong>Email :</strong> <?= htmlspecialchars($patient['email']) ?></li>
        <li class="list-group-item"><strong>Téléphone :</strong> <?= htmlspecialchars($patient['telephone']) ?></li>
    </ul>

    <h2>Mes rendez-vous</h2>

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
