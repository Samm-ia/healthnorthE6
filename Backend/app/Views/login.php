<?php require_once __DIR__ . '/header.php'; ?>

<main class="form-signin m-auto" style="max-width:400px;">
    <form action="?controller=login&action=login" method="POST">

        <h1 class="h3 mb-3 fw-normal">Veuillez vous connecter</h1>

        <div class="form-floating">
            <input name="email" type="email" class="form-control" id="floatingInput" placeholder="nom@exemple.com">
            <label for="floatingInput">Adresse email</label>
        </div>

        <div class="form-floating">
            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Mot de passe">
            <label for="floatingPassword">Mot de passe</label>
        </div>

        <div class="form-check text-start my-3">
            <input class="form-check-input" type="checkbox" value="remember-me" id="checkDefault">
            <label class="form-check-label" for="checkDefault">Souviens-toi de moi</label>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Se connecter</button>

    </form>
</main>

<?php require_once __DIR__ . '/footer.php'; ?>
