<span class="data-wrap">
    <li class="app-info-title"><?= e('%s Authentication', '<abbr title="Lightweight Directory Access Protocol">LDAP</abbr>') ?></li>
    <?php if (LDAP_AUTH == false): ?>
        <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>">
            <?= t('Disabled') ?>
        </li>
        <span class="fail-x" title="<?= t('This is the default setting') ?>">&#10008;</span>
        <li class="form-help"><?= t('Enable LDAP in your configuration file to display the related settings.') ?></li>
    <?php else: ?>
        <li class="app-info-value border-bottom-thick">
            <?= t('Enabled') ?>
        </li>
        <span class="pass-tick">&#10004;</span>
    <?php endif ?>
</span>
