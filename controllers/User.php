<?php

error_reporting(E_ALL); ini_set('display_errors',1);

require_once('./models/UserModel.php');
require_once('./views/user_update.php');



// A controller class. Handles the linkage between the specific
// URL passed by the user and DB fetch/put methods in the model class.

class User {

private $model;

public function __construct() {
	$this->model = new UserModel();
}

// This file combines specific URL 'routes' with model methods
// we dont have actual routing, but each URL with parameters
// acts as a unique 'pointer' to a resource
// e.g., localhost:8888/pdo_users/ is unique compared to
// localhost:8888/pdo_users/index.php?task=delete&id=1

public function loadViews() {
	//get content through the model
	//load views that match the content
	require_once('views/head.php');
	require_once('views/nav.php');
	require_once('views/user_search.php');


	
	// what content should be passed back based on URL parameters?


	//route: localhost:8888/Users/index.php?id=1

	if(isset($_GET['id']) && !isset($_GET['task'])) {
		//run query method A on the model
		//load view(s) to match the model data
		$Users = $this->model->getOne($_GET['id']);
		require_once('views/user_detail.php');


	//route: localhost:8888/Users/index.php?str=john

	}else if(isset($_GET['str'])) {
		//run query method B on the model
		//load view(s) to match THAT model data
		$Users = $this->model->search('user_lname',$_GET['str']);
		$rows = $this->model->rows;
		require_once('views/user_list.php');


//route: localhost:8888/Users/index.php?task=create
//		 localhost:8888/Users/index.php?task=update
//		 localhost:8888/Users/index.php?task=delete

	}else if(isset($_GET['task'])) {
		if($_GET['task'] == 'create') {
			//POST values from a form
			$Users = $this->model->newUser($formvalues);
			header("location:index.php");
		}else if($_GET['task'] == 'delete') {
			$Users = $this->model->deleteUser($_GET['id']);
			header("location:index.php");
		}else if($_GET['task'] == 'update') {
			//POST values from a form, could also be hidden field for id value
		$Users = $this->model->updateUser(array_values($formvalues));
			header("location:index.php");
		}

		
// default route:localhost:8888/Users
	}else if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['user_lname']) && !empty($_POST['user_fname']) && !empty($_POST['user_username']) && !empty($_POST['user_password']) && !empty($_POST['user_role'])) {
		$formvalues = array($_POST['user_lname'], $_POST['user_fname'], $_POST['user_username'], $_POST['user_password'], $_FILES['user_photo']['name'], $_POST['user_role']);
		$this->model->newUser($formvalues);
		header("Location: index.php?task=success");
		exit();
	}
	else{ 
		$Users = $this->model->getAll();
		$rows = $this->model->rows;
		require_once('views/user_list.php');
	}
	// require_once('views/user_update.php');
	require_once('views/footer.php');

}


}

?>