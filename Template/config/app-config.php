<details class="accordion-section app-config">
    <summary class="accordion-title">
        <?= t('General Settings') ?>
    </summary>
    <div class="accordion-content">
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Escape HTML Inside Markdown') ?></li>
            <?php if (MARKDOWN_ESCAPE_HTML == false): ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('External content will be trusted. Inline HTML will be rendered.') ?>">
                    <?= t('False') ?>
                </li>
                <span class="fail-x" title="<?= t('External content will be trusted. Inline HTML will be rendered.') ?>">&#10008;</span>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('External content is not trusted by default for security reasons therefore inline HTML will not be rendered.') ?>">
                    <?= t('True') ?>
                </li>
                <span class="pass-tick" title="<?= t('External content is not trusted by default for security reasons therefore inline HTML will not be rendered.') ?>">&#10004;</span>
            <?php endif ?>
        </span>
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Enable URL Rewrite (Pretty URLs)') ?></li>
            <?php if (ENABLE_URL_REWRITE == false): ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('Ensure the server configuration is correct before changing this setting') ?>">
                    <?= t('False') ?>
                </li>
                <span class="fail-x" title="<?= t('Ensure the server configuration is correct before changing this setting') ?>">&#10008;</span>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('Pretty URLs are enabled') ?>">
                    <?= t('True') ?>
                </li>
                <span class="pass-tick" title="<?= t('Pretty URLs are enabled') ?>">&#10004;</span>
            <?php endif ?>
        </span>
    </div>
</details>
<details class="accordion-section app-config">
    <summary class="accordion-title">
        <?= t('Plugins Configuration') ?>
    </summary>
    <div class="accordion-content">
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Plugins Installer') ?></li>
            <?php if (PLUGIN_INSTALLER == false): ?>
                <li class="app-info-value border-bottom-thick" title="">
                    <?= t('Disabled') ?>
                </li>
                <span class="fail-x" title="<?= t('Plugins cannot be installed. This is also set by default for security reasons.') ?>">&#10008;</span>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick" title="">
                    <?= t('Enabled') ?>
                </li>
                <span class="pass-tick" title="<?= t('Plugins can be automatically installed through the Plugins Directory') ?>">&#10004;</span>
            <?php endif ?>
        </span>
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Plugins Directory') ?></li>
            <li class="app-info-value value-path border-bottom-thick privacy"><?= PLUGINS_DIR ?></li>
            <?php if (!is_writable(PLUGINS_DIR)): ?>
                <span class="fail-x" title="<?= t('This directory is not writeable by the web server user') ?>">&#10008;</span>
            <?php else: ?>
                <span class="pass-tick" title="<?= t('This directory is writeable by the web server user') ?>">&#10004;</span>
            <?php endif ?>
            <?php if ($this->user->isAdmin()): ?>
                <div id="pCheck" class="p-check">
                    <?php if (!is_writable(PLUGINS_DIR)): ?>
                        <span class="p-dir" title="<?= t('Directory Permissions') ?>">
                            <?= $this->helper->supportHelper->getPermissions(PLUGINS_DIR) ?>
                        </span>
                        <span class="p-linux value-ip" title="<?= t('Linux Directory Permissions') ?>">
                            <?= $this->helper->supportHelper->getPermissionsLinux(PLUGINS_DIR) ?>
                        </span>
                        <span class="p-owner" title="<?= t('Directory Owner') ?>">
                            <?= $this->helper->supportHelper->getPermissionsOwner(PLUGINS_DIR) ?>
                        </span>
                    <?php else: ?>
                        <span class="p-dir" title="<?= t('Directory Permissions') ?>">
                            <?= $this->helper->supportHelper->getPermissions(PLUGINS_DIR) ?>
                        </span>
                        <span class="p-linux value-ip" title="<?= t('Linux Directory Permissions') ?>">
                            <?= $this->helper->supportHelper->getPermissionsLinux(PLUGINS_DIR) ?>
                        </span>
                        <span class="p-owner" title="<?= t('Directory Owner') ?>">
                            <?= $this->helper->supportHelper->getPermissionsOwner(PLUGINS_DIR) ?>
                        </span>
                    <?php endif ?>
                </div>
            <?php endif ?>
        </span>
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Plugins Directory URL') ?></li>
            <?php if (PLUGIN_API_URL == 'https://kanboard.org/plugins.json'): ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('Plugins will be listed from the default source') ?>">
                    <?= PLUGIN_API_URL ?>
                </li>
                <span class="pass-tick" title="<?= t('Plugins will be listed from the default source') ?>">&#10004;</span>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick privacy" title="<?= t('Plugins will be listed from a custom source') ?>">
                    <?= PLUGIN_API_URL ?>
                </li>
                <span class="pass-tick" title="<?= t('Plugins will be listed from a custom source') ?>">&#10004;</span>
            <?php endif ?>
        </span>
    </div>
