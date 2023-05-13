<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$arComponentDescription = [
    'NAME' => GetMessage('SUNSET_USERS_GROUP_LIST_NAME'),
    'PATH' => [
        'ID' => 'sunset',
        'CHILD' => [
            'ID' => 'users.group.list',
            'NAME' => GetMessage('SUNSET_USERS_GROUP_LIST_NAME')
        ],
    ],
    'CACHE_TIME' => GetMessage('SUNSET_USERS_GROUP_LIST_CACHE_TIME'),
    'CACHE_PATH' => 'Y',
];
