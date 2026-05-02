<!DOCTYPE html>
<html>
    <head>
        <title>Regisztráció</title>
        <meta charset="utf-8">
    </head>
    <body>
        <div class="contentk">
            <?php if(isset($uzenet)) { ?>
                <h1><?= $uzenet ?></h1>
                <?php if($ujra) { ?>
                    <a href="belepes">Próbálja újra!</a>
                <?php } ?>
            <?php } ?>
        </div>
    </body>  
</html>