</details>
<details class="accordion-section app-config">
    <summary class="accordion-title">
        <?= t('Directory Paths') ?>
    </summary>
    <div class="accordion-content">
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Data Directory') ?></li>
            <li class="app-info-value value-path border-bottom-thick privacy"><?= DATA_DIR ?></li>
            <?php if (!is_writable(DATA_DIR)): ?>
                <span class="fail-x" title="<?= t('This directory is not writeable by the web server user') ?>">&#10008;</span>
            <?php else: ?>
                <span class="pass-tick" title="<?= t('This directory is writeable by the web server user') ?>">&#10004;</span>
            <?php endif ?>
            <?php if ($this->user->isAdmin()): ?>
                <div id="pCheck" class="p-check">
                    <?php if (!is_writable(DATA_DIR)): ?>
                        <span class="p-dir" title="<?= t('Directory Permissions') ?>">
                            <?= $this->helper->supportHelper->getPermissions(DATA_DIR) ?>
                        </span>
                        <span class="p-linux value-ip" title="<?= t('Linux Directory Permissions') ?>">
                            <?= $this->helper->supportHelper->getPermissionsLinux(DATA_DIR) ?>
                        </span>
                        <span class="p-owner" title="<?= t('Directory Owner') ?>">
                            <?= $this->helper->supportHelper->getPermissionsOwner(DATA_DIR) ?>
                        </span>
                    <?php else: ?>
                        <span class="p-dir" title="<?= t('Directory Permissions') ?>">
                            <?= $this->helper->supportHelper->getPermissions(DATA_DIR) ?>
                        </span>
                        <span class="p-linux value-ip" title="<?= t('Linux Directory Permissions') ?>">
                            <?= $this->helper->supportHelper->getPermissionsLinux(DATA_DIR) ?>
                        </span>
                        <span class="p-owner" title="<?= t('Directory Owner') ?>">
                            <?= $this->helper->supportHelper->getPermissionsOwner(DATA_DIR) ?>
                        </span>
                    <?php endif ?>
                </div>
            <?php endif ?>
        </span>
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Files Directory') ?></li>
            <li class="app-info-value value-path border-bottom-thick privacy"><?= FILES_DIR ?></li>
            <?php if (!is_writable(FILES_DIR)): ?>
                <span class="fail-x" title="<?= t('This directory is not writeable by the web server user') ?>">&#10008;</span>
            <?php else: ?>
                <span class="pass-tick" title="<?= t('This directory is writeable by the web server user') ?>">&#10004;</span>
            <?php endif ?>
            <?php if ($this->user->isAdmin()): ?>
                <div id="pCheck" class="p-check">
                    <?php if (!is_writable(FILES_DIR)): ?>
                        <span class="p-dir" title="<?= t('Directory Permissions') ?>">
                            <?= $this->helper->supportHelper->getPermissions(FILES_DIR) ?>
                        </span>
                        <span class="p-linux value-ip" title="<?= t('Linux Directory Permissions') ?>">
                            <?= $this->helper->supportHelper->getPermissionsLinux(FILES_DIR) ?>
                        </span>
                        <span class="p-owner" title="<?= t('Directory Owner') ?>">
                            <?= $this->helper->supportHelper->getPermissionsOwner(FILES_DIR) ?>
                        </span>
                    <?php else: ?>
                        <span class="p-dir" title="<?= t('Directory Permissions') ?>">
                            <?= $this->helper->supportHelper->getPermissions(FILES_DIR) ?>
                        </span>
                        <span class="p-linux value-ip" title="<?= t('Linux Directory Permissions') ?>">
                            <?= $this->helper->supportHelper->getPermissionsLinux(FILES_DIR) ?>
                        </span>
                        <span class="p-owner" title="<?= t('Directory Owner') ?>">
                            <?= $this->helper->supportHelper->getPermissionsOwner(FILES_DIR) ?>
                        </span>
                    <?php endif ?>
                </div>
            <?php endif ?>
        </span>
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Cache Directory') ?></li>
            <li class="app-info-value value-path border-bottom-thick privacy"><?= CACHE_DIR ?></li>
            <?php if (!is_writable(CACHE_DIR)): ?>
                <span class="fail-x" title="<?= t('This directory is not writeable by the web server user') ?>">&#10008;</span>
            <?php else: ?>
                <span class="pass-tick" title="<?= t('This directory is writeable by the web server user') ?>">&#10004;</span>
            <?php endif ?>
            <?php if (CACHE_DRIVER == 'memory'): ?>
                <span class="p-note"><i><?= e('%s as Cache Driver is set to %s', '<strong>' . t('Not required') . '</strong>', '<code>memory</code>') ?></i></span>
            <?php else: ?>
                <?php if ($this->user->isAdmin()): ?>
                    <div id="pCheck" class="p-check">
                        <?php if (!is_writable(CACHE_DIR)): ?>
                            <span class="p-dir" title="<?= t('Directory Permissions') ?>">
                                <?= $this->helper->supportHelper->getPermissions(CACHE_DIR) ?>
                            </span>
                            <span class="p-linux value-ip" title="<?= t('Linux Directory Permissions') ?>">
                                <?= $this->helper->supportHelper->getPermissionsLinux(CACHE_DIR) ?>
                            </span>
                            <span class="p-owner" title="<?= t('Directory Owner') ?>">
                                <?= $this->helper->supportHelper->getPermissionsOwner(CACHE_DIR) ?>
                            </span>
                        <?php else: ?>
                            <span class="p-dir" title="<?= t('Directory Permissions') ?>">
                                <?= $this->helper->supportHelper->getPermissions(CACHE_DIR) ?>
                            </span>
                            <span class="p-linux value-ip" title="<?= t('Linux Directory Permissions') ?>">
                                <?= $this->helper->supportHelper->getPermissionsLinux(CACHE_DIR) ?>
                            </span>
                            <span class="p-owner" title="<?= t('Directory Owner') ?>">
                                <?= $this->helper->supportHelper->getPermissionsOwner(CACHE_DIR) ?>
                            </span>
                        <?php endif ?>
                    </div>
                <?php endif ?>
            <?php endif ?>
        </span>
    </div>
