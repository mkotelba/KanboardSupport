<details class="accordion-section apache-config">
    <summary class="accordion-title">
        <?= $this->helper->supportHelper->embedSVGIcon('apache-logo-accordion-icon') ?> <?= t('Apache Web Server Information') ?>
    </summary>
    <div class="accordion-content apache-info">
        <ul class="">
            <span class="data-wrap">
                <li class="app-info-title"><?= t('Apache Version') ?></li>
                <li class="app-info-value value-version border-bottom-thick"><?= apache_get_version() ?></li>
            </span>
            <div class="">
                <h4 class=""><?= t('Apache Modules') ?></h4>
                <div class="">
                    <ul class="apache-modules">
                        <?php foreach (apache_get_modules() as $module): ?>
                            <li class="">
                                <?= $this->helper->supportHelper->embedSVGIcon('apache-logo-icon') ?>
                                <?php if ($module == 'mod_rewrite'): ?>
                                    <strong title="<?= t('Required for URL Rewriting') ?>"><?= $module ?></strong>
                                <?php else: ?>
                                    <?= $module ?>
                                <?php endif ?>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </ul>
    </div>
</details>
