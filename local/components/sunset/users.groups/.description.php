<?php
/*
 * Файл local/components/tokmakov/iblock/.description.php
 */
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
    'NAME' => 'Группы пользователей (комплексный)', // название компонента
    'DESCRIPTION' => 'Универсальный компонент для групп пользователей',
    'CACHE_PATH' => 'Y', // показывать кнопку очистки кеша
    'SORT' => 40, // порядок сортировки в визуальном редакторе
    'COMPLEX' => 'Y', // признак комплексного компонента
    'PATH' => array( // расположение компонента в визуальном редакторе
        'ID' => 'other_components', // идентификатор верхнего уровеня в редакторе
        'NAME' => 'Прочие компоненты', // название верхнего уровня в редакторе
        'CHILD' => array( // второй уровень в визуальном редакторе
            'ID' => 'other_iblock', // идентификатор второго уровня в редакторе
            'NAME' => 'Информационный блок' // название второго уровня в редакторе
        )
    )
);