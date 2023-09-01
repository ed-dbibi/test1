<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tables - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">GESTION-P</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="login.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                PARAMETRAGE
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="ferme.php">ferme</a>
                                    <a class="nav-link" href="bloc.php">bloc</a>
                                    <!--<a class="nav-link" href="layout-sidenav-light.html"></a>-->
                                    <a class="nav-link" href="serre.php">serre</a>
                                    <a class="nav-link" href="utilisateur.php">utilisateur</a>
                                    <a class="nav-link" href="appareil.php">appareil</a>
                                    <a class="nav-link" href="culture.php">culture</a>
                                    <a class="nav-link" href="variete.php">variete</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="employer.php" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                EMPLOYER
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="employer.php">employer</a>
                                    <a class="nav-link" href="rendementemployer.php">rendement d'employer</a>
                                   
                                   
                                </nav>
                            </div>
                           
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                 PRODUCTION
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="recolte.php">recolte</a>
                                    <a class="nav-link" href="rendementserre.php">rendement des serre</a>
                                   
                                   
                                </nav>
                            </div>
                            
                           
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                 TRAITEMENT CHIMIQUE
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link" href="traitementchimique.php">traitement chimique</a>
                                    <a class="nav-link" href="produit.php">les produit</a>
                                    
                                   
                                   
                                </nav>
                            </div>
                            <a class="nav-link" href="conditionclimatique.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                CONDITION CLIMATIQUE
                            </a>
                   
                   
                   
                           <!-- <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>-->
                        </div>
                    </div>
                   
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                <div class="container">
        <div class="row">
            <div class="col-md-12 head">
        
                
                <div class="float-right">
                    
                    <form action="importer/imculture.php" method="POST" enctype="multipart/form-data" class="d-inline1">
                        <input type="file" name="import_file">
                        <button type="submit" name="save_excel_data" class="btn btn-primary4">Importer</button>
                    </form>
                </div>
            </div>
        </div>
      


                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Culture</h1>
                       <!-- <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html"></a></li>
                            <li class="breadcrumb-item active"></li>
                        </ol>-->
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                
                                DataTable 


                                <form action="ajouterculture.php" method="post" class="d-inline">
                                <div style="display: inline-block;"> <!-- Ajoutez un div pour gérer la mise en page -->
                                   <button type="submit" class="btn btn-primary1">Add</button>
                                </div>
                                </form>
                                <a href="exporter/exculture.php" class="btn btn-success1"><i class="dwn"></i> Export</a>
                    <form action="pdf/gculture.php" method="post" class="d-inline">
                        <button type="submit" class="btn btn-primary3">Générer PDF</button>
                    </form>


                            </div>
                           
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                        <th>nom</th>
                    <th>Description</th>
                    <th>modifier</th>
                    <th>supprimer</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php

include_once "connection.php";




$req = mysqli_query($conn , " SELECT * FROM cutlture");
if(mysqli_num_rows($req) == 0){
    echo "il n'y a pas encore des culture  ajouter !";

}else {
    while($row=mysqli_fetch_assoc($req)){
        ?>
        <tr>
            <td><?=$row['nom']?></td>
            
            <td><?=$row['Description']?></td>
            <td><a href="modifierculture.php?id_culture=<?=$row['id_culture']?>"> <img src="images/bouton-modifier.png"></a></td>
            <td><a href="supprimerculture.php?id_culture=<?=$row['id_culture']?>"> <img src="images/effacer.png"></a></td>

        </tr>
        <?php


    }
}



?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                  
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>




