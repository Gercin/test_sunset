<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$this->setFrameMode(true);

$APPLICATION->IncludeComponent(
    'sunset:users.groups.element',
    '.default',
    [
        'ELEMENT_ID' => $arResult['VARIABLES']['ELEMENT_ID'], 
        'ELEMENT_URL' => $arResult['ELEMENT_URL'],
        'CACHE_TYPE' => $arParams['CACHE_TYPE'],
        'CACHE_TIME' => $arParams['CACHE_TIME'],
        'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
        'SET_PAGE_TITLE' => $arParams['ELEMENT_SET_PAGE_TITLE'],
        'SET_BROWSER_TITLE' => $arParams['ELEMENT_SET_BROWSER_TITLE'],
        'MESSAGE_404' => $arParams['MESSAGE_404'],
        'SET_STATUS_404' => $arParams['SET_STATUS_404'],
        'SHOW_404' => $arParams['SHOW_404'],
    ],
    $component
);
