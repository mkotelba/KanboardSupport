<!-- KanboardSupport Plugin -->
<div class="webhooks-info-page">
    <section class="">
        <div id="SupportedEvents" class="page-header" style="margin-top: 10px;">
            <h2 class=""><span class="webhooks-icon"></span> <?= t('Supported Events') ?></h2>
        </div>
        <ul class="">
            <li class=""><code>comment.create</code></li>
            <li class=""><code>comment.update</code></li>
            <li class=""><code>comment.delete</code></li>
            <li class=""><code>file.create</code></li>
            <li class=""><code>task.move.project</code></li>
            <li class=""><code>task.move.column</code></li>
            <li class=""><code>task.move.position</code></li>
            <li class=""><code>task.move.swimlane</code></li>
            <li class=""><code>task.update</code></li>
            <li class=""><code>task.create</code></li>
            <li class=""><code>task.close</code></li>
            <li class=""><code>task.open</code></li>
            <li class=""><code>task.assignee_change</code></li>
            <li class=""><code>subtask.update</code></li>
            <li class=""><code>subtask.create</code></li>
            <li class=""><code>subtask.delete</code></li>
            <li class=""><code>task_internal_link.create_update</code></li>
            <li class=""><code>task_internal_link.delete</code></li>
        </ul>
    </section>
    <section class="">
        <div id="WebhookReceiver" class="page-header">
            <h2 class=""><span class="webhooks-icon"></span> <?= t('Writing a Webhook Receiver') ?></h2>
        </div>
        <p class=""><?= t('All internal events of this application can be sent to an external URL.') ?></p>
        <ul class="">
            <li class="">
                <?= e('The webhook URL must be defined in %s.', $this->url->link(t('Webhooks'), 'ConfigController', 'webhook')) ?>
            </li>
            <li class="">
                <?= t('When an event is triggered this application calls the predefined URL automatically.') ?>
            </li>
            <li class="">
                <?= t('Data is encoded in JSON format and sent with a POST HTTP request.') ?>
            </li>
            <li class=""><?= t('The webhook token is also sent as a query string parameter, allowing the user to confirm whether the request was actually called from this application.') ?></li>
            <li class=""><?= t('The custom URL must respond in less than 1 second as such requests are synchronous (a PHP limitation). The user interface can suffer from sever performance issues if your script is too slow.') ?></li>
        </ul>
    </section>
    <section class="">
        <div id="WebhookExamples" class="page-header" style="margin-top: 10px;">
            <h2 class=""><span class="webhooks-icon"></span> <?= t('Webhook Examples') ?></h2>
        </div>
        <details class="accordion-section">
            <summary class="accordion-title">
                <?= t('Example of HTTP Request') ?>
            </summary>
            <div class="accordion-content">
                <?= $this->render('KanboardSupport:config/webhook-code-examples-http') ?>
            </div>
        </details>
    </section>
</div>

