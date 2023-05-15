<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$arComponentDescription = [
    'NAME' => GetMessage('SUNSET_USERS_GROUP_DETAIL_NAME'),
    'DESCRIPTION' => GetMessage('SUNSET_USERS_GROUP_DETAIL_DESCRIPTION'),
    'CACHE_PATH' => 'Y',
    'SORT' => 30,
    'COMPLEX' => 'N',
    'PATH' => [
        'ID' => 'sunset',
        'NAME' => GetMessage('SUNSET_USERS_GROUP_DETAIL_NAME'),
    ]
];
