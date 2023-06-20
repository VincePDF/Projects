<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kunden hinzufügen</title>
    
    <div class="headmenu">
        <?php
            include("../index.php")
        ?>
    </div>

    <link rel="stylesheet" href="../index.css">
    
</head>

<body class="content">

    <div class="main-content">

    <?php

        ini_set('display_errors',1);

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "customeroverview";

            //Create connection
        $connection = new mysqli($servername, $username, $password, $database, 3306);

        $firma = "";
        $url = "";
        $ansprechpartner = "";
        $addresse = "";
        $areacode = "";
        $city = "";
        $country = "";
        $phone1 = "";
        $phone2 = "";
        $email1 = "";
        $email2 = "";

        $errorMessage = "";
        $successMessage = "";

        if ( $_SERVER['REQUEST_METHOD'] == 'POST'){
                
            $firma = $_POST["firma"];
            $url = $_POST["url"];
            $ansprechpartner = $_POST["ansprechpartner"];
            $addresse = $_POST["addresse"];
            $areacode =$_POST["areacode"];
            $city = $_POST["city"];
            $country = $_POST["country"];
            $phone1 = $_POST["phone1"];
            $phone2 = $_POST["phone2"];
            $email1 = $_POST["email1"];
            $email2 = $_POST["email2"];

            do {
                if ( empty($firma)  || empty($url) || empty($ansprechpartner) || empty($addresse) || empty($phone1) || empty($email1) ){
                    $errorMessage = "Bitte füllen Sie alle Felder aus!"; //Change Message?
                    break;
                }

            // add new client to database
                $sql = "INSERT INTO customers (firma, url, ansprechpartner, addresse, areacode, city, country, phone1, phone2, email1, email2)" . 
                        "VALUES ('$firma', '$url', '$ansprechpartner', '$addresse', '$areacode', '$city', '$country', '$phone1', '$phone2', '$email1', '$email2')";
                    
                $result = $connection->query($sql);

                if (!$result) {
                    $errorMessage = "Invalid query: " . $connection->error;
                    break;
                }

                $firma = "";
                $url = "";
                $ansprechpartner = "";
                $addresse = "";
                $areacode = "";
                $city = "";
                $country = "";
                $phone1 = "";
                $phone2 = "";
                $email1 = "";
                $email2 = "";

                sleep(2);
                header("location: customerdatabase.php");
                exit;
                    
            } while (false);
        }
    ?>


    <div class="container my-5">
        <h2>Neuer Kunde</h2>

        <?php
        if ( !empty($errorMessage)) {
            echo "
            <div class ='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        } 
        
        ?>

        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Firma</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="firma" placeholder="*" value="<?php echo $firma; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Website</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="url" placeholder="*" value="">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Ansprechpartner</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="ansprechpartner" placeholder="*" value="<?php echo $ansprechpartner; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Straße und Hausnummer</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="addresse" placeholder="*" value="<?php echo $addresse; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">PLZ</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="areacode" placeholder="*" value="<?php echo $areacode; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Stadt</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="city" placeholder="*" value="<?php echo $city; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Land</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="country" placeholder="*" value="<?php echo $country; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Telefon 1</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone1" placeholder="*" value="<?php echo $phone1; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Telefon 2</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone2" value="<?php echo $phone2; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">E-Mail 1</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email1" placeholder="*" value="<?php echo $email1; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">E-Mail 2</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email2" value="<?php echo $email2; ?>">
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary" id="button-add">Hinzufügen</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-danger" href="customerdatabase.php" role="button">Abbrechen</a>
                </div>
            </div>

            <div class="toast-container position-fixed top-0 start-50 translate-middle-x">
                <div id="notificationToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <img src="../img/check.svg" class="rounded me-2" alt="..." width="10%">
                        <strong class="me-auto">Kunde hinzugefügt</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body"> 
                        <div id="myProgress" class="progress" style="height: 5px;">
                            <div id="myBar" class="progress-bar" role="progressbar" aria-label="Example 1px high" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>

    </div>

    <script src="../index.js"></script>

    <footer class="bottom">
        <?php
            include("../footer.php")
        ?>
    </footer>
</body>
</html>
