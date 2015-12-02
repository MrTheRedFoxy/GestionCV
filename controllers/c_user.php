<?php
//controller user
if(!isset($_REQUEST['action']) ){
     $_REQUEST['action'] = 'default';
}
$action = $_REQUEST['action'];
require_once('modeles/m_user.php');
switch($action){


	//bouton submit de connexion
	case 'toConnnect' :{
		//On récupère les informations du formulaire
		$identifiant = $_POST['identifiant'];
		$motDePasse = $_POST['motDePasse'];
    echo($identifiant);
    echo($motDePasse);
		//On regarde si l'user existe en base
		$user = User::toConnect($identifiant,$motDePasse);

		//S'il existe on met dans la superglobale SESSION ses informations
		if($user){
			$_SESSION['id_user'] = $user[0]['id_user'];
			$_SESSION['identifiant'] = $user[0]['identifiant']		;
		}

		// Dans tous les cas on redirige sur l'index (pour l'instant)
		header('Location: ./index.php');
		break;
	}

	case 'toDisconnect':{
		include('vues/user/v_deconnection.html');
		header('Location: ./index.php');
		break;
	}



	case 'index' :{
		$listAllUser = User::index();
		include('vues/user/v_index.html');
		break;
	}



	case 'view' :{
		$idUser = $_GET['id'];
		$user = User::view($idUser);
		include('vues/user/v_view.html');
		break;
	}



	case 'formInscription' :{
		include('vues/user/v_formInscription.html');
		break;
	}

  case 'validationInscription' :{
    echo "test";
    $identifiant = $_POST['identifiant'];
    $motDePasse = $_POST['motDePasse'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $adresse_rue = $_POST['adresse_rue'];
    $adresse_cp = $_POST['adresse_cp'];
    $adresse_ville = $_POST['adresse_ville'];
    $email = $_POST['email'];
    $date_de_naissance = $_POST['date_de_naissance'];

    User::add($identifiant, $motDePasse, $nom, $prenom, $adresse_rue, $adresse_cp, $adresse_ville, $email, $date_de_naissance);
  }


	case 'validationModification' :{
    $idUser="";
    if($_SESSION['id_user']){
      $idUser = $_SESSION['id_user'];
    }
    $identifiant = $_POST['identifiant'];
    $motDePasse = $_POST['motDePasse'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $adresse_rue = $_POST['adresse_rue'];
    $adresse_cp = $_POST['adresse_cp'];
    $adresse_ville = $_POST['adresse_ville'];
    $email = $_POST['email'];
    $date_de_naissance = $_POST['date_de_naissance'];

    User::edit($idUser, $identifiant, $motDePasse, $prenom, $nom, $adresse_rue, $adresse_cp, $adresse_ville, $email, $date_de_naissance);

    break;
	}

	case 'delete' :{
		//TODO
		break;
	}



    default:
    	header('Location: ./index.php');
    	break;
}

?>
