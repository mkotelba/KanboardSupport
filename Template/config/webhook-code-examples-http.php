<p class="">
    <?= e('This is a general example based on the %s event', '<code><abbr title="' . t('See the Supported Events above') . '">task.move.column</abbr></code>') ?>
</p>
<div class="panel">
<pre class="">
POST https://your_webhook_url/?token=WEBHOOK_TOKEN_HERE
User-Agent: Kanboard Webhook
Content-Type: application/json
Connection: close
</pre>
<pre class="">
{
    "event_name": "task.move.column",
    "event_data": {
        "task_id": "4",
        "task": {
            "id": "4",
            "reference": "",
            "title": "My task",
            "description": "",
            "date_creation": "1469314356",
            "date_completed": null,
            "date_modification": "1469315422",
            "date_due": "1469491200",
            "date_started": "0",
            "time_estimated": "0",
            "time_spent": "0",
            "color_id": "green",
            "project_id": "1",
            "column_id": "1",
            "owner_id": "1",
            "creator_id": "1",
            "position": "1",
            "is_active": "1",
            "score": "0",
            "category_id": "0",
            "priority": "0",
            "swimlane_id": "0",
            "date_moved": "1469315422",
            "recurrence_status": "0",
            "recurrence_trigger": "0",
            "recurrence_factor": "0",
            "recurrence_timeframe": "0",
            "recurrence_basedate": "0",
            "recurrence_parent": null,
            "recurrence_child": null,
            "category_name": null,
            "swimlane_name": null,
            "project_name": "Demo Project",
            "default_swimlane": "Default swimlane",
            "column_title": "Backlog",
            "assignee_username": "admin",
            "assignee_name": null,
            "creator_username": "admin",
            "creator_name": null
        },
        "changes": {
            "src_column_id": "2",
            "dst_column_id": "1",
            "date_moved": "1469315398"
        },
        "project_id": "1",
        "position": 1,
        "column_id": "1",
        "swimlane_id": "0",
        "src_column_id": "2",
        "dst_column_id": "1",
        "date_moved": "1469315398",
        "recurrence_status": "0",
        "recurrence_trigger": "0"
    }
}
</pre>
</div>
