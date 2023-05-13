<?php
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetTitle('Группы пользователей');

$APPLICATION->IncludeComponent(
    'sunset:users.group.list',
    '.default',
    [],
    false
);

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php');
