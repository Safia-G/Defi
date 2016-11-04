<?php


    $username = "azerty@hotmail.fr";
    $password = "azerty";

    if( isset($_POST['username']) && isset($_POST['password']) ){

        if($_POST['username'] == $username && $_POST['password'] == $password){
            session_start();
            $_SESSION['user'] = $username;
            echo "Bienvenue";
        }
        else{
            echo "Il y a une erreur";
        }

    }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Défi PHP</title>



    <style media="screen">

      body{
        background-image: url(http://img0.gtsstatic.com/wallpapers/02742a894dc217a16c15b0b076de315d_large.jpeg);
        background-size: cover;
        text-align: center;
        color: white;
      }

      .forme {
        color: white;
        margin-top: 10px;
        margin-left: -150px;
        padding: 15px;
      }

      .luffy {
        overflow:hidden;
        border-radius:100px;
        width:170px;
        height:170px;
        margin-left: 490px;
        margin-top: 50px;
      }

      .txt {
        margin-left: -150px;
        font-style: oblique;
      }

      input {
        padding: 5px;
        border: 3px #87CEEB solid;
        padding-left: 20px;
      }

    </style>

  </head>
  <body>


  <h1>Formulaire d'identification en PHP/Ajax</h1>


<div class="luffy">
  <img src="http://vignette4.wikia.nocookie.net/onepiece/images/e/e6/Luffy_Wax.png/revision/20130714224604" alt="" />
</div>


<div class="txt">
  Bonjour, pour accéder à votre compte veuillez vous identifier.
</div>

    <div class="forme">


        <input id="username" type="text" name="username" placeholder="Entrez votre adresse Mail"> <?php echo $savedLogin; ?>

        <p>
          <input id="password" type="password" name="mdp" placeholder="Entrez votre mot de passe">
        </p>


        <button id="submit" type="submit">Me connecter</button>

    </div>

<script type="text/javascript">

  var requete;

    function traiteLogin(){
      console.log("resultat", this.responseText);
      var data = JSON.parse(this.responseText);
      console.log('nombre contacts', data.length);

      console.log('contacts[0]', data.title);
    }

    function traiteResultat(){
      console.log("resultat",this.responseText);
    }

    function afficheProgression(event){
      console.log('afficheProgression',event);
    }

    function loadIdentifiant(){
      requete = new XMLHttpRequest();
      requete.onprogress = afficheProgression;
      requete.onload = traiteResultat;
      requete.onerror = function() {
        console.log("Erreur :" );
      };
      requete.open('get', 'test.php', true);
      requete.send();
    }

    function loadUsers(){
      requete = new XMLHttpRequest();
      requete.onload = traiteResultat;
      requete.onerror = function() {
        console.log("Erreur :", event);
      };
      requete.open('get', 'test.php', true);
      requete.send();
    }

</script>

<p><button onclick="loadIdentifiant()">Bonjour</button></p>
	<p><button onclick="loadUsers()">Charger</button></p>

  </body>

</html>
