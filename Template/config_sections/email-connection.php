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
                        <li class="mail-info-value border-bottom-thick"><abbr title="<?= t('Secure Sockets Layer') ?>">SSL</abbr></li>
                    <?php elseif (MAIL_SMTP_ENCRYPTION == 'tls'): ?>
                        <li class="mail-info-value border-bottom-thick"><abbr title="<?= t('Transport Layer Security') ?>">TLS</abbr></li>
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
                    <?= e('%s Username', '<abbr title="' . t('Simple Mail Transport Protocol') . '">SMTP</abbr>') ?>
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
