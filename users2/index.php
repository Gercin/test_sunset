<?php
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetTitle('Группы пользователей (комплексный компонент)');

$APPLICATION->IncludeComponent(
    'sunset:users.groups',
    '.default',
    [
        'VARIABLE_ALIASES' => array(
            'ELEMENT_ID' => 'ELEMENT_ID',
            'ELEMENT_CODE' => 'ELEMENT_CODE',
            'SECTION_ID' => 'SECTION_ID',
            'SECTION_CODE' => 'SECTION_CODE',
        ),
        'SEF_FOLDER' => '/users2/',
        'SEF_MODE' => 'Y',
        'SEF_URL_TEMPLATES' => [
            'element'=>'#ELEMENT_ID#/',
            'list'=>'',
        ],
    ],
    false
);

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php');
