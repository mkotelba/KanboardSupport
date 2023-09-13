<!-- KanboardSupport Plugin -->
<div class="webhooks-page">
    <div class="page-header" style="margin-top: 10px;">
        <h2 class=""><span class="webhooks-icon"></span> <?= t('Connecting External Applications') ?></h2>
    </div>
    <div class="webhooks-page-intro">
        <?= t('Webhooks are useful to perform actions with external applications such as:') ?>
        <ul class="fa-ul">
            <li class="">
                <i class="fa-li fa fa-check-square pp-green"></i>
                <?= t('Using webhooks to create a task by calling a simple URL') ?>
            </li>
            <li class="">
                <i class="fa-li fa fa-check-square pp-green"></i>
                <?= t('Automatically calling an external URL when an event occurs in this application (e.g. task creation, comment updated, etc.)') ?>
            </li>
        </ul>
        <?= e('To view the list of supported events or see some examples, visit the %s page', $this->url->link(t('Webhooks Information'), 'TechnicalSupportController', 'showWebhookInformation', array('plugin' => 'KanboardSupport'), false, 'webhooks-link', t('Visit page'))) ?>
    </div>
    <div class="page-header margin-top">
        <h2 class=""><span class="webhooks-icon"></span> <?= t('Webhook Token') ?></h2>
    </div>
    <section class="message error cleaner-warning">
        <header></header>
        <i class=""></i>
        <h3 class="">
            <span class="message-title"><?= t('Warning') ?></span>
            <span class="message-text"><?= t('Resetting the webhook token may require the cron background jobs to be manually updated') ?></span>
        </h3>
    </section>
    <div class="panel">
        <span class="webhooks-icon"></span> <?= t('Token:') ?>
        <strong><?= $this->text->e($values['webhook_token']) ?></strong>
        <?= $this->url->link(t('Reset Token'), 'ConfigController', 'token', array('type' => 'webhook'), true, 'btn btn-red') ?>
    </div>
    <fieldset>
        <legend><?= t('Add Webhook') ?></legend>
        <form method="post" class="" action="<?= $this->url->href('ConfigController', 'save', array('redirect' => 'webhook')) ?>" autocomplete="true">
            <?= $this->form->csrf() ?>

            <?= $this->form->label(t('Webhook URL'), 'webhook_url') ?>
            <?= $this->form->text('webhook_url', $values, $errors) ?>

            <div class="form-actions">
                <button type="submit" class="btn btn-blue"><?= t('Save') ?></button>
            </div>
        </form>
    </fieldset>
</div>