</details>
<details class="accordion-section app-config">
    <summary class="accordion-title">
        <?= t('Logs & Sessions') ?>
    </summary>
    <div class="accordion-content">
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Log File') ?></li>
            <li class="app-info-value value-path border-bottom-thick privacy"><?= LOG_FILE ?></li>
        </span>
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Session Handler') ?></li>
            <li class="app-info-value border-bottom-thick">
                <?php if (SESSION_HANDLER == 'php'): ?>
                    <span>PHP</span>
                <?php else: ?>
                    <span><?= t('Database') ?></span>
                <?php endif ?>
            </li>
        </span>
        <span class="data-wrap mt-0">
            <li class="app-info-title"><?= t('Session Duration') ?></li>
            <li class="app-info-value value-version border-bottom-thick">
                <?= SESSION_DURATION ?> <small><i><?= t('Until browser is closed') ?></i></small>
            </li>
        </span>
    </div>
</details>
<details class="accordion-section app-config">
    <summary class="accordion-title">
        <?= t('Login and Security Configuration') ?>
    </summary>
    <div class="accordion-content">
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Self-Signed Certificates') ?></li>
            <?php if (HTTP_VERIFY_SSL_CERTIFICATE == true): ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting. Change the value to \'false\' if your server is using self-signed security certificates.') ?>">
                    <?= t('Not Allowed') ?>
                </li>
                <span class="fail-x" title="<?= t('This is the default setting. Change the value to \'false\' if your server is using self-signed security certificates.') ?>">&#10008;</span>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('Correctly configured self-signed security certificates can be used') ?>">
                    <?= t('Allowed') ?>
                </li>
                <span class="pass-tick" title="<?= t('Correctly configured self-signed security certificates can be used') ?>">&#10004;</span>
            <?php endif ?>
        </span>
        <span class="data-wrap">
            <li class="app-info-title"><?= t('TOTP Issuer Name') ?></li>
            <?php if (TOTP_ISSUER == 'Kanboard'): ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>">
                    <?= TOTP_ISSUER ?>
                </li>
                <span class="pass-tick" title="<?= t('This is the default setting') ?>">&#10004;</span>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick">
                    <?= TOTP_ISSUER ?>
                </li>
            <?php endif ?>
        </span>
        <span class="data-wrap mt-0">
            <li class="app-info-title"><?= t('Excluded Fields During External Authentication') ?></li>
            <?php if (EXTERNAL_AUTH_EXCLUDE_FIELDS == 'username'): ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>">
                    <?= EXTERNAL_AUTH_EXCLUDE_FIELDS ?>
                </li>
                <span class="pass-tick" title="<?= t('This is the default setting') ?>">&#10004;</span>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick"><?= EXTERNAL_AUTH_EXCLUDE_FIELDS ?></li>
            <?php endif ?>
        </span>
        <fieldset class="brute-force-protection">
            <legend class=""><?= t('Brute Force Protection') ?></legend>
            <p class="">
                <?= t('When the login form is used, this feature works at the user account level. After numerous failed login attempts, the application shows a CAPTCHA image to prevent automated bot attacks. After further consistent failed attempts the user account is temporarily locked. Administrators can unlock users at any time from the user interface.') ?>
            </p>
            <span class="data-wrap">
                <li class="app-info-title">
                    <?= e('Enable %s After x Failed Logins', '<abbr title="' . t('Completely Automated Public Turing test to tell Computers and Humans Apart') . '">CAPTCHA</abbr>') ?>
                </li>
                <?php if (BRUTEFORCE_CAPTCHA == '3'): ?>
                    <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>">
                        <?= BRUTEFORCE_CAPTCHA ?>
                    </li>
                    <span class="pass-tick" title="<?= t('This is the default setting') ?>">&#10004;</span>
                <?php else: ?>
                    <li class="app-info-value border-bottom-thick"><?= BRUTEFORCE_CAPTCHA ?></li>
                <?php endif ?>
            </span>
            <span class="data-wrap">
                <li class="app-info-title"><?= t('Lock User Account After x Failed Logins') ?></li>
                <?php if (BRUTEFORCE_LOCKDOWN == '6'): ?>
                    <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>">
                        <?= BRUTEFORCE_LOCKDOWN ?>
                    </li>
                    <span class="pass-tick" title="<?= t('This is the default setting') ?>">&#10004;</span>
                <?php else: ?>
                    <li class="app-info-value border-bottom-thick"><?= BRUTEFORCE_LOCKDOWN ?></li>
                <?php endif ?>
            </span>
            <span class="data-wrap mt-0">
                <li class="app-info-title"><?= t('Locked User Account Duration') ?></li>
                <?php if (BRUTEFORCE_LOCKDOWN_DURATION == '15'): ?>
                    <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting in minutes') ?>">
                        <?= BRUTEFORCE_LOCKDOWN_DURATION ?>
                    </li>
                    <span class="pass-tick" title="<?= t('This is the default setting in minutes') ?>">&#10004;</span>
                <?php else: ?>
                    <li class="app-info-value border-bottom-thick" title="<?= t('This value is in minutes') ?>">
                        <?= BRUTEFORCE_LOCKDOWN_DURATION ?>
                    </li>
                <?php endif ?>
            </span>
            <p class="">
                <?= e('%s, the account must be unlocked using the login form.', '<strong>' . t('After three authentication failures through the user API') . '</strong>') ?>
            </p>
        </fieldset>
    </div>
