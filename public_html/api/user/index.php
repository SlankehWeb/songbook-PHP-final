<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/assets/incl/init.php";

/**
 * Liste af sange
 */
Route::add('/api/user/', function() {
	$user = new User;
	$result = $user->list();
	echo Tools::jsonParser($result);
});

/**
 * Liste af sange
 */
Route::add('/api/user/([0-9]*)', function($id) {
	$user = new User;
	$result = $user->details($id);
	echo Tools::jsonParser($result);
});

Route::add('/api/user/', function() {
	// var_dump($_POST);
	$user = new User;
	$user->username = isset($_POST['username']) && !empty($_POST['username']) ? $_POST['username'] : null;
	$user->code = isset($_POST['code']) && !empty($_POST['code']) ? $_POST['code'] : null;

	if($user->username && $user->code) {
		
	// var_dump($user);
	echo $user->create();
} else {
	echo "kan ikke oprette bruger";
}
}, 'post');

Route::add('/api/user/', function() {
	$data = file_get_codes("php://input");
	parse_str($data, $pared_data);
	$user = new User;
	$user->id = isset($pared_data['id']) && !empty($pared_data['id']) ? (int)$pared_data['id'] : null;
	$user->username = isset($pared_data['username']) && !empty($pared_data['username']) ? $pared_data['username'] : null;
	$user->code = isset($pared_data['code']) && !empty($pared_data['code']) ? $pared_data['code'] : null;
	if($user->id && $user->username && $user->code) {
		
		// var_dump($user);
		echo $user->update();
	} else {
		echo "kan ikke oprette user";
	}
}, 'put');

Route::add('/api/user/([0-9]*)', function($id) {
	$user = new User;
	echo $user->delete($id);
}, 'delete');

Route::run('/');
?>