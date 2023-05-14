<?php
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetTitle('Группы пользователей (комплексный компонент)');

$APPLICATION->IncludeComponent(
    'sunset:users.group.detail',
    '.default',
    [
        'ELEMENT_ID' => 1,
    ],
    false
);

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php');
