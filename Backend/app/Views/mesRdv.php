<?php require_once __DIR__ . '/header.php'; ?>

<div class="container mt-5">

    <!-- Header Dashboard -->
    <div class="p-4 mb-4 bg-primary text-white rounded-3">
        <h1 class="fw-bold"> Bonjour <?= htmlspecialchars($_SESSION['user']['prenom']) ?> !</h1>
        <p class="mb-0 opacity-75">Bienvenue sur votre espace patient HealthNorth</p>
    </div>

    <!-- Mes RDV -->
    <div class="card shadow-sm">
        <div class="card-header bg-white d-flex align-items-center gap-2">
            <span class="fs-5"></span>
            <h2 class="mb-0 fs-5 fw-semibold">Mes rendez-vous</h2>
        </div>
        <div class="card-body">
            <?php if (empty($rdvs)): ?>
                <div class="text-center text-muted py-4">
                    <p class="mb-2">Aucun rendez-vous trouvé.</p>
                    <a href="?controller=rdv&action=index" class="btn btn-primary btn-sm">
                        Prendre un rendez-vous
                    </a>
                </div>
            <?php else: ?>
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
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
                                <td>Dr <?= htmlspecialchars($rdv['medecin_nom']) ?> <?= htmlspecialchars($rdv['medecin_prenom']) ?></td>
                                <td>
                                    <?php
                                    $statut = $rdv['statut'];
                                    $badge = match($statut) {
                                        'Confirmé'  => 'success',
                                        'Annulé'    => 'danger',
                                        default     => 'warning'
                                    };
                                    ?>
                                    <span class="badge bg-<?= $badge ?>">
                                        <?= htmlspecialchars($statut) ?>
                                    </span>
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
