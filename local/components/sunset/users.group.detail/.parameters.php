<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$arComponentParameters = [
	'GROUPS' => [],
	'PARAMETERS' => [
		'ELEMENT_ID' => [
			'PARENT' => 'BASE',
			'NAME' => 'Идентификатор элемента',
			'TYPE' => 'STRING',
			'DEFAULT' => '={$_REQUEST["ELEMENT_ID"]}',
		],
		'ELEMENT_URL' => [
			'PARENT' => 'URL_TEMPLATES',
			'NAME' => 'URL, ведущий на страницу с содержимым элемента',
			'TYPE' => 'STRING',
			'DEFAULT' => 'users2/#ELEMENT_ID#/'
		],
		'CACHE_TIME'  =>  ['DEFAULT' => 3600],
		'CACHE_GROUPS' => [
			'PARENT' => 'CACHE_SETTINGS',
			'NAME' => 'Учитывать права доступа',
			'TYPE' => 'CHECKBOX',
			'DEFAULT' => 'Y',
		]
	]
];
