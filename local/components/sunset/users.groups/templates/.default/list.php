<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();


$this->setFrameMode(true);

$APPLICATION->IncludeComponent(
    'sunset:users.groups.list',
    '.default',
    [
        'ELEMENT_URL' => $arResult['ELEMENT_URL'],
        'CACHE_TYPE' => $arParams['CACHE_TYPE'],
        'CACHE_TIME' => $arParams['CACHE_TIME'],
        'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
    ],
    $component
);
