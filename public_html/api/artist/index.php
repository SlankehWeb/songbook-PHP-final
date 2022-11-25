<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/assets/incl/init.php";

/**
 * Liste af artister
 */
Route::add('/api/artist/', function() {
	$artist = new Artist;
	$result = $artist->list();
	echo Tools::jsonParser($result);
});


Route::add('/api/artist/([0-9]*)', function($id) {
	$artist = new Artist;
	$result = $artist->details($id);
	echo Tools::jsonParser($result);
});

Route::add('/api/artist/', function() {
	$artist = new Artist;
	$artist->name = isset($_POST['name']) && !empty($_POST['name']) ? $_POST['name'] : null;

	if($artist->name) {
		

	echo $artist->create();
} else {
	echo "kan ikke oprette artist";
}
}, 'post');

Route::add('/api/artist/', function() {
	$data = file_get_contents("php://input");
	parse_str($data, $pared_data);
	$artist = new Artist;
	$artist->id = isset($pared_data['id']) && !empty($pared_data['id']) ? (int)$pared_data['id'] : null;
	$artist->name = isset($pared_data['name']) && !empty($pared_data['name']) ? $pared_data['name'] : null;
	if($artist->id && $artist->name) {
		
		// var_dump($artist);
		echo $artist->update();
	} else {
		echo "kan ikke oprette artist";
	}
}, 'put');

Route::add('/api/artist/([0-9]*)', function($id) {
	$artist = new Artist;
	echo $artist->delete($id);
}, 'delete');

Route::run('/');
?>