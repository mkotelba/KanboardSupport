<li <?= $this->app->checkMenuSelection('TechnicalSupportController', 'show', 'KanboardSupport') ?>>
    <?= $this->url->link(t('Technical Information'), 'TechnicalSupportController', 'show', ['plugin' => 'KanboardSupport']) ?>
</li>
