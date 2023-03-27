<!-- KanboardSupport -->
<div class="page-header">
    <h2 class=""><?= t('Webhook settings') ?></h2>
</div>
<form method="post" class="" action="<?= $this->url->href('ConfigController', 'save', array('redirect' => 'webhook')) ?>" autocomplete="off">
    <?= $this->form->csrf() ?>

    <?= $this->form->label(t('Webhook URL'), 'webhook_url') ?>
    <?= $this->form->text('webhook_url', $values, $errors) ?>

    <div class="form-actions">
        <button type="submit" class="btn btn-blue"><?= t('Save') ?></button>
    </div>
</form>

<div class="page-header margin-top">
    <h2 class=""><?= t('Webhook token') ?></h2>
</div>
<section class="message error cleaner-warning">
            <header></header>
            <i class=""></i>
            <h3 class="">
                <span class="message-title"><?= t('Warning') ?></span>
                <span class="message-text"><?= t('Resetting the webhook token may need to be manually updated in the cron background jobs') ?></span>
            </h3>
        </section>
<div class="panel">
    <?= t('Webhook token:') ?>
    <strong><?= $this->text->e($values['webhook_token']) ?></strong>
</div>

<?= $this->url->link(t('Reset token'), 'ConfigController', 'token', array('type' => 'webhook'), true, 'btn btn-red') ?>
