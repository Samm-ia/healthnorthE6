<?php require_once __DIR__ . '/header.php'; ?>

<div class="container mt-4">

    <div class="p-4 mb-4 rounded-3" style="background-color: #198754; color: white;">
        <h1 class="fw-bold">Espace Secrétaire</h1>
        <p class="mb-0" style="opacity: 0.8;">Gestion des rendez-vous</p>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h2 class="mb-0 fs-5 fw-semibold">Tous les rendez-vous</h2>
        </div>
        <div class="card-body">
            <?php if (empty($rdvs)): ?>
                <p class="text-muted text-center py-3">Aucun rendez-vous trouvé.</p>
            <?php else: ?>
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Date</th>
                            <th>Heure</th>
                            <th>Patient</th>
                            <th>Médecin</th>
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rdvs as $rdv): ?>
                            <tr>
                                <td><?= htmlspecialchars($rdv['date_rdv']) ?></td>
                                <td><?= htmlspecialchars($rdv['heure']) ?></td>
                                <td><?= htmlspecialchars($rdv['patient_nom'] . ' ' . $rdv['patient_prenom']) ?></td>
                                <td>Dr <?= htmlspecialchars($rdv['medecin_nom'] . ' ' . $rdv['medecin_prenom']) ?></td>
                                <td>
                                    <?php $badge = match($rdv['statut']) {
                                        'Confirmé' => 'success',
                                        'Annulé'   => 'danger',
                                        default    => 'warning'
                                    }; ?>
                                    <span class="badge bg-<?= $badge ?>"><?= htmlspecialchars($rdv['statut']) ?></span>
                                </td>
                                <td>
                                    <form action="?controller=secretaire&action=updateStatut" method="POST" class="d-flex gap-2">
                                        <input type="hidden" name="id_rdv" value="<?= $rdv['id_rdv'] ?>">
                                        <button type="submit" name="statut" value="Confirmé" class="btn btn-success btn-sm">Confirmer</button>
                                        <button type="submit" name="statut" value="Annulé" class="btn btn-danger btn-sm">Annuler</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>