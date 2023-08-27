<li <?= $this->app->checkMenuSelection('TechnicalSupportController', 'show', 'KanboardSupport') ?>>
    <?= $this->url->link(t('Configuration'), 'TechnicalSupportController', 'show', ['plugin' => 'KanboardSupport']) ?>
</li>
