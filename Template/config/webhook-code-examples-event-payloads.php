<p class="">
    <?= t('All event payloads are in the following format:') ?>
</p>
<div class="panel">
<pre class="">
{
    "event_name": "model.event_name",
    "event_data": {
        "key1": "value1",
        "key2": "value2"
    }
}
</pre>
</div>
<p class="">
    <?= e('The %s values are not necessary normalized across events.', '<strong><code>event_data</code></strong>') ?>
</p>
<h3 class=""><?= t('Task Creation') ?></h3>
<div class="panel">
<pre class=""></pre>
</div>
