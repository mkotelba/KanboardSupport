<h2 class="">
    <i class="fa fa-file-code-o"></i> <?= t('Apache Web Server Information') ?>
</h2>
<div class="apache-info">
    <ul class="">
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Apache Version') ?></li>
            <li class="app-info-value value-version border-bottom-thick"><?= apache_get_version() ?></li>
        </span>
    </ul>
</div>
