<?php require_once __DIR__ . '/header.php'; ?>

<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>Prendre un rendez-vous</h2>
      <p class="lead">Veuillez remplir les informations ci-dessous pour enregistrer un rendez-vous médical.</p>
    </div>

    <div class="row g-5">
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Informations du rendez-vous</h4>

        <form action="?controller=rdv&action=create" method="POST" class="needs-validation">

          <div class="row g-3">

            
            <div class="col-sm-6">
              <label class="form-label">Date du rendez-vous</label>
              <input type="date" name="date_rdv" class="form-control" required>
            </div>

            
            <div class="col-sm-6">
              <label class="form-label">Heure</label>
              <input type="time" name="heure" class="form-control" required>
            </div>

          
            <div class="col-12">
              <label class="form-label">Médecin</label>
              <select name="id_medecin" class="form-select" required>
                <?php foreach ($medecins as $m): ?>
               <option value="<?= $m['id_medecin'] ?>">
              Dr <?= $m['nom'] . ' ' . $m['prenom'] ?>
              </option>
                <?php endforeach; ?>
              </select>
            </div>

          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">
            Valider le rendez-vous
          </button>

        </form>
      </div>
    </div>
  </main>
</div>




<?php require_once __DIR__ . '/footer.php'; ?>
