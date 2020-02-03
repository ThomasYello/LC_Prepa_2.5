      <!-- ------------------------------------------- Formulaire ajout ---------------------------------------- -->
      <article>
        <h2>Ajouter un client</h2>
        <br>
        <form action="index.php?action=Admin" method="POST">
          
            <input type="text" name="nom" id="nom"  minlength='2' maxlength='25' placeholder="Nom"><br><br>
            <input type="text" name="prenom" id="prenom"  minlength='2' maxlength='25' placeholder="Prénom"> <br><br>
            <input type="date" name="date" id="date"  minlength='2' maxlength='25' > <br><br>
            <input type="text" name="tel" id="tel" placeholder="Numéro de Téléphone"><br><br>
            <input type="text" name="mail" id="mail"  minlength='2' maxlength='50' placeholder="adresse email"> <br><br>
            <input type="password" name="mdp" id="mdp"  minlength='2' maxlength='50' placeholder="mot de passe"> <br><br>
            <input type="submit" name="action" value="Ajouter">
            <br><br>
          
        </form>
      </article>