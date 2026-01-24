<?php
require_once 'templates/header.php';
?>

<main class="form-signin m-auto" style="max-width:400px;">
    <form method="post"> 
        <h1 class="h3 mb-3 fw-normal">
            <font dir="auto" style="vertical-align: inherit;">
                <font dir="auto" style="vertical-align: inherit;">Inscription</font>
            </font>
        </h1>
        <div class="form-floating"> <input name="username" type="username" class="form-control" id="floatingInput" placeholder="nom@exemple.com"> <label for="floatingInput">
                <font dir="auto" style="vertical-align: inherit;">
                    <font dir="auto" style="vertical-align: inherit;">Nom d'utilisateur</font>
                </font>
            </label> </div>
        <div class="form-floating"> <input name="email" type="email" class="form-control" id="floatingInput" placeholder="nom@exemple.com"> <label for="floatingInput">
                <font dir="auto" style="vertical-align: inherit;">
                    <font dir="auto" style="vertical-align: inherit;">Adresse email</font>
                </font>
            </label> </div>
        <div class="form-floating"> <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Mot de passe"> <label for="floatingPassword">
                <font dir="auto" style="vertical-align: inherit;">
                    <font dir="auto" style="vertical-align: inherit;">Mot de passe</font>
                </font>
            </label> </div>
        <div class="form-check text-start my-3"> <input class="form-check-input" type="checkbox" value="remember-me" id="checkDefault"> <label class="form-check-label" for="checkDefault">
                <font dir="auto" style="vertical-align: inherit;">
                    <font dir="auto" style="vertical-align: inherit;">
                        Souviens-toi de moi
                    </font>
                </font>
            </label> </div> <button class="btn btn-primary w-100 py-2" type="submit">
            <font dir="auto" style="vertical-align: inherit;">
                <font dir="auto" style="vertical-align: inherit;">Se connecter</font>
            </font>
        </button>
        <p class="mt-5 mb-3 text-body-secondary">
            <font dir="auto" style="vertical-align: inherit;">
            </font>
        </p>
    </form>
</main>






<?php
require_once 'templates/footer.php';
?>