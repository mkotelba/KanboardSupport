<h2 class="">
    <i class="fa fa-database"></i> <?= t('Database Connection') ?>
</h2>
<div class="db-info">
    <ul class="">
        <span class="data-wrap">
            <li class="db-info-title"><?= t('Database Driver') ?></li>
            <li class="db-info-value value-path border-bottom-thick"><?= DB_DRIVER ?></li>
        </span>
        <span class="data-wrap">
            <li class="db-info-title"><?= t('Database Version') ?></li>
            <li class="db-info-value value-version border-bottom-thick"><?= $this->text->e($db_version) ?></li>
        </span>
        <span class="data-wrap">
            <li class="db-info-title"><?= t('Database Username') ?></li>
            <li class="db-info-value value-path border-bottom-thick privacy"><?= DB_USERNAME ?></li>
        </span>
        <span class="data-wrap">
            <li class="db-info-title"><?= t('Database Hostname') ?></li>
            <?php if ($this->user->isAdmin()): ?>
                <li class="db-info-value value-code border-bottom-thick privacy">
                    <?= DB_HOSTNAME ?>
                </li>
            <?php else: ?>
                <li class="db-info-value value-code border-bottom-thick">
                    <?= $this->helper->supportHelper->maskIPAddress(DB_HOSTNAME) ?>
                </li>
            <?php endif ?>
        </span>
        <span class="data-wrap">
            <li class="db-info-title"><?= t('Database Port') ?></li>
            <?php if (DB_PORT != null): ?>
                <li class="db-info-value border-bottom-thick">
                    <?= DB_PORT ?>
                </li>
            <?php else: ?>
                <li class="db-info-value border-bottom-thick">
                    <?= t('Default') ?>
                </li>
            <?php endif ?>
        </span>
        <span class="data-wrap">
            <li class="db-info-title"><?= t('Database Name') ?></li>
            <li class="db-info-value value-path border-bottom-thick privacy"><?= DB_NAME ?></li>
        </span>
        <span class="data-wrap">
            <li class="db-info-title"><?= t('Database Migrations') ?></li>
            <?php if (DB_RUN_MIGRATIONS != true): ?>
                <li class="db-info-value border-bottom-thick" title="<?= t('Database migrations must be completed manually through the CLI') ?>">
                    <?= t('Use CLI') ?>
                </li>
                <span class="fail-x" title="<?= t('Database migrations must be completed manually through the CLI') ?>">&#10008;</span>
            <?php else: ?>
                <li class="db-info-value border-bottom-thick" title="<?= t('This is the default and recommended setting') ?>">
                    <?= t('Enabled') ?>
                </li>
                <span class="pass-tick" title="<?= t('This is the default and recommended setting') ?>">&#10004;</span>
            <?php endif ?>
        </span>
        <span class="data-wrap">
            <li class="db-info-title"><?= t('Database Timeout') ?></li>
            <?php if (DB_TIMEOUT != null): ?>
                <li class="db-info-value border-bottom-thick" title="<?= t('This value must be in seconds') ?>"><?= DB_TIMEOUT ?>s</li>
            <?php else: ?>
                <li class="db-info-value border-bottom-thick not-set" title="<?= t('This is the default and recommended setting. If set, the value must be in seconds.') ?>">
                    <?= t('Not Set') ?>
                </li>
                <span class="pass-tick" title="<?= t('This is the default and recommended setting. If set, the value must be in seconds.') ?>">&#10004;</span>
            <?php endif ?>
        </span>
        <?php if (DB_DRIVER === 'mysql'): ?>
            <details class="accordion-section mysql-ssl">
                <summary class="accordion-title">
                    <?= e('MySQL %s Connection', '<abbr title="' . t('Secure Sockets Layer') . '">SSL</abbr>') ?>
                </summary>
                <div class="accordion-content">
                    <p class="">
                        <?= e('These parameters must be defined in the configuration file in order to enable the MySQL %s connection. For most installations, it is safe to ignore this section.', '<abbr title="' . t('Secure Sockets Layer') . '">SSL</abbr>') ?>
                    </p>
                    <fieldset class="parameter-examples">
                        <legend><?= t('Parameter Examples') ?></legend>
                        <div class="ssl-example">
                            <dt><?= e('MySQL %s Key', '<abbr title="' . t('Secure Sockets Layer') . '">SSL</abbr>') ?></dt>
                            <dd><code class="event-code">define('DB_SSL_KEY', '<span class="pp-grey font-weight-bold">/path/to/client-key.pem</span>');</code></dd>
                        </div>
                        <div class="ssl-example">
                            <dt><?= e('MySQL %s Certificate', '<abbr title="' . t('Secure Sockets Layer') . '">SSL</abbr>') ?></dt>
                            <dd><code class="event-code">define('DB_SSL_CERT', '<span class="pp-grey font-weight-bold">/path/to/client-cert.pem</span>');</code></dd>
                        </div>
                        <div class="ssl-example">
                            <dt><?= e('MySQL %s Certificate Authority', '<abbr title="' . t('Secure Sockets Layer') . '">SSL</abbr>') ?></dt>
                            <dd><code class="event-code">define('DB_SSL_CA', '<span class="pp-grey font-weight-bold">/path/to/ca-cert.pem</span>');</code></dd>
                        </div>
                        <div class="ssl-example">
                            <dt><?= e('MySQL %s Server Verification', '<abbr title="' . t('Secure Sockets Layer') . '">SSL</abbr>') ?></dt>
                            <dd><code class="event-code">define('DB_VERIFY_SERVER_CERT', '<span class="pp-grey font-weight-bold">false</span>');</code></dd>
                        </div>
                    </fieldset>
                    <span class="data-wrap">
                        <li class="db-info-title"><?= e('MySQL %s Key', '<abbr title="' . t('Secure Sockets Layer') . '">SSL</abbr>') ?></li>
                        <?php if (DB_SSL_KEY != null): ?>
                            <?php if ($this->user->isAdmin()): ?>
                                <li class="db-info-value value-path border-bottom-thick privacy">
                                    <?= DB_SSL_KEY ?>
                                </li>
                            <?php else: ?>
                                <li class="db-info-value value-path border-bottom-thick">
                                    <?= $this->helper->supportHelper->maskPath(DB_SSL_KEY) ?>
                                </li>
                            <?php endif ?>
                        <?php else: ?>
                            <li class="db-info-value border-bottom-thick not-set" title="<?= t('This is the default setting') ?>">
                                <?= t('Not Set') ?>
                            </li>
                        <?php endif ?>
                    </span>
                    <span class="data-wrap">
                        <li class="db-info-title"><?= e('MySQL %s Certificate', '<abbr title="' . t('Secure Sockets Layer') . '">SSL</abbr>') ?></li>
                        <?php if (DB_SSL_CERT != null): ?>
                            <?php if ($this->user->isAdmin()): ?>
                                <li class="db-info-value value-path border-bottom-thick privacy">
                                    <?= DB_SSL_CERT ?>
                                </li>
                            <?php else: ?>
                                <li class="db-info-value value-path border-bottom-thick">
                                    <?= $this->helper->supportHelper->maskPath(DB_SSL_CERT) ?>
                                </li>
                            <?php endif ?>
                        <?php else: ?>
                            <li class="db-info-value border-bottom-thick not-set" title="<?= t('This is the default setting') ?>">
                                <?= t('Not Set') ?>
                            </li>
                        <?php endif ?>
                    </span>
                    <span class="data-wrap">
                        <li class="db-info-title"><?= e('MySQL %s Certificate Authority', '<abbr title="' . t('Secure Sockets Layer') . '">SSL</abbr>') ?></li>
                        <?php if (DB_SSL_CA != null): ?>
                            <?php if ($this->user->isAdmin()): ?>
                                <li class="db-info-value value-path border-bottom-thick privacy">
                                    <?= DB_SSL_CA ?>
                                </li>
                            <?php else: ?>
                                <li class="db-info-value value-path border-bottom-thick">
                                    <?= $this->helper->supportHelper->maskPath(DB_SSL_CA) ?>
                                </li>
                            <?php endif ?>
                        <?php else: ?>
                            <li class="db-info-value border-bottom-thick not-set" title="<?= t('This is the default setting') ?>">
                                <?= t('Not Set') ?>
                            </li>
                        <?php endif ?>
                    </span>
                    <span class="data-wrap">
                        <li class="db-info-title"><?= e('MySQL %s Server Verification', '<abbr title="' . t('Secure Sockets Layer') . '">SSL</abbr>') ?></li>
                        <?php if (DB_VERIFY_SERVER_CERT != null): ?>
                            <li class="db-info-value value-path border-bottom-thick privacy"><?= DB_VERIFY_SERVER_CERT ?></li>
                        <?php else: ?>
                            <li class="db-info-value border-bottom-thick not-set" title="<?= t('This is the default setting') ?>">
                                <?= t('Not Set') ?>
                            </li>
                        <?php endif ?>
                    </span>
                </div>
            </details>
        <?php endif ?>
        <?php if (DB_DRIVER === 'odbc'): ?>
            <span class="data-wrap">
                <li class="db-info-title"><?= t('ODBC Data Source Name') ?></li>
                <?php if (APP_VERSION >= '1.2.25'): ?>
                    <li class="db-info-value value-path border-bottom-thick privacy"><?= DB_ODBC_DSN ?></li>
                <?php else: ?>
                    <li class="db-info-value border-bottom-thick not-available" title="<?= e('This setting is available from %s', 'v1.2.25') ?>">
                        <?= t('Not available in this application version') ?>
                    </li>
                    <span class="fail-x" title="<?= e('This setting is available from %s', 'v1.2.25') ?>">&#10008;</span>
                <?php endif ?>
            </span>
        <?php endif ?>
    </ul>
    <?php if (DB_DRIVER === 'sqlite'): ?>
        <div class="panel">
            <ul class="">
                <li class="">
                    <?= t('Database Size') ?>
                    <strong><?= $this->text->bytes($db_size) ?></strong>
                </li>
                <li class="">
                    <?= $this->url->link(t('Download Database'), 'ConfigController', 'downloadDb', array(), true, 'btn btn-sm') ?>&nbsp;
                    (Gzip <?= t('compressed SQLite file') ?>)
                </li>
                <li class="">
                    <?= $this->url->link(t('Upload Database'), 'ConfigController', 'uploadDb', array(), false, 'js-modal-medium btn btn-sm') ?>
                </li>
                <li class="">
                    <?= $this->url->link(t('Optimize Database'), 'ConfigController', 'optimizeDb', array(), true, 'btn btn-sm') ?>&nbsp;
                    (VACUUM <?= t('command') ?>)
                </li>
            </ul>
        </div>
    <?php endif ?>
</div>
