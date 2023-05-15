<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

$arVariables = array();

$arComponentVariables = array(
    'sort',
    'dir',
);

$arComponentVariables[] = 'ACTION';

$arDefaultVariableAliases = array(
    'ELEMENT_COUNT' => 'count'
);

$arVariableAliases = CComponentEngine::MakeComponentVariableAliases(
    $arDefaultVariableAliases,    // массив псевдонимов переменных по умолчанию
    $arParams['VARIABLE_ALIASES'] // массив псевдонимов из входных параметров
);

CComponentEngine::InitComponentVariables(
    false,                 // в режиме не ЧПУ всегда false
    $arComponentVariables, // массив имен переменных, которые компонент может получать из запроса
    $arVariableAliases,    // массив псевдонимов переменных
    $arVariables           // массив, в котором возвращаются восстановленные переменные
);

$componentPage = 'list';
if (isset($arVariables['ACTION']) && $arVariables['ACTION'] == 'element') {
    $componentPage = 'element'; // элемент инфоблока
}

$notFound = false;
if ($componentPage == 'element') {
        if (!(isset($arVariables['ELEMENT_ID']) && ctype_digit($arVariables['ELEMENT_ID']))) {
            $notFound = true;
        }
}

// показываем страницу 404 Not Found
if ($notFound) {
    \Bitrix\Iblock\Component\Tools::process404(
        trim($arParams['MESSAGE_404']) ?: 'Группа пользователей не найдена',
        true,
        $arParams['SET_STATUS_404'] === 'Y',
        $arParams['SHOW_404'] === 'Y',
        $arParams['FILE_404']
    );
    return;
}

$arResult['VARIABLES'] = $arVariables;
$arResult['FOLDER'] = '';
$arResult['ELEMENT_URL'] = $APPLICATION->GetCurPage().'?ACTION=element'.'&'.$arVariableAliases['ELEMENT_ID'].'=#ELEMENT_ID#';

$this->IncludeComponentTemplate($componentPage);