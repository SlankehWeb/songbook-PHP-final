<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/assets/incl/init.php";

/**
 * Liste af sange
 */
Route::add('/api/song/', function() {
	$song = new Song;
	$result = $song->list();
	echo Tools::jsonParser($result);
});

/**
 * Liste af sange
 */
Route::add('/api/song/([0-9]*)', function($id) {
	$song = new Song;
	$result = $song->details($id);
	echo Tools::jsonParser($result);
});

Route::add('/api/song/', function() {
	// var_dump($_POST);
	$song = new Song;
	$song->title = isset($_POST['title']) && !empty($_POST['title']) ? $_POST['title'] : null;
	$song->content = isset($_POST['content']) && !empty($_POST['content']) ? $_POST['content'] : null;
	$song->artist_id = isset($_POST['artist_id']) && !empty($_POST['artist_id']) ? (int)$_POST['artist_id'] : null;

	if($song->title && $song->content && $song->artist_id) {
		
	// var_dump($song);
	echo $song->create();
} else {
	echo "kan ikke oprette sangen";
}
}, 'post');

Route::add('/api/song/', function() {
	$data = file_get_contents("php://input");
	parse_str($data, $pared_data);
	$song = new Song;
	$song->id = isset($pared_data['id']) && !empty($pared_data['id']) ? (int)$pared_data['id'] : null;
	$song->title = isset($pared_data['title']) && !empty($pared_data['title']) ? $pared_data['title'] : null;
	$song->content = isset($pared_data['content']) && !empty($pared_data['content']) ? $pared_data['content'] : null;
	$song->artist_id = isset($pared_data['artist_id']) && !empty($pared_data['artist_id']) ? (int)$pared_data['artist_id'] : null;
	if($song->id && $song->title && $song->content && $song->artist_id) {
		
		// var_dump($song);
		echo $song->update();
	} else {
		echo "kan ikke oprette sangen";
	}
}, 'put');

Route::add('/api/song/([0-9]*)', function($id) {
	$song = new Song;
	echo $song->delete($id);
}, 'delete');

Route::run('/');
?>