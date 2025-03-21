<?php
	
	/*
		Fonction isConnecte
		Permet de vérifier qu'un utilisateur est connecté
		à partir de la SESSION
	 */
	function isConnecte() {
		// Vérifie si une session est active et si user_id est défini et non vide
		if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
			return true; // Utilisateur connecté
		} else {
			return false; // Aucune session active
		}
	}

	/*
		Fonction setDeconnecte
		Déconnecte un utilisateur en supprimant 
		les données en SESSION
	 */	
	function setDeconnecte(){
		session_unset();
		session_destroy();
		header('Location: ../index.php');
		exit;
	}
	
	/*
		Fonction addMessageAlert
		Ajoute un message en session qui sera affiché 
	*/
	function adddMessageAlert($msg = ""){
		if(!array_key_exists('msg', $_SESSION)){
			$_SESSION['msg'] = "";
		}

		$_SESSION['msg'] .= $msg." ";
	}

	/*
		Fonction lireEtSupprimeMessageSession
		Affiche un message en session et le supprime 
		après affichage
	*/
	function lireEtSupprimeMessageSession(){
		if(array_key_exists('msg', $_SESSION)){
			echo '<div class="alert alert-info text-justify"><p>'.$_SESSION['msg'].'</p></div>';
			unset($_SESSION['msg']);
		}
	}

?>