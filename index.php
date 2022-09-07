<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>POO Banque</title>
</head>
<body>
    <h1>POO Banque</h1>

    <?php
        spl_autoload_register(function ($class_name) {
            include $class_name . '.php';
        });

        $titulaire1 = new Titulaire("MURMANN", "Mickaël", "Homme", "1985-01-17");
        $compte1 = new Compte("Livret A", 1000, "€", $titulaire1);
        $compte2 = new Compte("Compte courant", 500, "€", $titulaire1);
        
        $titulaire2 = new Titulaire("SMAIL", "Stéphane", "Homme", "1982-04-04");
        $compte3 = new Compte("Livret A", 5000, "€", $titulaire2);
        
        echo $titulaire1->afficherComptes();
        echo $titulaire2->afficherComptes();
    ?>
</body>
</html>