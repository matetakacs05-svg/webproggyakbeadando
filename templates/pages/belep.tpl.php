<?php if(isset($row)) { ?>
    <?php if($row) { ?>
        <div class="contentk">
            <h1>Bejelentkezett:</h1>
            Azonosító: <strong><?= $row['id'] ?></strong><br><br>
            Név: <strong><?= $row['csaladi_nev']." ".$row['uto_nev'] ?></strong>
        </div>
    <?php } else { ?>
        <div class="contentk">
            <h1>A bejelentkezés nem sikerült!</h1>
            <a href="belepes" >Próbálja újra!</a>
        </div>
    <?php } ?>
<?php } ?>
<?php if(isset($errormessage)) { ?>
    <h2><?= $errormessage ?></h2>
<?php } ?>
