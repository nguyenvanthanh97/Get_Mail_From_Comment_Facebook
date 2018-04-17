<?php
	session_start();
	require_once 'Facebook/autoload.php';

	$fb = new Facebook\Facebook([
	  'app_id' => '293836381020859',
	  'app_secret' => '63bbd14eefe25cef87bc56a3bae9179a',
	  'default_graph_version' => 'v2.11',
	]);

	
	function extract_email($array){
		$email = array();
		foreach($array as $i){
			preg_match_all('/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}/', $i['message'], $matches);
			$email = array_merge($email, $matches[0]);
		}
		
		return $email;
		
	}

	$helper = $fb->getRedirectLoginHelper();
	
	if (isset($_POST['data'])) {
		if(preg_match('/com\/([^\/]+)\/posts\/([0-9]+)/', $_POST['data'], $matches)){
			// Lấy id của fanpage
			try {
				$fanpage = $fb->get($matches[1], $_SESSION['facebook_access_token'])->getGraphNode();
			} catch(Facebook\Exceptions\FacebookResponseException $e) {
				// When Graph returns an error
				echo 'Graph trả về một lỗi: ' . $e->getMessage();
				exit;
			} catch(Facebook\Exceptions\FacebookSDKException $e) {
				// When validation fails or other local issues
				echo 'Facebook SDK trả về một lỗi: ' . $e->getMessage();
				exit;
			}
			$id_post = $fanpage['id'] . '_' . $matches[2];
		} else {
			echo 'Link sai định dạng!<br>Vui lòng nhập link có định dạng sau:<br>https://www.facebook.com/xxxxxx/posts/xxxxxx';
			exit;
		}
	} else {
		echo 'Có lỗi xảy ra! Không có dữ liệu để xử lý!';
		exit;
	}
	
	if (isset($_SESSION['facebook_access_token'])) {

		// getting all posts published by user
		try {
			$posts_request = $fb->get('/' . $id_post . '/comments?limit=3000', $_SESSION['facebook_access_token']);
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
			// When Graph returns an error
			echo 'Graph trả về một lỗi: ' . $e->getMessage();
			exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
			// When validation fails or other local issues
			echo 'Facebook SDK trả về một lỗi: ' . $e->getMessage();
			exit;
		}
		
		$total_posts = array();
		$posts_response = $posts_request->getGraphEdge();
		
		do {	
			$response_array = $posts_response->asArray();
			$total_posts = array_merge($total_posts, extract_email($response_array));	
		} while ($posts_response = $fb->next($posts_response));
		echo '<p class="noselect"><b>Có tổng cộng ' . sizeof($total_posts) . ' email được tìm thấy!</b></p>';
		foreach ($total_posts as $m){
			echo $m;
			echo '</br>';
		}
	} else {
		echo 'Có lỗi xảy ra!';
	}
?>