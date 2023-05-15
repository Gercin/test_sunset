<?php 
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
if ($arResult) : ?>
	<div>
        <h3><?= $arResult['NAME'] ?></h3>
        <br />
        <p>ID - <?= $arResult['ID'] ?></p>
        <br />
        <p><?= $arResult['DESCRIPTION'] ?></p>
        <br />
    </div>
<?php endif; ?>