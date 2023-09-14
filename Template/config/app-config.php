<details class="accordion-section app-config">
    <summary class="accordion-title">
        <?= t('Plugins Configuration') ?>
    </summary>
    <div class="accordion-content">
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Plugins Installer') ?></li>
            <li class="app-info-value border-bottom-thick">
                <?php if (PLUGIN_INSTALLER == false): ?>
                    <?= t('Disabled') ?>
                <?php else: ?>
                    <?= t('Enabled') ?>
                <?php endif ?>
            </li>
            <?php if (PLUGIN_INSTALLER == false): ?>
                <span class="fail-x" title="<?= t('Plugins cannot be installed. This is also set by default for security reasons.') ?>">&#10008;</span>
            <?php else: ?>
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
                <span class="p-note"><i><?= t('Not required as Cache Driver is set to') ?></i> <code>memory</code></span>
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
