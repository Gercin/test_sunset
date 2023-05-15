<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Data\Cache;

// Проверка и инициализация входных параметров
if ($arParams['ID'] <= 0) {
	$arParams['ID'] = 10;
}

$arParams['CACHE_TIME'] = intval($arParams['CACHE_TIME']);

$cacheId = implode('|', [
	SITE_ID,
	$APPLICATION->GetCurPage(),
	$USER->GetGroups()
]);

// Кеш зависит только от подготовленных параметров без "~"
foreach ($this->arParams as $k => $v) {
	if (strncmp('~', $k, 1)) {
		$cacheId .= ',' . $k . '=' . $v;
	}
}

$cacheDir = '/' . SITE_ID . $this->GetRelativePath();
$cache    = Cache::createInstance();

if (!isset($arParams['CACHE_TIME'])) {
	$arParams['CACHE_TIME'] = 3600;
}

if ($cache->startDataCache($arParams['CACHE_TIME'], $cacheId, $cacheDir)) {
	// Запрос данных и формирование массива $arResult
	$arBy = ['c_sort'];
	$arOrder = ['asc'];

	$rsGroups = CGroup::GetList($arBy, $arOrder, []);
	if (intval($rsGroups->SelectedRowsCount()) > 0) {
		while ($arGroups = $rsGroups->Fetch()) {
			$arUsersGroups[$arGroups['ID']] = $arGroups;
			if ($arParams['ELEMENT_URL']) {
				$link = str_replace('#ELEMENT_ID#', $arGroups['ID'], $arParams['ELEMENT_URL']);
				$arUsersGroups[$arGroups['ID']]['LINK'] = $link;
				$arResult['SHOW_LINK'] = 'Y';
			}
		}
	}

	$arResult['ITEMS'] = $arUsersGroups;

	// Подключение шаблона компонента
	$this->IncludeComponentTemplate();

	$templateCachedData = $this->GetTemplateCachedData();

	$cache->endDataCache([
		'arResult'           => $arResult,
		'templateCachedData' => $templateCachedData,
	]);
} else {
	extract($cache->GetVars());
	$this->SetTemplateCachedData($templateCachedData);
}
