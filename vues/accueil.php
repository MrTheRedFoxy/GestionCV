<?php

if(isset($_SESSION['id_user'])){$isConnecte=true;}else{$isConnecte=false;}

if(!$isConnecte){?>
<div class="panel panel-primary content">
  <div class="panel-body">
    <div class="row">
      <center>
        <h1>Gestion de CV</h1>
        <p>Bienvenue sur le site de gestion des cv</p>
      </center>
    </div>
    <div class="row">
      <div class="large-6 columns">
        <p id="test"><span class="span6">Pour consulter les users inscrits : </span>
        	<a href="index.php?uc=user&action=index"
    	    	class="button-secondary pure-button">Utilisateurs inscrits
        	</a>
    	  </p>
      </div>
      <div class="large-6 columns">
        <p id="test"><span class="span6"> Pas encore inscrit ? </span>
        <a href="index.php?uc=user&action=formInscription"
          class="button-secondary pure-button"> Inscription
        </a>
      </p>
    </div>
  </div>
        </div>
</div>

<?php } else { ?>

  <div class="panel panel-primary content">
    <div class="panel-body">
      <div class="row">
        <center>
          <h1>Gestion de CV</h1>
          <p>Bienvenue sur le site de gestion des cv</p>
        </center>
      </div>
      <div class="row">
        <div class="large-6 columns">
          <p id="test"><span class="span6">Pour consulter les users inscrits : </span>
          	<a href="index.php?uc=user&action=index"
      	    	class="button-secondary pure-button">Utilisateurs inscrits
          	</a>
      	  </p>
        </div>

<?php } ?>
