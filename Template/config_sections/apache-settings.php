<h2 class="">
    <i class="fa fa-file-code-o"></i> <?= t('Apache Web Server Information') ?>
</h2>
<div class="apache-info">
    <ul class="">
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Apache Version') ?></li>
            <li class="app-info-value value-version border-bottom-thick"><?= apache_get_version() ?></li>
        </span>
        <details class="accordion-section apache-config">
            <summary class="accordion-title">
                <?= t('Apache Modules') ?>
            </summary>
            <div class="accordion-content">
                <ul class="apache-modules">
                    <?php foreach (apache_get_modules() as $module): ?>
                        <li class=""><?= $this->helper->supportHelper->embedSVGIcon('apache-logo-icon') ?> <?= $module ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        </details>
    </ul>
</div>
