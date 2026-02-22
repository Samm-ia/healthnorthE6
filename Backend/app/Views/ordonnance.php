<h2>Créer une ordonnance</h2>

<form action="?controller=rdv&action=createOrdonnance" method="POST">

    <input type="hidden" name="id_patient" value="<?= $patient['id'] ?>">

    <label>Contenu de l’ordonnance</label>
    <textarea name="contenu" class="form-control" rows="6" required></textarea>

    <button class="btn btn-primary mt-3">Enregistrer</button>
</form>
