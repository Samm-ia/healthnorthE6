<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Health North</title>
</head>

<body>
    <header>
        <div class="px-3 py-2 text-bg-dark border-bottom">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start"> 
                    
                    <a href="?controller=home&action=index" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                        <span class="fs-4 font-monospace text-primary fw-bold">Health North</span>
                    </a>

                    <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                        
                        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'medecin'): ?>
                            <li> 
                                <a href="?controller=medecin&action=index" class="nav-link text-white text-center">
                                   
                                   Rendez-vous
                                </a> 
                            </li>
                            <li> 
                                <a href="?controller=medecin&action=historiqueOrdonnances" class="nav-link text-white text-center">
                                  
                                    Ordonnances
                                </a> 
                            </li>
                            <li> 
                                <a href="?controller=medecin&action=RecherchePatient" class="nav-link text-white text-center">
                                   
                                    Dossiers Patients
                                </a> 
                            </li>

                        <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] === 'secretaire'): ?>
                            <li> 
                                <a href="?controller=secretaire&action=index" class="nav-link text-white text-center">
                     
                                    Espace Secrétariat
                                </a> 
                            </li>

                        <?php else: ?>
                            <li> 
                                <a href="?controller=home&action=index" class="nav-link text-secondary text-center">
                                    
                                    Accueil
                                </a> 
                            </li>
                            <li> 
                                <a href="?controller=rdv&action=index" class="nav-link text-white text-center">
                                  
                                    Rendez-vous
                                </a> 
                            </li>
                            <li> 
                                <a href="?controller=rdv&action=dossier" class="nav-link text-white text-center">
                                    
                                    Mon Dossier
                                </a> 
                            </li>
                            <li> 
                                <a href="?controller=rdv&action=mesOrdonnances" class="nav-link text-white text-center">
                                    Mes Ordonnances
                                </a> 
                            </li>
                        <?php endif; ?>

                    </ul>
                </div>
            </div>
        </div>

        <div class="px-3 py-2 border-bottom mb-3">
            <div class="container d-flex flex-wrap justify-content-center">
                <form class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto" role="search"> 
                    <input type="search" class="form-control" placeholder="Recherche..." aria-label="Recherche"> 
                </form>
                
                <div class="text-end"> 
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <span class="me-3 text-muted">Compte : <strong><?= htmlspecialchars($_SESSION['user']['nom'] ?? '') ?></strong></span>
                        <a href="?controller=login&action=logout" class="btn btn-outline-danger">Déconnexion</a>
                    <?php else: ?>
                        <a href="?controller=login&action=index" class="btn btn-outline-primary me-2">Se connecter</a>
                        <a href="?controller=signin&action=index" class="btn btn-primary">S'inscrire</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <main></main>