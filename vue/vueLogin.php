
  <section id="pageContent">

    <article>
      <!-- ------------------------------------------- Formulaire Login  ---------------------------------------- -->
      <div class="form-wrapper1">
        
          <h1> Espace utilisateur : </h1>

        <form action='index.php?action=Se connecter' method='POST'>

          <div class="wrapper1">

              <img src="./img/profil.png" alt="photo login" class="log"/>
              
            <div class="Nom">
                <label for="username">Identifiant</label></td>
                <input name="login" id="user_name" type="text" required>
                
                <label for="password">Mot de passe</label></td> 
                <input name="mdp" id="password" type="password" required >
              
            </div> 

            <div class='bouton'>
                <input type='submit' name='action' value='Se connecter' >
                
            </div>
            
                <?php
              if(isset($_SESSION['erreurMessages']))
              {
                echo "<tr>";
                echo "<td colspan='2'>";
                echo $_SESSION['erreurMessages'];
                echo "</td>";
                echo "</tr>";
                
                session_destroy();

              }
              ?>
              
          </div>

        </form>
      </div>
          <hr>
      

        <div class="form-wrapper2">
          

        <form action='index.php?action=Login' method='POST'>
            <h1> Espace administration : </h1>
          <div class="wrapper1">

              <img src="./img/profil.png" alt="photo login" class="log"/>
              
            <div class="Nom">
                <label for="username">Identifiant</label></td>
                <input name="user_name" id="user_name" type="text" required>
                
                <label for="password">Mot de passe</label></td> 
                <input name="password" id="password" type="password" required >
              
            </div> 

            <div class='bouton'>
                <input type='submit' name='action' value='Login' >
                
            </div>
            
                <?php
              if(isset($_SESSION['erreurMessage']))
              {
                echo "<tr>";
                echo "<td colspan='2'>";
                echo $_SESSION['erreurMessage'];
                echo "</td>";
                echo "</tr>";
                
                session_destroy();

              }
              ?>
              
        

        </form>


              
      </div>        
    </article>

     
  </section>

