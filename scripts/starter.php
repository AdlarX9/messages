<?php

session_start();

$root = '/reseau';

function redirectToUrl(string $url): never
{
	$root = '/reseau';
	header("Location: {$root}/{$url}");
	exit();
}