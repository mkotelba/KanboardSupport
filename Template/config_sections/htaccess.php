<details class="accordion-section htaccess-config">
    <summary class="accordion-title">
        <i class="fa fa-file-code-o"></i> <?= t('Hypertext Access File') ?>
    </summary>
    <div class="accordion-content">
        <pre class="htaccess-file"><?= file_get_contents(ROOT_DIR . DIRECTORY_SEPARATOR . '.htaccess') ?></pre>
    </div>
</details>
