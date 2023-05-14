<?php

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

if ($cache->startDataCache($arParams['CACHE_TIME'], $cacheId, $cacheDir)) {
	// Запрос данных и формирование массива $arResult
	$arBy = ['c_sort'];
	$arOrder = ['asc'];

	$rsGroups = CGroup::GetList($arBy, $arOrder, []);
	if (intval($rsGroups->SelectedRowsCount()) > 0) {
		while ($arGroups = $rsGroups->Fetch()) {
			$arUsersGroups[] = $arGroups;
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
