  <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>
  <body>
    <div class="contentbelepes">
     <form action = "belep" method = "post">
      <fieldset>
        <legend>Bejlentkezés</legend>
          <div class="forms-container">
          <br>
          <input type="text" name="felhasznalo" placeholder="felhasználó" required><br><br>
          <input type="password" name="jelszo" placeholder="jelszó" required><br><br>
          <input type="submit" name="belepes" value="Belépés">
          <br>&nbsp;
        </fieldset>
      </form>
      <div class="form-divider"></div>
      <div class="reg-section">        
        <h3>Regisztrálja magát, ha még nem felhasználó!</h2>
        <form action = "regisztral" method = "post">
          <fieldset>
            <legend>Regisztráció</legend>
            <br>
            <input type="text" name="vezeteknev" placeholder="vezetéknév" required><br><br>
            <input type="text" name="utonev" placeholder="utónév" required><br><br>
            <input type="text" name="felhasznalo" placeholder="felhasználói név" required><br><br>
            <input type="password" name="jelszo" placeholder="jelszó" required><br><br>
            <input type="submit" name="regisztracio" value="Regisztráció">
            <br>&nbsp;
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</body>
</html>  
