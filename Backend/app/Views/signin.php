
<?php require_once __DIR__ . '/header.php'; ?>

<main class="form-signin m-auto" style="max-width:400px;">
    <form action="?controller=signin&action=register" method="POST">

        <h1 class="h3 mb-3 fw-normal">Inscription</h1>

        <div class="form-floating">
            <input name="nom" type="text" class="form-control" id="floatingInput" placeholder="nom">
            <label for="floatingInput">nom</label>
        </div>

         <div class="form-floating">
            <input name="prenom" type="text" class="form-control" id="floatingInput" placeholder="prenom">
            <label for="floatingInput">prenom</label>
        </div>

        <div class="form-floating">
            <input name="email" type="email" class="form-control" id="floatingInput" placeholder="nom@exemple.com">
            <label for="floatingInput">Adresse email</label>
        </div>
 <div class="form-floating"></div>
        <select name="role">
    <option value="patient">Patient</option>
    <option value="medecin">Médecin</option>
    <option value="secretaire">secretaire</option>
</select>
</div>

        <div class="form-floating">
            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Mot de passe">
            <label for="floatingPassword">Mot de passe</label>
        </div>

        <div class="form-check text-start my-3">
            <input class="form-check-input" type="checkbox" value="remember-me" id="checkDefault">
            <label class="form-check-label" for="checkDefault">Souviens-toi de moi</label>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Je m'incris</button>

    </form>
</main>

<?php require_once __DIR__ . '/footer.php'; ?>
