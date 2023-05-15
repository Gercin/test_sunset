<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    exit;
}

if ($arUsersGroups[$path['2']]) :

    $arGroup = $arUsersGroups[$path['2']];
    $APPLICATION->AddChainItem($arGroup['NAME'], $arPath);
?>
    <div>
        <h3><?= $arGroup['NAME'] ?></h3>
        <br />
        <p>ID - <?= $arGroup['ID'] ?></p>
        <br />
        <p><?= $arGroup['DESCRIPTION'] ?></p>
        <br />
    </div>
<?php else : ?>
    <div>
        <br />
        <p>Группы с ID - <?= $path['2']; ?> не найдено</p>
    </div>
<?php endif; ?>