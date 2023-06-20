<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kundenübersicht</title>
    
    <div class="headmenu">
        <?php
            include("../index.php")
        ?>
    </div>

    <link rel="stylesheet" href="../index.css">

</head>

<body class="content">

    <div class="main-content">

    <div class="container my-5">
        <h2>Kundenübersicht</h2>
        
        <br>

        <nav class="navbar bg-light">
            <div class="container-fluid">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="text" id="search" placeholder="Suche..." aria-label="Search">
                </form>
                <a Class="btn btn-primary" href="create.php" role="button">Neuen Kunden hinzufügen</a>
            </div>
        </nav>

        <table class="table table-striped table-hover" id="table">
            <thead>
                <tr>
                    <th>Firma</th>
                    <th>Website</th>
                    <th>Ansprechpartner</th>
                    <th>Telefon 1</th>
                    <th>E-Mail 1</th>
                    
                </tr>
            </thead>
            <tbody class="table-group-divider">

                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "customeroverview";

                //Create connection
                $connection = new mysqli($servername, $username, $password, $database);

                // Check connection
                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                // Read all rows from database table
                $sql = "SELECT * FROM customers";
                $result = $connection->query($sql);
                
                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                // read data of each row and display
                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                        
                        <td>$row[firma]</td>
                        <td><a href=https://$row[url] target=_blank>$row[url]</td>
                        <td>$row[ansprechpartner]</td>
                        
                        <td>$row[phone1]</td>
                        
                        <td>$row[email1]</td>
                        
                        <td>
                            <a class='btn btn-primary btn-sm' href='customer.php?id=$row[id]'>mehr...</a>
                        </td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='edit.php?id=$row[id]'>Bearbeiten</a>
                        </td>
                        <td>
                            <button id='$row[id]' type='button' class='btn btn-danger btn-sm' onclick='GetRowId(this.id)' data-toggle='modal' data-target='#myModal'>Löschen</button>
                        </td>
                    </tr>
                    ";
                }
                
                ?>
                </tbody>
        </table>
    </div>
    
    <div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h4 class='modal-title' id='myModalLabel'>Kundendaten löschen</h4>
                    <button type='button' class='btn-close' data-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                    Sind Sie sicher, dass Sie die Kundendaten löschen möchten?
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-danger' data-dismiss='modal'>Abbrechen</button>
                    <button type='button' class='btn btn-primary' onclick= 'deleteSelectedId()' href='delete.php?id=$row[id]'>Löschen</button>
                </div>
            </div>
        </div>
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