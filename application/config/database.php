<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'shama',

	// 'hostname' => 'mysql.mbntecnologia.com.br',
	// 'username' => 'mbntecnologia04',
	// 'password' => '123456',
	// 'database' => 'mbntecnologia04',
	
	'dsn'	=> '',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => TRUE,
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
