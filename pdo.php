//server.php**************************
<pre>
    <?php

// DSN: Data Source Name
    $dsn = "mysql:host=localhost;dbname=pdo_db";
    print_r($_POST);
    $username = "root"; // nom du serveur
    $password = ""; // mot de passe

    // si le formulaire est passé par la méthode post
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $mail = $_POST["mail"];
        $a = $_POST["a"];
        $pwd = $_POST["pwd"];
    }

    // try { // vérifie si le bloc s'exécute sans erreur
    //     $con = new PDO($dsn, $username, $password);
    //     // Requête  à envoyer au serveur
    //     // $sql = "INSERT INTO users (user_first_name,	user_last_name,	user_email,	user_age) values ('$fname', '$lname', '$mail', $a)";
    //     // Exécution de la requête
    //     $con->exec($sql);
    //     header("Location: ./correction.php"); // redirige sur la page du formulaire
    // } catch (PDOException $e) { // s'exécute si le bloc précédant génère une erreur
    //     echo $e->getMessage();
    // }

    /**
     * REQUETES PREPAREE
     */

    try { // vérifie si le bloc s'exécute sans erreur
        $con = new PDO($dsn, $username, $password);
        $sql = "CREATE TABLE IF NOT EXISTS users(
            userId int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            userFistName VARCHAR(50) NOT NULL,
            userLastName VARCHAR(50) NOT NULL,
            userEmail VARCHAR(50) NOT NULL,
            user_password VARCHAR(128),
            userAge int NOT NULL
        )";
        $con->exec($sql);
        // Requête  à envoyer au serveur
        
        // $sql = "INSERT INTO users (user_first_name,	user_last_name,	user_email,	user_age) values (?, ?, ?, ?)";
        $sql = "INSERT INTO users (user_first_name,	user_last_name,	user_email,	user_age, user_password) values (:firstname, :lastname, :email, :age, :userpassword)";
        //  Création de la requête préparée (prepared statement)
        $stmt = $con->prepare($sql); // génère un template de requête
        
        
        // Exécution de la requête
        $stmt->execute([
            // NB: les deux points sont facultatifs
            ":email" => $mail, // "email" => $mail
            ":lastname" => $lname, // "lastname" => $lastname
            ":firstname" => $fname, // "firsname" => $firsname
            ":age" => $a, // "age" => $age
            // "userpassword" => $pwd
            "userpassword" => password_hash($pwd, PASSWORD_DEFAULT)
        ]);



        header("Location: ./correction.php?msg=success"); // redirige sur la page du formulaire
    } catch (PDOException $e) { // s'exécute si le bloc précédant génère une erreur
        echo $e->getMessage();
        header("Location: ./correction.php?msg=failure"); // redirige sur la page du formulaire
    }

    ?>
</pre>


index.php************************************

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .container {
            max-width: 50em;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>PHP PDO</h1>
        <form class="row g-3" method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
            <div class="row g-3">
                <div class="col">
                    <input type="text" class="form-control" placeholder="First name" aria-label="First name" name="firstname">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" name="lastname">
                </div>
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail4" name="email">
            </div>
            <div class="col-md-6">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" name="connect">Sign in</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <?php

        if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['connect'])) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $age = $_POST['age'];

            print_r($_POST);

            try {
                $conn = new PDO("mysql:host=localhost;dbname=pdo_db;", "root", "");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "Connected to pdo_db...";

                // Créer la table users si elle n'existe pas
                $conn->exec("CREATE TABLE IF NOT EXISTS users(
                    userId int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                    userFirstName VARCHAR(50) NOT NULL,
                    userLastName VARCHAR(50) NOT NULL,
                    userEmail VARCHAR(50) NOT NULL,
                    userAge int NOT NULL
                );");
                // Insérer les données de l'utilisateur s'ils n'existent pas
                $conn->exec("INSERT INTO `pdo_db`.users (userFirstName, userLastName, userEmail, userAge)
                    VALUES ('$firstname', '$lastname', '$email', $age);
                ");
                
            }
            catch (PDOException $e) {
                echo "Error !!! " . $e->getMessage();
            }
        }
    
    ?>
</body>

</html>


correction.php******************************************

<?php 
// Null Coalescing Opérator : sucre syntaxique pour écrire le code de la ligne 6
    $msg = $_GET["msg"] ?? ""; // undefined, null, ""
    echo "la valeur de msg ===> ". $msg;
    // 
    // if (isset($_GET["msg"])) {
    //     $msg = $_GET["msg"];
    // } else {
    //     $msg = "";
    // }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <style>
        .info {
            color: White;
            font-weight: bold;
            padding: 2rem;
            border: 2px solid gray;
            background-color: lightgreen;
            margin-bottom: 2rem;
        }

        .failure {
            background-color: red;
        }
    </style>
</head>
<body>
<!-- Si succès -->
    <?php if ($msg === "success"): ?>
        <div class="info success">Vous avez bien été enrégistré</div>
    <?php endif; ?>
    <!-- Si echec -->
    <?php if ($msg === "failure"): ?>
        <div class="info failure">désolé veuillez reessayer svp.</div>
    <?php endif; ?>
    <form action="./server.php" method="post">

    <label for="lname">LastName</label>
    <input type="text" name="lname" id="lname">
    
    <label for="fname">FirstName</label>
    <input type="text" name="fname" id="fname">
    
    <label for="mail">Email</label>
    <input type="email" name="mail" id="mail">
    
    
    <label for="pwd">Mot de passe</label>
    <input type="password" name="pwd" id="pwd">
    
    <label for="a">Age</label>
    <input type="number" name="a" id="a">
    <button type="submit">Valider</button>
    </form>

</body>
</html>
