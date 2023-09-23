<span class="data-wrap">
    <li class="app-info-title"><?= e('%s Authentication', '<abbr title="' . t('Lightweight Directory Access Protocol') . '">LDAP</abbr>') ?></li>
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
<?php if (LDAP_AUTH == true): ?>
    <span class="data-wrap">
        <li class="app-info-title"><?= e('%s Server', '<abbr title="' . t('Lightweight Directory Access Protocol') . '">LDAP</abbr>') ?></li>
        <?php if (LDAP_SERVER != ''): ?>
            <?php if ($this->user->isAdmin()): ?>
                <li class="app-info-value value-path border-bottom-thick privacy">
                    <?= LDAP_SERVER ?>
                </li>
            <?php else: ?>
                <li class="app-info-value value-path border-bottom-thick">
                    <?= $this->helper->supportHelper->maskServer(LDAP_SERVER) ?>
                </li>
            <?php endif ?>
        <?php else: ?>
            <li class="app-info-value border-bottom-thick not-set" title="<?= t('This is the default setting') ?>">
                <?= t('Not Set') ?>
            </li>
        <?php endif ?>
    </span>
    <span class="data-wrap">
        <li class="app-info-title"><?= e('%s Port', '<abbr title="' . t('Lightweight Directory Access Protocol') . '">LDAP</abbr>') ?></li>
        <?php if (LDAP_PORT != 389): ?>
            <?= LDAP_PORT ?>
        <?php else: ?>
            <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>">389</li>
        <?php endif ?>
    </span>
        <?php endif ?>
    </span>
    <span class="data-wrap">
        <li class="app-info-title"><?= t('') ?></li>
        <?php if (LDAP_START_TLS): ?>
        <?php endif ?>
    </span>
    <span class="data-wrap">
        <li class="app-info-title"><?= t('') ?></li>
        <?php if (LDAP_USERNAME_CASE_SENSITIVE): ?>
        <?php endif ?>
    </span>
    <span class="data-wrap">
        <li class="app-info-title"><?= t('') ?></li>
        <?php if (LDAP_BIND_TYPE): ?>
        <?php endif ?>
    </span>
    <span class="data-wrap">
        <li class="app-info-title"><?= t('') ?></li>
        <?php if (LDAP_USERNAME): ?>
        <?php endif ?>
    </span>
    <span class="data-wrap">
        <li class="app-info-title"><?= t('') ?></li>
        <?php if (LDAP_PASSWORD): ?>
        <?php endif ?>
    </span>
    <span class="data-wrap">
        <li class="app-info-title"><?= t('') ?></li>
        <?php if (LDAP_USER_BASE_DN): ?>
        <?php endif ?>
    </span>
    <span class="data-wrap">
        <li class="app-info-title"><?= t('') ?></li>
        <?php if (LDAP_USER_FILTER): ?>
        <?php endif ?>
    </span>
    <span class="data-wrap">
        <li class="app-info-title"><?= t('') ?></li>
        <?php if (LDAP_USER_ATTRIBUTE_USERNAME): ?>
        <?php endif ?>
    </span>
    <span class="data-wrap">
        <li class="app-info-title"><?= t('') ?></li>
        <?php if (LDAP_USER_ATTRIBUTE_FULLNAME): ?>
        <?php endif ?>
    </span>
    <span class="data-wrap">
        <li class="app-info-title"><?= t('') ?></li>
        <?php if (LDAP_USER_ATTRIBUTE_EMAIL): ?>
        <?php endif ?>
    </span>
    <span class="data-wrap">
        <li class="app-info-title"><?= t('') ?></li>
        <?php if (LDAP_USER_ATTRIBUTE_GROUPS): ?>
        <?php endif ?>
    </span>
    <span class="data-wrap">
        <li class="app-info-title"><?= t('') ?></li>
        <?php if (LDAP_USER_ATTRIBUTE_PHOTO): ?>
        <?php endif ?>
    </span>
    <span class="data-wrap">
        <li class="app-info-title"><?= t('') ?></li>
        <?php if (LDAP_USER_ATTRIBUTE_LANGUAGE): ?>
        <?php endif ?>
    </span>
    <span class="data-wrap">
        <li class="app-info-title"><?= t('') ?></li>
        <?php if (LDAP_USER_CREATION): ?>
        <?php endif ?>
    </span>
    <span class="data-wrap">
        <li class="app-info-title"><?= t('') ?></li>
        <?php if (LDAP_USER_DEFAULT_ROLE_MANAGER): ?>
        <?php endif ?>
    </span>
    <span class="data-wrap">
        <li class="app-info-title"><?= t('') ?></li>
        <?php if (LDAP_GROUP_ADMIN_DN): ?>
        <?php endif ?>
    </span>
    <span class="data-wrap">
        <li class="app-info-title"><?= t('') ?></li>
        <?php if (LDAP_GROUP_MANAGER_DN): ?>
        <?php endif ?>
    </span>
    <span class="data-wrap">
        <li class="app-info-title"><?= t('') ?></li>
        <?php if (LDAP_GROUP_PROVIDER): ?>
        <?php endif ?>
    </span>
    <span class="data-wrap">
        <li class="app-info-title"><?= t('') ?></li>
        <?php if (LDAP_GROUP_BASE_DN): ?>
        <?php endif ?>
    </span>
    <span class="data-wrap">
        <li class="app-info-title"><?= t('') ?></li>
        <?php if (LDAP_GROUP_FILTER): ?>
        <?php endif ?>
    </span>
    <span class="data-wrap">
        <li class="app-info-title"><?= t('') ?></li>
        <?php if (LDAP_GROUP_USER_FILTER): ?>
        <?php endif ?>
    </span>
    <span class="data-wrap">
        <li class="app-info-title"><?= t('') ?></li>
        <?php if (LDAP_GROUP_USER_ATTRIBUTE): ?>
        <?php endif ?>
    </span>
    <span class="data-wrap">
        <li class="app-info-title"><?= t('') ?></li>
        <?php if (LDAP_GROUP_ATTRIBUTE_NAME): ?>
        <?php endif ?>
    </span>
    <span class="data-wrap">
        <li class="app-info-title"><?= t('') ?></li>
        <?php if (LDAP_GROUP_SYNC): ?>
        <?php endif ?>
    </span>
<?php endif ?>
