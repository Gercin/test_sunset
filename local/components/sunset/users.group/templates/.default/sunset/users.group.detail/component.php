<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

if (!isset($arParams['CACHE_TIME'])) {
	$arParams['CACHE_TIME'] = 3600;
}

$notFound = false;

$arParams['ELEMENT_ID'] = empty($arParams['ELEMENT_ID']) ? 0 : intval($arParams['ELEMENT_ID']);
if (empty($arParams['ELEMENT_ID'])) {
	$notFound = true;
}

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

// шаблон ссылки на страницу с содержимым элемента
$arParams['ELEMENT_URL'] = trim($arParams['ELEMENT_URL']);

if ($this->StartResultCache(false, ($arParams['CACHE_GROUPS'] === 'N' ? false : $USER->GetGroups()))) {

	$ELEMENT_ID = $arParams['ELEMENT_ID'];

	if ($ELEMENT_ID) {

		$arBy = ['c_sort'];
		$arOrder = ['asc'];
		$arFilter = ['ID' => $ELEMENT_ID];

		$rsGroups = CGroup::GetList($arBy, $arOrder, $arFilter);
		if (intval($rsGroups->SelectedRowsCount()) > 0) {
			while ($arGroups = $rsGroups->Fetch()) {
				$arUsersGroups[] = $arGroups;
			}
		}

		$arResult = $arUsersGroups;
	}

	if (isset($arResult['ID'])) {
		$this->SetResultCacheKeys(
			array(
				'ID',
				'NAME',
				'IPROPERTY_VALUES'
			)
		);
		$this->IncludeComponentTemplate();
	} else {
		$this->AbortResultCache();
		\Bitrix\Iblock\Component\Tools::process404(
			trim($arParams['MESSAGE_404']) ?: 'Группа пользователей не найдена',
			true,
			$arParams['SET_STATUS_404'] === 'Y',
			$arParams['SHOW_404'] === 'Y',
			$arParams['FILE_404']
		);
	}
}
