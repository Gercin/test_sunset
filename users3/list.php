<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    exit;
}
if ($arUsersGroups) : ?>
    <table class="table">
        <tr class="tr">
            <th class="th">ID</th>
            <th class="th">Название группы</th>
            <th class="th">Описание группы</th>
            <th class="th">Ссылка</th>
        </tr>
        <?php foreach ($arUsersGroups as $key => $item) : ?>
            <tr class="tr">
                <td class="th"><?= $item['ID']; ?></td>
                <td class="th"><?= $item['NAME']; ?></td>
                <td class="th"><?= $item['DESCRIPTION']; ?></td>
                <td class="th"><a href="/users3/<?= $item['ID']; ?>/">Подробнее</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>