    <?php        
        require_once './mesClasses/Cvisiteurs.php';   
                
        if(isset($_POST['username']) && isset($_POST['pwd']))
        {
            $lesVisiteurs = new Cvisiteurs();
            $ovisiteur = $lesVisiteurs->verifierInfosConnexion($_POST['username'], $_POST['pwd']);
            //print_r($ovisiteur);

            if($ovisiteur)
            {
                $_SESSION['visiteur'] = serialize($ovisiteur);
                header('Location: saisirFicheFrais.php');
            }
            else
            {
               $errorMsg = "Login/Mot de passe incorrect";
            }            
        }
        
    ?>  
    





<header title="formlogin">
    <h2 title="cnx">Connexion lab GSB</h2>
    <!--<img class=img-responsive src="../img/med1.jpg">-->
</header>

<?php
            require_once 'navBar.php';
?>

<form  class="form-horizontal" role='form' method = "POST" action="<?=$formAction?>">
    
   
    <div class="<?=!empty($errorMsg)?'form-group has-error':'form-group'?>">
      <label class="control-label col-sm-5" for="username">Login:</label>
      <div class="col-sm-3">
          <input type="text" class="form-control" id="username" placeholder="Saisir un login" name="username" required="">
      </div>
    </div>
    <div class="<?=!empty($errorMsg)?'form-group has-error':'form-group'?>">
      <label class="control-label col-sm-5" for="pwd">Mot de passe:</label>
      <div class="col-sm-3">          
          <input type="password" class="form-control" id="pwd" placeholder="Saisir un mot de passe" name="pwd" required="">
      </div>
    </div>    
    <div class="form-group">        
      <div class="col-sm-offset-5 col-sm-2">
        <input type="submit" />
      </div>
    </div>
    
</form>

