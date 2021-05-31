<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activiteiten per deelnemer</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    require_once 'database.php'; 
    $db = new database();

    $sql = 'SELECT 
            jongerecode, 
            CONCAT(roepnaam, " ", tussenvoegsel, " ", achternaam) as naam 
        FROM jongere';

    $jongeren = $db->select($sql);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $sql = '
            SELECT 
                ja.jongereactiviteitcode,
                CONCAT(j.roepnaam, " ", j.tussenvoegsel, " ", j.achternaam) as jongere,
                a.activiteit,
                ja.startdatum,
                ja.afgerond
            FROM jongereactiviteit as ja
            INNER JOIN jongere as j
                ON ja.jongerecode = j.jongerecode
            INNER JOIN activiteit as a
                on a.activiteitcode = ja.activiteitcode
            WHERE ja.jongerecode=:id';
        
        $placeholders = ['id'=>$_POST['jongeren']];

        $deelnemersactiviteiten = $db->select($sql, $placeholders);
    }


    
    ?>
    
    <form action="activiteiten-per-deelnemer.php" method="post">
        <label for="jongere">Deelnemer</label><br>
        <?php if(is_array($jongeren) && !empty($jongeren)){?> 
            <select name="jongeren" id="jongeren">
                <?php foreach($jongeren as $jongere){?>
                    <option value="<?php echo $jongere['jongerecode'];?>">
                        <?php echo $jongere['naam'];?>
                    </option>
                <?php } ?>
            </select><br>
        <?php } ?>
        <input type="submit" value="Bekijk activiteiten">
    </form><br>
    
</body>
</html>