</details>
<details class="accordion-section app-config">
    <summary class="accordion-title">
        <?= t('Group Memberships') ?>
    </summary>
    <div class="accordion-content">
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Show Group Memberships in User List') ?></li>
            <?php if (SHOW_GROUP_MEMBERSHIPS_IN_USERLIST == false): ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('Group memberships will not be shown') ?>">
                    <?= t('False') ?>
                </li>
                <span class="fail-x" title="<?= t('Group memberships will not be shown') ?>">&#10008;</span>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>">
                    <?= t('True') ?>
                </li>
                <span class="pass-tick" title="<?= t('This is the default setting') ?>">&#10004;</span>
            <?php endif ?>
        </span>
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Limit Group Memberships in User List') ?></li>
            <?php if (SHOW_GROUP_MEMBERSHIPS_IN_USERLIST_WITH_LIMIT == '7'): ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting. Set to \'0\' for all group memberships.') ?>">7</li>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('The default setting is 7. Set to \'0\' for all group memberships.') ?>">
                    <?= SHOW_GROUP_MEMBERSHIPS_IN_USERLIST_WITH_LIMIT ?>
                </li>
            <?php endif ?>
        </span>
    </div>
</details>
<details class="accordion-section app-config">
    <summary class="accordion-title">
        <?= t('Proxy Settings') ?>
    </summary>
    <div class="accordion-content">
        uuu
    </div>
</details>
