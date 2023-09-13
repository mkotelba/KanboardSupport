<!-- KanboardSupport Plugin -->
<div class="webhooks-info-page">
    <section id="SupportedEvents" class="">
        <div class="page-header" style="margin-top: 10px;">
            <h2 class=""><span class="webhooks-icon"></span> <?= t('Supported Events') ?></h2>
        </div>
        <ul class="fa-ul">
            <li class=""><i class="fa-li fa fa-check-square pp-green"></i><code class="event-code">comment.create</code></li>
            <li class=""><i class="fa-li fa fa-check-square pp-green"></i><code class="event-code">comment.update</code></li>
            <li class=""><i class="fa-li fa fa-check-square pp-green"></i><code class="event-code">comment.delete</code></li>
            <li class=""><i class="fa-li fa fa-check-square pp-green"></i><code class="event-code">file.create</code></li>
            <li class=""><i class="fa-li fa fa-check-square pp-green"></i><code class="event-code">task.move.project</code></li>
            <li class=""><i class="fa-li fa fa-check-square pp-green"></i><code class="event-code">task.move.column</code></li>
            <li class=""><i class="fa-li fa fa-check-square pp-green"></i><code class="event-code">task.move.position</code></li>
            <li class=""><i class="fa-li fa fa-check-square pp-green"></i><code class="event-code">task.move.swimlane</code></li>
            <li class=""><i class="fa-li fa fa-check-square pp-green"></i><code class="event-code">task.update</code></li>
            <li class=""><i class="fa-li fa fa-check-square pp-green"></i><code class="event-code">task.create</code></li>
            <li class=""><i class="fa-li fa fa-check-square pp-green"></i><code class="event-code">task.close</code></li>
            <li class=""><i class="fa-li fa fa-check-square pp-green"></i><code class="event-code">task.open</code></li>
            <li class=""><i class="fa-li fa fa-check-square pp-green"></i><code class="event-code">task.assignee_change</code></li>
            <li class=""><i class="fa-li fa fa-check-square pp-green"></i><code class="event-code">subtask.update</code></li>
            <li class=""><i class="fa-li fa fa-check-square pp-green"></i><code class="event-code">subtask.create</code></li>
            <li class=""><i class="fa-li fa fa-check-square pp-green"></i><code class="event-code">subtask.delete</code></li>
            <li class=""><i class="fa-li fa fa-check-square pp-green"></i><code class="event-code">task_internal_link.create_update</code></li>
            <li class=""><i class="fa-li fa fa-check-square pp-green"></i><code class="event-code">task_internal_link.delete</code></li>
        </ul>
    </section>
    <section id="WebhookReceiver" class="">
        <div class="page-header">
            <h2 class=""><span class="webhooks-icon"></span> <?= t('Writing a Webhook Receiver') ?></h2>
        </div>
        <p class=""><?= t('All internal events of this application can be sent to an external URL.') ?></p>
        <ul class="fa-ul">
            <li class="">
                <i class="fa-li fa fa-terminal"></i>
                <?= e('The webhook URL must be defined in %s.', $this->url->link(t('Webhooks'), 'ConfigController', 'webhook', array(), false, 'webhooks-link', t('Go to Settings'), false, 'AddWebhook')) ?>
            </li>
            <li class="">
                <i class="fa-li fa fa-terminal"></i>
                <?= t('When an event is triggered this application calls the predefined URL automatically.') ?>
            </li>
            <li class="">
                <i class="fa-li fa fa-terminal"></i>
                <?= t('Data is encoded in JSON format and sent with a POST HTTP request.') ?>
            </li>
            <li class="">
                <i class="fa-li fa fa-terminal"></i>
                <?= t('The webhook token is also sent as a query string parameter, allowing the user to confirm whether the request was actually called from this application.') ?>
            </li>
            <li class="">
                <i class="fa-li fa fa-terminal"></i>
                <?= t('The custom URL must respond in less than 1 second as such requests are synchronous. This is a PHP limitation. The user interface can suffer from sever performance issues if your script is too slow.') ?>
            </li>
        </ul>
    </section>
    <section id="WebhookExamples" class="">
        <div class="page-header" style="margin-top: 10px;">
            <h2 class=""><span class="webhooks-icon"></span> <?= t('Webhook Examples') ?></h2>
        </div>
        <details class="accordion-section">
            <summary class="accordion-title">
                <?= t('HTTP Request Example') ?>
            </summary>
            <div class="accordion-content">
                <?= $this->render('KanboardSupport:config/webhook-code-examples-http') ?>
            </div>
        </details>
        <details class="accordion-section">
            <summary class="accordion-title">
                <?= t('Event Payload Examples') ?>
            </summary>
            <div class="accordion-content">
                <?= $this->render('KanboardSupport:config/webhook-code-examples-event-payloads') ?>
            </div>
        </details>
    </section>
</div>
