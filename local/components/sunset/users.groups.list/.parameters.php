<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$arComponentParameters = [
	'GROUPS' => [],
	'PARAMETERS' => [
		'CACHE_TIME'  =>  [
			'DEFAULT' => 36000000
		],
		'CACHE_GROUPS' => [
			'PARENT' => 'CACHE_SETTINGS',
			'NAME' => 'Учитывать права доступа',
			'TYPE' => 'CHECKBOX',
			'DEFAULT' => 'Y',
		],
	],
];
