<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
if ($arResult['ITEMS']) : ?>
	<table class="table">
		<tr class="tr">
			<th class="th"><?= GetMessage('SUNSET_USERS_GROUP_LIST_TABLE_ID'); ?></th>
			<th class="th"><?= GetMessage('SUNSET_USERS_GROUP_LIST_TABLE_NAME'); ?></th>
			<th class="th"><?= GetMessage('SUNSET_USERS_GROUP_LIST_TABLE_DESC'); ?></th>
			<?php if ($arResult['SHOW_LINK']) : ?><th class="th"></th><?php endif; ?>
		</tr>
		<?php foreach ($arResult['ITEMS'] as $key => $item) : ?>
			<tr class="tr">
				<td class="th"><?= $item['ID']; ?></td>
				<td class="th"><?= $item['NAME']; ?></td>
				<td class="th"><?= $item['DESCRIPTION']; ?></td>
				<?php if ($arResult['SHOW_LINK']) : ?><th class="th"><a href="<?= $item['LINK']; ?>">Подробнее...</a></th><?php endif; ?>
			</tr>
		<?php endforeach; ?>
	</table>
<?php endif; ?>