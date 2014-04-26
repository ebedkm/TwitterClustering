<?php
	/*session_start();
	require_once('twitteroauth/twitteroauth.php');
	require_once('config.php');
	/*if(empty($_SESSION['oauth_verifier'])){
		$_SESSION['oauth_verifier'] = $_REQUEST['oauth_verifier'];
	}*/
	/*
	print_r($_REQUEST['oauth_verifier']);
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['oauth_token'],$_SESSION['oauth_token_secret']);
	$token_credentials = $connection->getAccessToken($_REQUEST['oauth_verifier']);
	
	//print_r($token_credentials);
	$_SESSION['oauth_token'] = $token_credentials['oauth_token'];
	$_SESSION['oauth_token_secret'] = $token_credentials['oauth_token_secret'];
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['oauth_token'],$_SESSION['oauth_token_secret']);
	//$account = $connection->get('account/verify_credentials');
	$_SESSION['connection'] = $connection;
	header("location: index.php");*/
	require_once('TwitterCommunityFinder.php');

	$TCF = new TwitterCommunityFinder();
	$TCF->callback();
?>
