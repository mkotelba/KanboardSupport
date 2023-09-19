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
        <?= $this->render('KanboardSupport:config_sections/app-info') ?>
    </section>
    <!-- DATABASE CONNECTION -->
    <section id="DBSupportSection" class="support-section">
        <?= $this->render('KanboardSupport:config_sections/db-connection') ?>
    </section>
    <!-- EMAIL CONNECTION -->
    <section class="support-section">
        <?= $this->render('KanboardSupport:config_sections/email-connection') ?>
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
