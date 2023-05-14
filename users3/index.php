<?php
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetTitle('Группы пользователей (alt.v)');

use Bitrix\Main\Application,
    Bitrix\Main\Web\Uri;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

$request = Application::getInstance()->getContext()->getRequest();
$uri = new Uri($request->getRequestUri());
$arPath = $uri->getPath();
$path = explode('/', $uri->getPath());
$path = array_filter($path);

$arBy = ['c_sort'];
$arOrder = ['asc'];

$rsGroups = CGroup::GetList($arBy, $arOrder, []);
if (intval($rsGroups->SelectedRowsCount()) > 0) {
    while ($arGroups = $rsGroups->Fetch()) {
        $arUsersGroups[$arGroups['ID']] = $arGroups;
    }
}

if ($path[2]) {
    require 'detail.php';
} elseif (!$path[2]) {
    require 'list.php';
} else {
    Bitrix\Iblock\Component\Tools::process404('', true, true, true);
}

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php');
