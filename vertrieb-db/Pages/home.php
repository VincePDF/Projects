<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <div class="head">
        <?php
            include("../index.php")
        ?>
    </div>

    <link rel="stylesheet" href="../index.css">

</head>
<body class="content">
    
    <div class="main-content">

        <div class="card mb-3">
            <img src="../img/DGC-Logo.png" class="card-img-top" alt="..." style="width: 80%">
            <div class="card-body">
            <!-- <h5 class="card-title">Home</h5> -->
            
            </div>
        </div>

        <div class="cards">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="../img/Kundenübersicht.png" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Kundenübersicht</h5>
                            <p class="card-text">Hier geht es zur Kundenübersicht.<br> 
                                                Außerdem können neue Kunden angelegt, Bestehende überarbeit und gelöscht werden.</p>
                            <a href="customerdatabase.php" class="btn btn-primary">Zur Kundenübersicht</a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="../img/placeholder-img.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Services</h5>
                            <span class="placeholder col-6"></span>
                            <span class="placeholder w-75"></span>
                            <span class="placeholder" style="width: 25%;"></span>
                            <br><br>
                            <a href="#" class="btn btn-primary disabled">Zur Serviceübersicht</a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="../img/newCostumer.png" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Kunden anlegen</h5>
                            <p class="card-text">Hier können neue Kunden direkt angelegt werden.<br><br><br></p>
                            <a href="create.php" class="btn btn-primary">Neuen Kunden erstellen</a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="../img/placeholder-img.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="placeholder">Service verwalten</h5><br>
                            <p class="placeholder">Hier können neue Kunden direkt angelegt werden.</p><br><br><br>
                            <a href="create.php" class="btn btn-primary disabled placeholder col-4"></a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <footer class="bottom">
        <?php
            include("../footer.php")
        ?>
    </footer>

</body>   
</html>