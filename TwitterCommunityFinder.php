/*
	created by Ebed Kharistian Marsudi
	Duta Wacana Christian University
	
*/
<?php
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');

class TwitterCommunityFinder{
	function __construct() {
       session_start();
    }

	function getLoginURL(){
		//function to login through Twitter API
		$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
		$temporary_credentials = $connection->getRequestToken(OAUTH_CALLBACK); 

		$_SESSION['oauth_token'] = $temporary_credentials['oauth_token'];
		$_SESSION['oauth_token_secret'] = $temporary_credentials['oauth_token_secret'];

		//create authorize url 
		$redirect_url = $connection->getAuthorizeURL($temporary_credentials);
		return $redirect_url;
	}

	function callback(){
		//function for receiving oauth_verifier from twitter sign in page
		$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['oauth_token'],$_SESSION['oauth_token_secret']);
		$token_credentials = $connection->getAccessToken($_REQUEST['oauth_verifier']);
		$_SESSION['oauth_token'] = $token_credentials['oauth_token'];
		$_SESSION['oauth_token_secret'] = $token_credentials['oauth_token_secret'];
		$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['oauth_token'],$_SESSION['oauth_token_secret']);
		$_SESSION['connection'] = $connection;
		header("location: index.php");
	}

	function isConnect(){
		if(isset($_SESSION['connection']))
			return true;
		return false;
	}

	function createFriends(){
		//get id or screenname
		$account = $_SESSION['account'];
		$id = $account->id;
		$screen_name = $account->screen_name;
		//get following and follower raw data
		$raw_following = $connection->get('friends/list', array('count' => 200, 'skip_status' => 1));
		$raw_follower = $connection->get('followers/list', array('count' => 200, 'skip_status' => 1));
		$following = array();
		$friend = array();
		//keep following id & screen_name only
		foreach ($raw_following->users as $key) {
		  $following[strval($key->id)] = $key->screen_name;
		}
		//check intersection between following and follower thus create friends list
		foreach ($raw_follower->users as $key) {
		  if(isset($following[strval($key->id)]))
		  $friend[strval($key->id)] = $key->screen_name;
		}
		//keep the information in user to be written in json
		$user = array("id" => $id, 'screen_name' => $screen_name, 'friend' => $friend);
		file_put_contents('data/'.$screen_name.'.json', json_encode($user));
	}

	function getFriends(){
		//get id or screenname
		$account = $_SESSION['account'];
  		$id = $account->id;
  		$screen_name = $account->screen_name;
  		$user;
  		//check whether file json exists
	    if(!file_exists('data/' . $screen_name . '.json')){
	    	//create friends list in json
	        $TCF->createFriends();
	    } 
	    //read the json file
	    $user = json_decode(file_get_contents('data/' . $screen_name . '.json'));
	    return $user;
	}
}