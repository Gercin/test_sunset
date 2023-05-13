<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$arComponentDescription = [
    'NAME' => GetMessage('NAME'),
    'PATH' => [
        'ID' => 'sunset',
        'CHILD' => [
            'ID' => 'users.group.list',
            'NAME' => GetMessage('NAME')
        ],
    ],
    'PAGE_TITLE' => GetMessage('TITLE'),
    'CACHE_TIME' => GetMessage('CACHE_TIME'),
    'CACHE_PATH' => 'Y',
];
