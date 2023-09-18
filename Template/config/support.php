<?php
    $user = $this->user->getId();
    $user2 = $this->user->getFullname();
?>
<div class="config-page">
    <div class="page-header" style="margin-top: 10px;">
        <h2 class="">
            <?= $this->helper->supportHelper->embedSVGIcon('ks-icon') ?> <?= t('Application Configuration') ?>
        </h2>
    </div>
    <p class="">
        <?= e('This page shows all default and custom values from the configuration file stored in %s combined with application-specific settings detected from your server.', '<code class="field-code">/config.php</code>') ?>
    </p>
    <!-- PRIVACY WARNING -->
    <section class="message error privacy-warning">
        <header></header>
        <i class=""></i>
        <h3 class="">
            <span class="message-title"><?= t('Data Privacy') ?></span>
            <span class="message-text">
                <?= t('This page shows sensitive data. Always hide selective information before sharing.') ?>
            </span>
        </h3>
    </section>
    <button class="data-btn" title="<?= t('Screenshot friendly') ?>">
        <?= $this->helper->supportHelper->embedSVGIcon('privacy-icon') ?> <?= t('Hide Data') ?>
    </button>
    <!-- USER CONFIGURATION -->
    <section class="support-section">
        <?= $this->render('KanboardSupport:config_sections/user-config', array('user_agent' => $user_agent)) ?>
    </section>
    <!-- APPLICATION INFORMATION -->
    <section class="support-section">
        <h2 class="">
            <i class="fa fa-cog"></i> <?= t('Application Information') ?>
        </h2>
        <div class="app-info">
            <ul class="">
                <span class="data-wrap">
                    <li class="app-info-title"><?= t('Application Name') ?></li>
                    <li class="app-info-value border-bottom-thick privacy privacy-fw">Kanboard</li>
                </span>
                <span class="data-wrap">
                    <li class="app-info-title"><?= t('Version') ?></li>
                    <li class="app-info-value value-version border-bottom-thick"><?= APP_VERSION ?></li>
                </span>
                <?php if ($this->user->isAdmin()): ?>
                    <span class="data-wrap">
                        <li class="app-info-title"><?= t('Updates') ?></li>
                        <li class="app-info-value border-bottom-thick">
                            <a href="https://github.com/kanboard/kanboard/releases" class="kb-updates-link" target="_blank" rel="noopener noreferrer" title="<?= t('Opens in a new window') ?> &#8663;">
                                <i class="fa fa-external-link"></i> <?= t('Check for updates') ?>
                            </a>
                        </li>
                    </span>
                <?php endif ?>
                <span class="data-wrap">
                    <li class="app-info-title"><?= t('Debug Mode') ?></li>
                    <?php if (DEBUG == 'true'): ?>
                        <li class="app-info-value border-bottom-thick" title="<?= t('This setting will affect performance and should only be enabled for troubleshooting purposes') ?>">
                            <?= t('Enabled') ?>
                        </li>
                        <span class="fail-x" title="<?= t('This setting will affect performance and should only be enabled for troubleshooting purposes') ?>">&#10008;</span>
                    <?php else: ?>
                        <li class="app-info-value border-bottom-thick" title="<?= t('This is the default and recommended setting') ?>">
                            <?= t('Not Enabled') ?>
                        </li>
                        <span class="pass-tick" title="<?= t('This is the default and recommended setting') ?>">&#10004;</span>
                    <?php endif ?>
                </span>
                <br>
                <?php if ($this->user->isAdmin()): ?>
                    <p class="config-notice">
                        <?= t('This page contains all the configuration settings from the application config file. You can also view the raw contents of the config file as-is and also compare it to the default version.') ?> <strong><?= t('The raw config file will expose sensitive information which should not be shared.') ?></strong>
                    </p>
                    <div class="config-btns">
                        <?php if (file_exists(ROOT_DIR . DIRECTORY_SEPARATOR . 'config.php')): ?>
                            <button href="<?= $this->url->href('TechnicalSupportController', 'showCurrentRawConfigModal', array(
                                'plugin' => 'KanboardSupport'), false, '', false) ?>" class="btn config-btn config-btn-green js-modal-confirm" title="<?= t('The settings in this file apply to the current application environment') ?>">
                                <?= $this->helper->supportHelper->embedSVGIcon('raw-icon') ?> <?= t('Current Raw Config File') ?>
                            </button>
                        <?php else: ?>
                            <button href="<?= $this->url->href('TechnicalSupportController', 'showCurrentRawConfigModal', array(
                                'plugin' => 'KanboardSupport'), false, '', false) ?>" class="btn config-btn config-btn-red js-modal-confirm" title="<?= t('An active configuration file has not been detected. Make sure the filename is correct.') ?>" disabled>
                                <?= $this->helper->supportHelper->embedSVGIcon('raw-icon') ?> <?= t('Current Raw Config File') ?>
                            </button>
                        <?php endif ?>
                        <button href="<?= $this->url->href('TechnicalSupportController', 'showDefaultRawConfigModal', array(
                            'plugin' => 'KanboardSupport'), false, '', false) ?>" class="btn config-btn config-btn-red js-modal-confirm" title="<?= t('This file is for reference only') ?>">
                            <?= $this->helper->supportHelper->embedSVGIcon('raw-icon') ?> <?= t('Default Raw Config File') ?>
                        </button>
                    </div>
                <?php endif ?>
                <?= $this->render('KanboardSupport:config_sections/app-sections') ?>
            </ul>
        </div>
    </section>
    <!-- DATABASE CONNECTION -->
    <section id="DBSupportSection" class="support-section">
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
                            <?= t('MySQL SSL Connection') ?>
                        </summary>
                        <div class="accordion-content">
                            <p class="">
                                <?= t('These parameters must be defined in the configuration file in order to enable the MySQL SSL connection. For most installations, it is safe to ignore this section.') ?>
                            </p>
                            <fieldset class="parameter-examples">
                                <legend><?= t('Parameter Examples') ?></legend>
                                <div class="ssl-example">
                                    <dt><?= t('MySQL SSL Key') ?></dt>
                                    <dd><code class="event-code">define('DB_SSL_KEY', '<span class="pp-grey font-weight-bold">/path/to/client-key.pem</span>');</code></dd>
                                </div>
                                <div class="ssl-example">
                                    <dt><?= t('MySQL SSL Certificate') ?></dt>
                                    <dd><code class="event-code">define('DB_SSL_CERT', '<span class="pp-grey font-weight-bold">/path/to/client-cert.pem</span>');</code></dd>
                                </div>
                                <div class="ssl-example">
                                    <dt><?= t('MySQL SSL Certificate Authority') ?></dt>
                                    <dd><code class="event-code">define('DB_SSL_CA', '<span class="pp-grey font-weight-bold">/path/to/ca-cert.pem</span>');</code></dd>
                                </div>
                                <div class="ssl-example">
                                    <dt><?= t('MySQL SSL Server Verification') ?></dt>
                                    <dd><code class="event-code">define('DB_VERIFY_SERVER_CERT', '<span class="pp-grey font-weight-bold">false</span>');</code></dd>
                                </div>
                            </fieldset>
                            <span class="data-wrap">
                                <li class="db-info-title"><?= t('MySQL SSL Key') ?></li>
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
                                <li class="db-info-title"><?= t('MySQL SSL Certificate') ?></li>
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
                                <li class="db-info-title"><?= t('MySQL SSL Certificate Authority') ?></li>
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
                                <li class="db-info-title"><?= t('MySQL SSL Server Verification') ?></li>
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
    </section>
    <!-- EMAIL CONNECTION -->
    <section class="support-section">
        <h2 class="">
            <i class="fa fa-envelope"></i> <?= t('Email Connection') ?>
        </h2>
        <div class="mail-info">
            <ul class="">
                <span class="data-wrap">
                    <li class="mail-info-title"><?= t('Mail Configuration') ?></li>
                    <li class="mail-info-value border-bottom-thick">
                        <?php if (MAIL_CONFIGURATION == '1'): ?>
                            <?= t('Enabled') ?>
                        <?php else: ?>
                            <?= t('Disabled') ?>
                        <?php endif ?>
                    </li>
                </span>
                <span class="data-wrap">
                    <li class="mail-info-title"><?= t('Sender Email') ?></li>
                    <li class="mail-info-value border-bottom-thick privacy"><?= MAIL_FROM ?></li>
                </span>
                <?php if ($this->user->isAdmin()): ?>
                    <span class="data-wrap">
                        <li class="mail-info-title"><abbr title="Blind Carbon Copy">BCC</abbr></li>
                        <?php if (empty(MAIL_BCC)): ?>
                            <li class="mail-info-value border-bottom-thick not-set"><?= t('Not Set') ?></li>
                        <?php else: ?>
                            <li class="mail-info-value border-bottom-thick privacy"><?= MAIL_BCC ?></li>
                        <?php endif ?>
                    </span>
                <?php endif ?>
                <span class="data-wrap">
                    <li class="mail-info-title">
                        <abbr title="Mail Transport Agent"><?= t('Mail Transport') ?></abbr>
                    </li>
                    <li class="mail-info-value border-bottom-thick">
                        <?php if (MAIL_TRANSPORT == 'smtp'): ?>
                            SMTP
                        <?php elseif (MAIL_TRANSPORT == 'sendmail'): ?>
                            Sendmail
                        <?php elseif (MAIL_TRANSPORT == 'mail'): ?>
                            PHP Mail
                        <?php elseif (MAIL_TRANSPORT == 'postmark'): ?>
                            Postmark
                        <?php elseif (MAIL_TRANSPORT == 'Mailgun'): ?>
                            Mailgun
                        <?php elseif (MAIL_TRANSPORT == 'sendgrid'): ?>
                            SendGrid
                        <?php else: ?>
                            <?= t('Other') ?>
                        <?php endif ?>
                    </li>
                </span>
                <?php if (MAIL_TRANSPORT == 'smtp'): ?>
                    <span class="data-wrap">
                        <li class="mail-info-title"><?= t('Mail Server Hostname') ?></li>
                        <?php if ($this->user->isAdmin()): ?>
                            <li class="mail-info-value value-path border-bottom-thick privacy">
                                <?= MAIL_SMTP_HOSTNAME ?>
                            </li>
                        <?php else: ?>
                        <li class="mail-info-value value-path border-bottom-thick">
                            <?= $this->helper->supportHelper->maskServer(MAIL_SMTP_HOSTNAME) ?>
                            </li>
                        <?php endif ?>
                    </span>
                    <?php if (!empty(MAIL_SMTP_ENCRYPTION)): ?>
                        <span class="data-wrap">
                            <li class="mail-info-title">
                                <abbr title="Simple Mail Transport Protocol">SMTP</abbr> <?= t('Encryption') ?>
                            </li>
                            <?php if (MAIL_SMTP_ENCRYPTION == 'ssl'): ?>
                                <li class="mail-info-value border-bottom-thick">SSL</li>
                            <?php elseif (MAIL_SMTP_ENCRYPTION == 'tls'): ?>
                                <li class="mail-info-value border-bottom-thick">TLS</li>
                            <?php else: ?>
                                <li class="mail-info-value border-bottom-thick not-set"><?= t('Not Set') ?></li>
                            <?php endif ?>
                        </span>
                    <?php endif ?>
                    <span class="data-wrap">
                        <li class="mail-info-title">
                            <abbr title="Simple Mail Transport Protocol">SMTP</abbr> Port
                        </li>
                        <li class="mail-info-value value-path border-bottom-thick"><?= MAIL_SMTP_PORT ?></li>
                    </span>
                    <span class="data-wrap">
                        <li class="mail-info-title">
                            <abbr title="Simple Mail Transport Protocol"><?= t('SMTP Username') ?></abbr>
                        </li>
                        <li class="mail-info-value border-bottom-thick privacy"><?= MAIL_SMTP_USERNAME ?></li>
                    </span>
                    <span class="data-wrap">
                        <li class="mail-info-title">
                            <abbr title="Simple Mail Transport Protocol">SMTP</abbr> HELO <?= t('Command Name') ?>
                        </li>
                        <?php if (!empty(MAIL_SMTP_HELO_NAME)): ?>
                            <li class="mail-info-value border-bottom-thick"><?= MAIL_SMTP_HELO_NAME ?></li>
                        <?php else: ?>
                            <li class="mail-info-value border-bottom-thick not-set"><?= t('Not Set') ?></li>
                        <?php endif ?>
                    </span>
                <?php endif ?>
                <?php if (MAIL_TRANSPORT == 'sendmail'): ?>
                    <span class="data-wrap">
                        <li class="mail-info-title"><?= t('Sendmail Command') ?></li>
                        <li class="mail-info-value value-path border-bottom-thick"><?= MAIL_SENDMAIL_COMMAND ?></li>
                    </span>
                <?php endif ?>
            </ul>
        </div>
    </section>
    <!-- SERVER CONFIGURATION -->
    <section id="ServerConfig" class="support-section">
        <h2 class="">
            <i class="fa fa-server"></i> <?= t('Server Configuration') ?>
        </h2>
        <div class="server-info">
            <div class="server-col">
                <ul class="server-list">
                    <span class="data-wrap">
                        <li class="server-config server-config-title"><?= t('Operating System') ?></li>
                        <li class="server-value server-config-value border-bottom-thick">
                            <?= @php_uname('s') . ' ' . @php_uname('r') . ' ' . @php_uname('m') ?>
                        </li>
                    </span>
                    <span class="data-wrap">
                        <li class="server-config server-config-title">HTTP Client</li>
                        <li class="server-value server-config-value border-bottom-thick">
                            <?php if (Kanboard\Core\Http\Client::backend() == 'cURL'): ?>
                                <abbr title="<?= t('Client for URL') ?>"><?= Kanboard\Core\Http\Client::backend() ?></abbr>
                            <?php else: ?>
                                <?= Kanboard\Core\Http\Client::backend() ?>
                            <?php endif ?>
                        </li>
                    </span>
                    <span class="data-wrap">
                        <li class="server-config server-config-title" title="<?= t('Website Address') ?>"><?= t('Domain') ?></li>
                        <li class="server-value server-config-value border-bottom-thick value-url privacy"><?= $_SERVER['SERVER_NAME'] ?></li>
                    </span>
                    <span class="data-wrap">
                        <li class="server-config server-config-title"><?= t('Server IP Address') ?></li>
                        <?php if ($this->user->isAdmin()): ?>
                            <li class="server-value server-config-value border-bottom-thick value-ip privacy">
                                <?= $_SERVER['SERVER_ADDR'] ?>
                            </li>
                        <?php else: ?>
                            <li class="server-value server-config-value border-bottom-thick value-ip">
                                <?= $this->helper->supportHelper->maskIPAddress($_SERVER['SERVER_ADDR']) ?>
                            </li>
                        <?php endif ?>
                        <?php if ($this->user->isAdmin()): ?>
                            <a id="valueBTN" href="https://www.whois.com/whois/<?= $_SERVER['SERVER_ADDR'] ?>" class="value-btn privacy-delete" target="_blank" rel="noopener noreferrer" title="<?= t('Opens in a new window') ?> &#8663;">
                                <i class="fa fa-external-link"></i> <?= t('Lookup IP') ?>
                            </a>
                        <?php endif ?>
                    </span>
                    <span class="data-wrap">
                        <li class="server-config server-config-title">Server Port</li>
                        <?php if ($_SERVER['SERVER_PORT'] == '443'): ?>
                            <li class="server-value server-config-value border-bottom-thick value-ip" title="<?= t('SSL Secure Port') ?>">
                                <i class="fa fa-lock pp-green"></i> <?= $_SERVER['SERVER_PORT'] ?> https
                            </li>
                            <span class="pass-tick" title="<?= t('This is the default and recommended setting') ?>">&#10004;</span>
                        <?php else: ?>
                            <li class="server-value server-config-value border-bottom-thick value-ip" title="<?= t('Unsecure Port') ?>">
                                <i class="fa fa-unlock pp-red" title="<?= t('Unsecure http') ?>"></i> <?= $_SERVER['SERVER_PORT'] ?>
                            </li>
                            <span class="fail-x" title="<?= t('The site is not encrypted before being transmitted over the Internet. This port should be secured.') ?>">&#10008;</span>
                        <?php endif ?>
                    </span>
                    <span class="data-wrap">
                        <li class="server-config server-config-title"><?= t('System Temporary Directory') ?></li>
                        <li class="server-value server-config-value border-bottom-thick value-path"><?= sys_get_temp_dir() ?></li>
                    </span>
                    <span class="data-wrap">
                        <li class="server-config server-config-title">Document Root</li>
                        <?php if ($this->user->isAdmin()): ?>
                            <li class="server-value server-config-value border-bottom-thick value-path privacy">
                                <?= $_SERVER['DOCUMENT_ROOT'] ?>
                            </li>
                        <?php else: ?>
                            <li class="server-value server-config-value border-bottom-thick value-path">
                                <?= $this->helper->supportHelper->maskPath($_SERVER['DOCUMENT_ROOT']) ?>
                            </li>
                        <?php endif ?>
                        <?php if (!is_writable($_SERVER['DOCUMENT_ROOT'])): ?>
                            <span class="fail-x" title="<?= t('This directory is not writeable by the web server user') ?>">&#10008;</span>
                        <?php else: ?>
                            <span class="pass-tick" title="<?= t('This directory is writeable by the web server user') ?>">&#10004;</span>
                        <?php endif ?>
                        <?php if ($this->user->isAdmin()): ?>
                            <div id="pCheck" class="p-check">
                                <?php if (!is_writable($_SERVER['DOCUMENT_ROOT'])): ?>
                                    <span class="p-dir" title="<?= t('Directory Permissions') ?>">
                                        <?= $this->helper->supportHelper->getPermissions($_SERVER['DOCUMENT_ROOT']) ?>
                                    </span>
                                    <span class="p-linux value-ip" title="<?= t('Linux Directory Permissions') ?>">
                                        <?= $this->helper->supportHelper->getPermissionsLinux($_SERVER['DOCUMENT_ROOT']) ?>
                                    </span>
                                    <span class="p-owner" title="<?= t('Directory Owner') ?>">
                                        <?= $this->helper->supportHelper->getPermissionsOwner($_SERVER['DOCUMENT_ROOT']) ?>
                                    </span>
                                <?php else: ?>
                                    <span class="p-dir" title="<?= t('Directory Permissions') ?>">
                                        <?= $this->helper->supportHelper->getPermissions($_SERVER['DOCUMENT_ROOT']) ?>
                                    </span>
                                    <span class="p-linux value-ip" title="<?= t('Linux Directory Permissions') ?>">
                                        <?= $this->helper->supportHelper->getPermissionsLinux($_SERVER['DOCUMENT_ROOT']) ?>
                                    </span>
                                    <span class="p-owner" title="<?= t('Directory Owner') ?>">
                                        <?= $this->helper->supportHelper->getPermissionsOwner($_SERVER['DOCUMENT_ROOT']) ?>
                                    </span>
                                <?php endif ?>
                            </div>
                        <?php endif ?>
                    </span>
                    <span class="data-wrap">
                        <li class="server-config server-config-title">Session Save Path</li>
                        <li class="server-value server-config-value border-bottom-thick value-path"><?= session_save_path() ?></li>
                        <?php if (!is_writable(session_save_path())): ?>
                            <span class="fail-x" title="<?= t('This directory is not writeable by the web server user') ?>">&#10008;</span>
                        <?php else: ?>
                            <span class="pass-tick" title="<?= t('This directory is writeable by the web server user') ?>">&#10004;</span>
                        <?php endif ?>
                        <?php if ($this->user->isAdmin()): ?>
                            <div id="pCheck" class="p-check">
                                <?php if (!is_writable(session_save_path())): ?>
                                    <span class="p-dir" title="<?= t('Directory Permissions') ?>">
                                        <?= $this->helper->supportHelper->getPermissions(session_save_path()) ?>
                                    </span>
                                    <span class="p-linux value-ip" title="<?= t('Linux Directory Permissions') ?>">
                                        <?= $this->helper->supportHelper->getPermissionsLinux(session_save_path()) ?>
                                    </span>
                                    <span class="p-owner" title="<?= t('Directory Owner') ?>">
                                        <?= $this->helper->supportHelper->getPermissionsOwner(session_save_path()) ?>
                                    </span>
                                <?php else: ?>
                                    <span class="p-dir" title="<?= t('Directory Permissions') ?>">
                                        <?= $this->helper->supportHelper->getPermissions(session_save_path()) ?>
                                    </span>
                                    <span class="p-linux value-ip" title="<?= t('Linux Directory Permissions') ?>">
                                        <?= $this->helper->supportHelper->getPermissionsLinux(session_save_path()) ?>
                                    </span>
                                    <span class="p-owner" title="<?= t('Directory Owner') ?>">
                                        <?= $this->helper->supportHelper->getPermissionsOwner(session_save_path()) ?>
                                    </span>
                                <?php endif ?>
                            </div>
                        <?php endif ?>
                    </span>
                    <span class="data-wrap">
                        <li class="server-config server-config-title"><?= t('Absolute Path') ?></li>
                        <?php if ($this->user->isAdmin()): ?>
                            <li class="server-value server-config-value border-bottom-thick value-path privacy">
                                <?= $_SERVER['SCRIPT_FILENAME'] ?>
                            </li>
                        <?php else: ?>
                            <li class="server-value server-config-value border-bottom-thick value-path">
                                <?= $this->helper->supportHelper->maskPath($_SERVER['SCRIPT_FILENAME']) ?>
                            </li>
                        <?php endif ?>
                    </span>
                    <span class="data-wrap">
                        <li class="server-config server-config-title" title="<?= t('Common Gateway Interface') ?>">CGI <?= t('Version') ?></li>
                        <li class="server-value server-config-value border-bottom-thick"><?= $_SERVER['GATEWAY_INTERFACE'] ?></li>
                    </span>
                    <span class="data-wrap">
                        <li class="server-config server-config-title"><?= t('HTTP Web Server') ?></li>
                        <li class="server-value server-config-value border-bottom-thick"><?= $_SERVER['SERVER_SOFTWARE'] ?></li>
                    </span>
                    <span class="data-wrap">
                        <li class="server-config server-config-title"><?= t('Pretty URLs') ?></li>
                        <li class="server-value server-config-value border-bottom-thick">
                            <?php if ($this->user->isAdmin() && ($_SERVER['HTTP_MOD_REWRITE'] == 'On')): ?>
                                <?= t('On') ?> <span class="pass-tick-alt">&#10004;</span><code>HTTP_MOD_REWRITE</code>
                            <?php else: ?>
                                <?= t('Off') ?> <span class="fail-x-alt">&#10008;</span>
                            <?php endif ?>
                        </li>
                    </span>
                    <span class="data-wrap">
                        <li class="server-config server-config-title"><?= t('Server Protocol') ?></li>
                        <li class="server-value server-config-value border-bottom-thick"><?= $_SERVER['SERVER_PROTOCOL'] ?></li>
                    </span>
                    <span class="data-wrap">
                        <li class="server-config server-config-title"><?= t('Secure HTTP Protocol') ?></li>
                        <li class="server-value server-config-value border-bottom-thick">
                            <?php if ($_SERVER['HTTPS'] == 'on'): ?>
                                <?= t('Yes') ?> <span class="pass-tick-alt">&#10004;</span>
                            <?php else: ?>
                                <?= t('No') ?> <span class="pass-fail-x-alt">&#10004;</span>
                            <?php endif ?>
                        </li>
                    </span>
                </ul>
            </div>
        </div>
    </section>
    <!-- PHP INFORMATION -->
    <section class="support-section">
        <h2 class="">
            <i class="fa fa-code"></i> <?= t('PHP Information') ?>
        </h2>
        <div class="php-info">
            <ul class="">
                <span class="data-wrap">
                    <li class="app-info-title"><?= t('Version') ?></li>
                    <li class="app-info-value value-version border-bottom-thick">
                        <strong><abbr title="<?= t('Major Version') ?>"><?= PHP_MAJOR_VERSION ?></abbr></strong>.<abbr title="<?= t('Minor Version') ?>"><?= PHP_MINOR_VERSION ?></abbr>.<abbr title="<?= t('Release Version') ?>"><?= PHP_RELEASE_VERSION ?></abbr>
                    </li>
                    <?php if (version_compare(PHP_VERSION, '7.2.0', '<')): ?>
                        <span class="fail">
                            <span class="fail-x">&#10008;</span> <?= t('Less than minimum requirement') ?>
                        </span>
                    <?php else: ?>
                        <span class="pass"><span class="pass-tick">&#10004;</span> <?= t('Pass') ?></span>
                    <?php endif ?>
                </span>
                <span class="data-wrap">
                    <li class="app-info-title"><abbr title="PHP Server API">PHP SAPI</abbr></li>
                    <li class="app-info-value value border-bottom-thick"><?= PHP_SAPI ?></li>
                </span>
                <span class="data-wrap">
                    <li class="app-info-title">PHP <?= t('Config File Path') ?></li>
                    <li class="app-info-value value-path border-bottom-thick"><?= PHP_CONFIG_FILE_PATH ?></li>
                </span>
                <span class="data-wrap">
                    <li class="app-info-title">PHP <?= t('Config File Scan Directory') ?></li>
                    <li class="app-info-value value-path border-bottom-thick"><?= PHP_CONFIG_FILE_SCAN_DIR ?></li>
                </span>
                <span class="data-wrap">
                    <li class="app-info-title">PHP <?= t('Loaded Configuration File') ?></li>
                    <li class="app-info-value value-path border-bottom-thick"><?= php_ini_loaded_file() ?></li>
                </span>
            </ul>
        </div>
        <!-- gd -->
        <div class="tile-wrapper">
            <div class="tile-name" title="<?= t('PHP Extension Name') ?>"><code>gd</code></div>
            <div class="tile-version value-version" title="<?= t('Version') ?>">
                <?php if (extension_loaded('gd')): ?>
                    <span class="value-version"><?= phpversion('gd') ?></span>
                <?php else: ?>
                    <span class="value-version"><?= t('Not Detected') ?></span>
                <?php endif ?>
            </div>
            <?php if (!extension_loaded('gd')): ?>
                <div class="tile-required" title=""><?= t('Required') ?></div>
            <?php endif ?>
            <div class="tile-icon" title="<?= t('PHP Extension') ?>"><i class="fa fa-cogs i-fw"></i></div>
            <span class="tile-check">
                <?php if (extension_loaded('gd')): ?>
                    <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
                <?php else: ?>
                    <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
                <?php endif ?>
            </span>
        </div>
        <!-- mbstring -->
        <div class="tile-wrapper">
            <div class="tile-name" title="<?= t('PHP Extension Name') ?>"><code>mbstring</code></div>
            <div class="tile-version value-version" title="<?= t('Version') ?>">
                <?php if (extension_loaded('mbstring')): ?>
                    <span class="value-version"><?= phpversion('mbstring') ?></span>
                <?php else: ?>
                    <span class="value-version"><?= t('Not Detected') ?></span>
                <?php endif ?>
            </div>
            <?php if (!extension_loaded('mbstring')): ?>
                <div class="tile-required" title=""><?= t('Required') ?></div>
            <?php endif ?>
            <div class="tile-icon" title="<?= t('PHP Extension') ?>"><i class="fa fa-cogs i-fw"></i></div>
            <span class="tile-check">
                <?php if (extension_loaded('mbstring')): ?>
                    <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
                <?php else: ?>
                    <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
                <?php endif ?>
            </span>
        </div>
        <!-- hash -->
        <div class="tile-wrapper">
            <div class="tile-name" title="<?= t('PHP Extension Name') ?>"><code>hash</code></div>
            <div class="tile-version value-version" title="<?= t('Version') ?>">
                <?php if (extension_loaded('hash')): ?>
                    <span class="value-version"><?= phpversion('hash') ?></span>
                <?php else: ?>
                    <span class="value-version"><?= t('Not Detected') ?></span>
                <?php endif ?>
            </div>
            <?php if (!extension_loaded('hash')): ?>
                <div class="tile-required" title=""><?= t('Required') ?></div>
            <?php endif ?>
            <div class="tile-icon" title="<?= t('PHP Extension') ?>"><i class="fa fa-cogs i-fw"></i></div>
            <span class="tile-check">
                <?php if (extension_loaded('hash')): ?>
                    <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
                <?php else: ?>
                    <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
                <?php endif ?>
            </span>
        </div>
        <!-- openssl -->
        <div class="tile-wrapper">
            <div class="tile-name" title="<?= t('PHP Extension Name') ?>"><code>openssl</code></div>
            <div class="tile-version value-version" title="<?= t('Version') ?>">
                <?php if (extension_loaded('openssl')): ?>
                    <span class="value-version"><?= phpversion('openssl') ?></span>
                <?php else: ?>
                    <span class="value-version"><?= t('Not Detected') ?></span>
                <?php endif ?>
            </div>
            <?php if (!extension_loaded('openssl')): ?>
                <div class="tile-required" title=""><?= t('Required') ?></div>
            <?php endif ?>
            <div class="tile-icon" title="<?= t('PHP Extension') ?>"><i class="fa fa-cogs i-fw"></i></div>
            <span class="tile-check">
                <?php if (extension_loaded('openssl')): ?>
                    <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
                <?php else: ?>
                    <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
                <?php endif ?>
            </span>
        </div>
        <!-- json -->
        <div class="tile-wrapper">
            <div class="tile-name" title="<?= t('PHP Extension Name') ?>"><code>json</code></div>
            <div class="tile-version value-version" title="<?= t('Version') ?>">
                <?php if (extension_loaded('json')): ?>
                    <span class="value-version"><?= phpversion('json') ?></span>
                <?php else: ?>
                    <span class="value-version"><?= t('Not Detected') ?></span>
                <?php endif ?>
            </div>
            <?php if (!extension_loaded('json')): ?>
                <div class="tile-required" title=""><?= t('Required') ?></div>
            <?php endif ?>
            <div class="tile-icon" title="<?= t('PHP Extension') ?>"><i class="fa fa-cogs i-fw"></i></div>
            <span class="tile-check">
                <?php if (extension_loaded('json')): ?>
                    <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
                <?php else: ?>
                    <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
                <?php endif ?>
            </span>
        </div>
        <!-- ctype -->
        <div class="tile-wrapper">
            <div class="tile-name" title="<?= t('PHP Extension Name') ?>"><code>ctype</code></div>
            <div class="tile-version value-version" title="<?= t('Version') ?>">
                <?php if (extension_loaded('ctype')): ?>
                    <span class="value-version"><?= phpversion('ctype') ?></span>
                <?php else: ?>
                    <span class="value-version"><?= t('Not Detected') ?></span>
                <?php endif ?>
            </div>
            <?php if (!extension_loaded('ctype')): ?>
                <div class="tile-required" title=""><?= t('Required') ?></div>
            <?php endif ?>
            <div class="tile-icon" title="<?= t('PHP Extension') ?>"><i class="fa fa-cogs i-fw"></i></div>
            <span class="tile-check">
                <?php if (extension_loaded('ctype')): ?>
                    <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
                <?php else: ?>
                    <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
                <?php endif ?>
            </span>
        </div>
        <!-- filter -->
        <div class="tile-wrapper">
            <div class="tile-name" title="<?= t('PHP Extension Name') ?>"><code>filter</code></div>
            <div class="tile-version value-version" title="<?= t('Version') ?>">
                <?php if (extension_loaded('filter')): ?>
                    <span class="value-version"><?= phpversion('filter') ?></span>
                <?php else: ?>
                    <span class="value-version"><?= t('Not Detected') ?></span>
                <?php endif ?>
            </div>
            <?php if (!extension_loaded('filter')): ?>
                <div class="tile-required" title=""><?= t('Required') ?></div>
            <?php endif ?>
            <div class="tile-icon" title="<?= t('PHP Extension') ?>"><i class="fa fa-cogs i-fw"></i></div>
            <span class="tile-check">
                <?php if (extension_loaded('filter')): ?>
                    <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
                <?php else: ?>
                    <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
                <?php endif ?>
            </span>
        </div>
        <!-- session -->
        <div class="tile-wrapper">
            <div class="tile-name" title="<?= t('PHP Extension Name') ?>"><code>session</code></div>
            <div class="tile-version value-version" title="<?= t('Version') ?>">
                <?php if (extension_loaded('session')): ?>
                    <span class="value-version"><?= phpversion('session') ?></span>
                <?php else: ?>
                    <span class="value-version"><?= t('Not Detected') ?></span>
                <?php endif ?>
            </div>
            <?php if (!extension_loaded('session')): ?>
                <div class="tile-required" title=""><?= t('Required') ?></div>
            <?php endif ?>
            <div class="tile-icon" title="<?= t('PHP Extension') ?>"><i class="fa fa-cogs i-fw"></i></div>
            <span class="tile-check">
                <?php if (extension_loaded('session')): ?>
                    <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
                <?php else: ?>
                    <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
                <?php endif ?>
            </span>
        </div>
        <!-- dom -->
        <div class="tile-wrapper">
            <div class="tile-name" title="<?= t('PHP Extension Name') ?>"><code>dom</code></div>
            <div class="tile-version value-version" title="<?= t('Version') ?>">
                <?php if (extension_loaded('dom')): ?>
                    <span class="value-version"><?= phpversion('dom') ?></span>
                <?php else: ?>
                    <span class="value-version"><?= t('Not Detected') ?></span>
                <?php endif ?>
            </div>
            <?php if (!extension_loaded('dom')): ?>
                <div class="tile-required" title=""><?= t('Required') ?></div>
            <?php endif ?>
            <div class="tile-icon" title="<?= t('PHP Extension') ?>"><i class="fa fa-cogs i-fw"></i></div>
            <span class="tile-check">
                <?php if (extension_loaded('dom')): ?>
                    <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
                <?php else: ?>
                    <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
                <?php endif ?>
            </span>
        </div>
        <!-- SimpleXML -->
        <div class="tile-wrapper">
            <div class="tile-name" title="<?= t('PHP Extension Name') ?>"><code>SimpleXML</code></div>
            <div class="tile-version value-version" title="<?= t('Version') ?>">
                <?php if (extension_loaded('SimpleXML')): ?>
                    <span class="value-version"><?= phpversion('SimpleXML') ?></span>
                <?php else: ?>
                    <span class="value-version"><?= t('Not Detected') ?></span>
                <?php endif ?>
            </div>
            <?php if (!extension_loaded('SimpleXML')): ?>
                <div class="tile-required" title=""><?= t('Required') ?></div>
            <?php endif ?>
            <div class="tile-icon" title="<?= t('PHP Extension') ?>"><i class="fa fa-cogs i-fw"></i></div>
            <span class="tile-check">
                <?php if (extension_loaded('SimpleXML')): ?>
                    <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
                <?php else: ?>
                    <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
                <?php endif ?>
            </span>
        </div>
        <!-- xml -->
        <div class="tile-wrapper">
            <div class="tile-name" title="<?= t('PHP Extension Name') ?>"><code>xml</code></div>
            <div class="tile-version value-version" title="<?= t('Version') ?>">
                <?php if (extension_loaded('xml')): ?>
                    <span class="value-version"><?= phpversion('xml') ?></span>
                <?php else: ?>
                    <span class="value-version"><?= t('Not Detected') ?></span>
                <?php endif ?>
            </div>
            <?php if (!extension_loaded('xml')): ?>
                <div class="tile-required" title=""><?= t('Required') ?></div>
            <?php endif ?>
            <div class="tile-icon" title="<?= t('PHP Extension') ?>"><i class="fa fa-cogs i-fw"></i></div>
            <span class="tile-check">
                <?php if (extension_loaded('xml')): ?>
                    <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
                <?php else: ?>
                    <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
                <?php endif ?>
            </span>
        </div>
        <!-- zip -->
        <div class="tile-wrapper">
            <div class="tile-name" title="<?= t('PHP Extension Name') ?>"><code>zip</code></div>
            <div class="tile-version value-version" title="<?= t('Version') ?>">
                <?php if (extension_loaded('zip')): ?>
                    <span class="value-version"><?= phpversion('zip') ?></span>
                <?php else: ?>
                    <span class="value-version"><?= t('Not Detected') ?></span>
                <?php endif ?>
            </div>
            <div class="tile-optional" title=""><?= t('Optional') ?></div>
            <div class="tile-icon" title="<?= t('PHP Extension') ?>"><i class="fa fa-cogs i-fw"></i></div>
            <span class="tile-check">
                <?php if (extension_loaded('zip')): ?>
                    <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
                <?php else: ?>
                    <span class="tile-fail-x" title="<?= t('Optional Extension') ?>">&#10008;</span>
                <?php endif ?>
            </span>
        </div>
        <!-- ldap -->
        <div class="tile-wrapper">
            <div class="tile-name" title="<?= t('PHP Extension Name') ?>"><code>ldap</code></div>
            <div class="tile-version value-version" title="<?= t('Version') ?>">
                <?php if (extension_loaded('ldap')): ?>
                    <span class="value-version"><?= phpversion('ldap') ?></span>
                <?php else: ?>
                    <span class="value-version"><?= t('Not Detected') ?></span>
                <?php endif ?>
            </div>
            <div class="tile-optional" title=""><?= t('Optional') ?></div>
            <div class="tile-icon" title="<?= t('PHP Extension') ?>"><i class="fa fa-cogs i-fw"></i></div>
            <span class="tile-check">
                <?php if (extension_loaded('ldap')): ?>
                    <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
                <?php else: ?>
                    <span class="tile-fail-x" title="<?= t('Optional Extension') ?>">&#10008;</span>
                <?php endif ?>
            </span>
        </div>
        <!-- curl -->
        <div class="tile-wrapper">
            <div class="tile-name" title="<?= t('PHP Extension Name') ?>"><code>curl</code></div>
            <div class="tile-version value-version" title="<?= t('Version') ?>">
                <?php if (extension_loaded('curl')): ?>
                    <span class="value-version"><?= phpversion('curl') ?></span>
                <?php else: ?>
                    <span class="value-version"><?= t('Not Detected') ?></span>
                <?php endif ?>
            </div>
            <div class="tile-optional" title=""><?= t('Optional') ?></div>
            <div class="tile-icon" title="<?= t('PHP Extension') ?>"><i class="fa fa-cogs i-fw"></i></div>
            <span class="tile-check">
                <?php if (extension_loaded('curl')): ?>
                    <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
                <?php else: ?>
                    <span class="tile-fail-x" title="<?= t('Optional Extension') ?>">&#10008;</span>
                <?php endif ?>
            </span>
        </div>
        <!-- PDO Extension -->
        <div class="tile-wrapper">
            <div class="tile-name" title="<?= t('PHP Extension Name') ?>">
                <?php if (DB_DRIVER === 'mysql'): ?>
                    <code>pdo_mysql</code>
                <?php elseif (DB_DRIVER === 'postgres'): ?>
                    <code>pdo_pgsql</code>
                <?php elseif (DB_DRIVER === 'sqlite'): ?>
                    <code>pdo_sqlite</code>
                <?php else: ?>
                    <code><?= t('Not Detected') ?></code>
                <?php endif ?>
            </div>
            <div class="tile-version value-version" title="<?= t('Version') ?>">
                <?php if (DB_DRIVER === 'mysql' && !extension_loaded('pdo_mysql')): ?>
                    <small><?= t('Missing PDO Extension') ?></small>
                <?php else: ?>
                    <?= phpversion('pdo_mysql') ?>
                <?php endif ?>
                <?php if (DB_DRIVER === 'postgres' && !extension_loaded('pdo_pgsql')): ?>
                    <small><?= t('Missing PDO Extension') ?></small>
                <?php else: ?>
                    <?= phpversion('pdo_pgsql') ?>
                <?php endif ?>
                <?php if (DB_DRIVER === 'sqlite' && !extension_loaded('pdo_sqlite')): ?>
                    <small><?= t('Missing PDO Extension') ?></small>
                <?php else: ?>
                    <?= phpversion('pdo_sqlite') ?>
                <?php endif ?>
            </div>
            <?php if (DB_DRIVER === 'mysql'): ?>
                <div class="tile-detected" title=""><?= t('MySQL Detected') ?></div>
            <?php endif ?>
            <?php if (DB_DRIVER === 'postgres'): ?>
                <div class="tile-detected" title=""><?= t('PostgreSQL Detected') ?></div>
            <?php endif ?>
            <?php if (DB_DRIVER === 'sqlite'): ?>
                <div class="tile-detected" title=""><?= t('SQLite Detected') ?></div>
            <?php endif ?>
            <div class="tile-icon" title="<?= t('PHP Extension') ?>"><i class="fa fa-cogs i-fw"></i></div>
            <span class="tile-check">
                <?php if (DB_DRIVER === 'mysql' && !extension_loaded('pdo_mysql')): ?>
                    <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
                <?php elseif (DB_DRIVER === 'postgres' && !extension_loaded('pdo_pgsql')): ?>
                    <span class="tile-check">
                        <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
                    </span>
                <?php elseif (DB_DRIVER === 'sqlite' && !extension_loaded('pdo_sqlite')): ?>
                    <span class="tile-check">
                        <span class="tile-fail-x" title="<?= t('Required Extension') ?>">&#10008;</span>
                    </span>
                <?php else: ?>
                    <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
                <?php endif ?>
            </span>
        </div>
        <!-- imap -->
        <div class="tile-wrapper tile-optional-hover">
            <div class="tile-hover-plugin">
                <div class="tile-hover-plugin-text-wrapper">
                    <div class="tile-hover-plugin-text"><?= t('Required for the Mailmagik plugin') ?></div>
                </div>
            </div>
            <div class="tile-name" title="<?= t('PHP Extension Name') ?>"><code>imap</code></div>
            <div class="tile-version value-version" title="<?= t('Version') ?>">
                <?php if (extension_loaded('imap')): ?>
                    <span class="value-version"><?= phpversion('imap') ?></span>
                <?php else: ?>
                    <span class="value-version"><?= t('Not Detected') ?></span>
                <?php endif ?>
            </div>
            <?php if (!file_exists('plugins/Mailmagik')): ?>
                <div class="tile-optional" title=""><?= t('Optional') ?></div>
            <?php endif ?>
            <div class="tile-icon" title="<?= t('PHP Extension') ?>"><i class="fa fa-cogs i-fw"></i></div>
            <span class="tile-check">
                <?php if (extension_loaded('imap')): ?>
                    <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
                <?php else: ?>
                    <span class="tile-fail-x" title="<?= t('Optional Extension') ?>">&#10008;</span>
                <?php endif ?>
            </span>
        </div>
        <!-- fileinfo -->
        <div class="tile-wrapper tile-optional-hover">
            <div class="tile-hover-plugin">
                <div class="tile-hover-plugin-text-wrapper">
                    <div class="tile-hover-plugin-text"><?= t('Required for the Mailmagik plugin') ?></div>
                </div>
            </div>
            <div class="tile-name" title="<?= t('PHP Extension Name') ?>"><code>fileinfo</code></div>
            <div class="tile-version value-version" title="<?= t('Version') ?>">
                <?php if (extension_loaded('fileinfo')): ?>
                    <span class="value-version"><?= phpversion('fileinfo') ?></span>
                <?php else: ?>
                    <span class="value-version"><?= t('Not Detected') ?></span>
                <?php endif ?>
            </div>
            <?php if (!file_exists('plugins/Mailmagik')): ?>
                <div class="tile-optional" title=""><?= t('Optional') ?></div>
            <?php endif ?>
            <div class="tile-icon" title="<?= t('PHP Extension') ?>"><i class="fa fa-cogs i-fw"></i></div>
            <span class="tile-check">
                <?php if (extension_loaded('fileinfo')): ?>
                    <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
                <?php else: ?>
                    <span class="tile-fail-x" title="<?= t('Optional Extension') ?>">&#10008;</span>
                <?php endif ?>
            </span>
        </div>
        <!-- iconv -->
        <div class="tile-wrapper tile-optional-hover">
            <div class="tile-hover-plugin">
                <div class="tile-hover-plugin-text-wrapper">
                    <div class="tile-hover-plugin-text"><?= t('Required for the Mailmagik plugin') ?></div>
                </div>
            </div>
            <div class="tile-name" title="<?= t('PHP Extension Name') ?>"><code>iconv</code></div>
            <div class="tile-version value-version" title="<?= t('Version') ?>">
                <?php if (extension_loaded('iconv')): ?>
                    <span class="value-version"><?= phpversion('iconv') ?></span>
                <?php else: ?>
                    <span class="value-version"><?= t('Not Detected') ?></span>
                <?php endif ?>
            </div>
            <?php if (!file_exists('plugins/Mailmagik')): ?>
                <div class="tile-optional" title=""><?= t('Optional') ?></div>
            <?php endif ?>
            <div class="tile-icon" title="<?= t('PHP Extension') ?>"><i class="fa fa-cogs i-fw"></i></div>
            <span class="tile-check">
                <?php if (extension_loaded('iconv')): ?>
                    <span class="tile-pass" title="<?= t('Pass') ?>">&#10004;</span>
                <?php else: ?>
                    <span class="tile-fail-x" title="<?= t('Optional Extension') ?>">&#10008;</span>
                <?php endif ?>
            </span>
        </div>
    </section>
</div>
