<span class="data-wrap">
    <li class="app-info-title"><?= e('%s Authentication', '<abbr title="Lightweight Directory Access Protocol">LDAP</abbr>') ?></li>
    <?php if (LDAP_AUTH == false): ?>
        <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>">
            <?= t('Disabled') ?>
        </li>
    <?php else: ?>
        <li class="app-info-value border-bottom-thick">
            <?= t('Enabled') ?>
        </li>
    <?php endif ?>
</span>
