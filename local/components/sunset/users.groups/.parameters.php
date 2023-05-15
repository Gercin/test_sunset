<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();


$arComponentParameters = array( // кроме групп по умолчанию, добавляем свои группы настроек
    'GROUPS' => array(
        'POPULAR_SETTINGS' => array(
            'NAME' => 'Настройки главной страницы',
            'SORT' => 800
        ),
        'ELEMENT_SETTINGS' => array(
            'NAME' => 'Настройки страницы элемента',
            'SORT' => 1000
        ),
    ),
    'PARAMETERS' => array(
        'ELEMENT_SET_PAGE_TITLE' => array(
            'PARENT' => 'ELEMENT_SETTINGS',
            'NAME' => 'Устанавливать заголовок страницы для элемента',
            'TYPE' => 'CHECKBOX',
            'DEFAULT' => 'Y',
        ),
        'ELEMENT_SET_BROWSER_TITLE' => array(
            'PARENT' => 'ELEMENT_SETTINGS',
            'NAME' => 'Устанавливать заголовок окна браузера для элемента',
            'TYPE' => 'CHECKBOX',
            'DEFAULT' => 'Y',
        ),
        'VARIABLE_ALIASES' => array( // это для работы в режиме без ЧПУ
            'ELEMENT_ID' => array('NAME' => 'Идентификатор элемента'),
        ),
        'SEF_MODE' => array( // это для работы в режиме ЧПУ
            'list' => array(
                'NAME' => 'Главная страница',
                'DEFAULT' => '',
            ),
            'element' => array(
                'NAME' => 'Страница элемента',
                'DEFAULT' => 'users2/#ELEMENT_ID#/',
            ),
        ),
        'CACHE_TIME'  =>  array('DEFAULT' => 3600),
        'CACHE_GROUPS' => array( // учитываться права доступа при кешировании?
            'PARENT' => 'CACHE_SETTINGS',
            'NAME' => 'Учитывать права доступа',
            'TYPE' => 'CHECKBOX',
            'DEFAULT' => 'Y',
        ),
    ),
);

// настройка постраничной навигации
CIBlockParameters::AddPagerSettings(
    $arComponentParameters,
    'Элементы',  // $pager_title
    false,       // $bDescNumbering
    true         // $bShowAllParam
);

// настройки на случай, если раздел или элемент не найдены, 404 Not Found
CIBlockParameters::Add404Settings($arComponentParameters, $arCurrentValues);
