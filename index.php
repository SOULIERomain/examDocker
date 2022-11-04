<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Liste de Courses</title>
</head>

<body>

    <h1>Ma Liste de Courses</h1>
    <br><br>

    <form action="index.php" method="post">
        <input type="input" name="name" placeholder="Lait...">
        <input type="submit" value="Ajouter">
    </form>
</body>

</html>

<?php

if($_POST)
{
    echo $_POST['name'];
    echo "<br>";

    $mysqlConnection = new mysqli(
        'mysql-exam',
        'root',
        'root',
        'examListeCourses'
    );
    
    if($_POST['name'])
    {
        try
        {
            $sqlQuery1 = 'CREATE TABLE if not exists ListeCourses (`name` VARCHAR(150));';
            $mysqlConnection->query($sqlQuery1);

            $sqlQuery2 = 'INSERT INTO ListeCourses (`name`) VALUES ("'.$_POST['name'].'");';
            $mysqlConnection->query($sqlQuery2);

            $mysqlConnection->close();
    
            echo "Ajout à la liste réussi !";
        }
        catch (Exception $e)
        {
            echo "Erreur -> " + $e;
        }
    }
}

?>