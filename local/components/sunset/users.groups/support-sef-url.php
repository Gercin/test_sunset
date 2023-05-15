<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$arVariables = array();

$arComponentVariables = array(
    'sort',
    'dir',
);

$arDefaultVariableAliases404 = array(
    'section' => array(
        'ELEMENT_COUNT' => 'count',
    ),
);

$arDefaultUrlTemplates404 = array(
    'list' => '',
    'element' => 'users2/#ELEMENT_ID#/',
);

$arUrlTemplates = CComponentEngine::MakeComponentUrlTemplates(
    $arDefaultUrlTemplates404,
    $arParams['SEF_URL_TEMPLATES']
);

$arVariableAliases = CComponentEngine::MakeComponentVariableAliases(
    $arDefaultVariableAliases404,
    $arParams['VARIABLE_ALIASES']
);

$componentPage = CComponentEngine::ParseComponentPath(
    $arParams['SEF_FOLDER'],
    $arUrlTemplates,
    $arVariables
);

if ($componentPage === false && parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == $arParams['SEF_FOLDER']) {
    $componentPage = 'list';
}

// Если определить файл шаблона не удалось, показываем  страницу 404 Not Found
if (empty($componentPage)) {
    \Bitrix\Iblock\Component\Tools::process404(
        trim($arParams['MESSAGE_404']) ?: 'Элемент или раздел инфоблока не найден',
        true,
        $arParams['SET_STATUS_404'] === 'Y',
        $arParams['SHOW_404'] === 'Y',
        $arParams['FILE_404']
    );
    return;
}
$notFound = false;
// недопустимое значение идентификатора элемента
if ($componentPage == 'element') {
    if (!(isset($arVariables['ELEMENT_ID']) && ctype_digit($arVariables['ELEMENT_ID']))) {
        $notFound = true;
    }
}

if ($notFound) {
    \Bitrix\Iblock\Component\Tools::process404(
        trim($arParams['MESSAGE_404']) ?: 'Элемент или раздел инфоблока не найден',
        true,
        $arParams['SET_STATUS_404'] === 'Y',
        $arParams['SHOW_404'] === 'Y',
        $arParams['FILE_404']
    );
    return;
}

CComponentEngine::InitComponentVariables(
    $componentPage,
    $arComponentVariables,
    $arVariableAliases,
    $arVariables
);

$arResult['VARIABLES'] = $arVariables;
$arResult['FOLDER'] = $arParams['SEF_FOLDER'];
$arResult['ELEMENT_URL'] = $arParams['SEF_FOLDER'] . $arParams['SEF_URL_TEMPLATES']['element'];

$this->IncludeComponentTemplate($componentPage);
