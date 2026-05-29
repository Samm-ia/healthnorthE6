<?php require_once __DIR__ . '/header.php'; ?>

<main class="form-signin m-auto" style="max-width:400px;">
    <form action="?controller=signin&action=register" method="POST">

        <h1 class="h3 mb-3 fw-normal">Inscription</h1>

        <div class="form-floating">
            <input name="nom" type="text" class="form-control" placeholder="Nom" required>
            <label>Nom</label>
        </div>

        <div class="form-floating">
            <input name="prenom" type="text" class="form-control" placeholder="Prenom" required>
            <label>Prenom</label>
        </div>

        <div class="form-floating">
            <input name="email" type="email" class="form-control" placeholder="nom@exemple.com" required>
            <label>Adresse email</label>
        </div>

        <div class="form-floating">
            <input name="password" type="password" class="form-control" placeholder="Mot de passe" required>
            <label>Mot de passe</label>
        </div>

        <div class="mb-3">
            <select name="role" class="form-select" required>
                <option value="">-- Choisir un rôle --</option>
                <option value="patient">Patient</option>
                <option value="medecin">Médecin</option>
                <option value="secretaire">Secrétaire</option>
            </select>
        </div>

        <div class="mb-3" id="champ-specialite" style="display:none;">
            <input name="specialite" type="text" class="form-control" placeholder="Spécialité">
        </div>

        <div class="mb-3" id="champ-secu" style="display:none;">
            <input name="num_secu" type="text" class="form-control" placeholder="Numéro de sécurité sociale">
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Je m'inscris</button>

    </form>
</main>


<script>
document.querySelector('select[name="role"]').addEventListener('change', function() {
    document.getElementById('champ-specialite').style.display = this.value === 'medecin' ? 'block' : 'none';
    document.getElementById('champ-secu').style.display = this.value === 'patient' ? 'block' : 'none';
});
</script>

<?php require_once __DIR__ . '/footer.php'; ?>