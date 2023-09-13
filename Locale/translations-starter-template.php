<!-- REMOVE THIS SECTION -->
<!-- ------------------- -->
<!-- TEMPLATE FILE FOR LOCAL TRANSLATIONS - KEEP FILENAME IN LOWERCASE AS translations.php UNDER LANGUAGE CODE -->
<!-- EXAMPLE FILE: /Locale/en_GB/translations.php -->
<!-- EXAMPLE FILE: /Locale/en_US/translations.php -->
<!-- EXAMPLE FILE: /Locale/fr_FR/translations.php -->
<!-- EXAMPLE FILE: /Locale/de_DE/translations.php -->
<!-- ------------------- -->
<!-- REMOVE THIS SECTION -->
<?php

return array(
    //
    // GENERAL
    //
    'This plugin shows a configuration section to display all the default and custom values so that users can check and troubleshoot issues without having to open core files.' => '',
    //
    // Controller/TechnicalSupportController.php
    //
    'Settings %s Configuration' => '',
    'Webhooks %s Information' => '',
    //
    // Helper/SupportHelper.php
    //
    'Directory' => '',
    //
    // Template/config/sidebar.php
    //
    'Configuration' => '',
    //
    // Template/config/support.php
    //
    'Application Configuration' => '',
    'User Configuration' => '',
    'Your Profile Full Name' => '',
    'Your User ID' => '',
    'Your Role' => '',
    'Your IP Address' => '',
    'Opens in a new window' => '',
    'Lookup IP' => '',
    'Current Page' => '',
    'Your Browser Name' => '',
    'Your Browser' => '',
    'Data Privacy' => '',
    'This page shows sensitive data. Hide selective information before sharing.' => '',
    'Screenshot friendly' => '',
    'Hide Data' => '',
    'Application Information' => '',
    'Application Name' => '',
    'Version' => '',
    'Updates' => '',
    'Check for updates' => '',
    'Debug Mode' => '',
    'Enabled' => '',
    'Not Enabled' => '',
    'Data Directory' => '',
    'This directory is not writeable by the web server user' => '',
    'This directory is writeable by the web server user' => '',
    'Directory Permissions' => '',
    'Linux Directory Permissions' => '',
    'Directory Owner' => '',
    'Files Directory' => '',
    'Cache Directory' => '',
    'Not required as Cache Driver is set to' => '',
    'Plugins Installer' => '',
    'Disabled' => '',
    'Plugins cannot be installed. This is also set by default for security reasons.' => '',
    'Plugins can be automatically installed through the Plugins Directory' => '',
    'Plugins Directory' => '',
    'Plugins Directory URL' => '',
    'Plugins will be listed from the default source' => '',
    'Plugins will be listed from a custom source' => '',
    'Log File' => '',
    'Session Handler' => '',
    'Database' => '',
    'Session Duration' => '',
    'Until browser is closed' => '',
    'Database Connection' => '',
    'Database Driver' => '',
    'Database Version' => '',
    'Database Username' => '',
    'Database Hostname' => '',
    'Database Port' => '',
    'Default' => '',
    'Database Name' => '',
    'Database Migrations' => '',
    'Database migrations must be completed manually through the CLI' => '',
    'Use CLI' => '',
    'This is the default and recommended setting' => '',
    'Database Size' => '',
    'Download Database' => '',
    'compressed SQLite file' => '',
    'Upload Database' => '',
    'Optimize Database' => '',
    'command' => '',
    'Email Connection' => '',
    'Mail Configuration' => '',
    'Sender Email' => '',
    'Not Set' => '',
    'Mail Transport' => '',
    'Other' => '',
    'Mail Server Hostname' => '',
    'SMTP Encryption' => '',
    'SMTP Username' => '',
    'Command Name' => '',
    'Sendmail Command' => '',
    'Server Configuration' => '',
    'Operating System' => '',
    'Website Address' => '',
    'Domain' => '',
    'Server IP Address' => '',
    'Secure' => '',
    'Not Secure' => '',
    'System Temporary Directory' => '',
    'Absolute Path' => '',
    'Common Gateway Interface' => '',
    'HTTP Web Server' => '',
    'Pretty URLs' => '',
    'On' => '',
    'Off' => '',
    'Server Protocol' => '',
    'Secure HTTP Protocol' => '',
    'Yes' => '',
    'No' => '',
    'PHP Information' => '',
    'Major Version' => '',
    'Minor Version' => '',
    'Release Version' => '',
    'Less than minimum requirement' => '',
    'Pass' => '',
    'Config File Path' => '',
    'Config File Scan Directory' => '',
    'Loaded Configuration File' => '',
    'PHP Extension Name' => '',
    'Not Detected' => '',
    'Required' => '',
    'PHP Extension' => '',
    'Required Extension' => '',
    'Optional' => '',
    'Missing PDO Extension' => '',
    'MySQL Detected' => '',
    'PostgreSQL Detected' => '',
    'SQLite Detected' => '',
    //
    // Template/config/webhook-code-examples-event-payloads.php
    //
    'All event payloads are in the following format:' => '',
    'The %s values are not necessary normalized across events.' => '',
    'Task Creation' => '',
    'Task Modification' => '',
    'Task update events have a field called %s that contains updated values.' => '',
    'Comment Creation' => '',
    'Subtask Creation' => '',
    'Task Link Creation' => '',
    'File Upload' => '',
    //
    // Template/config/webhook-code-examples-http.php
    //
    'This is a general example based on the %s event.' => '',
    'See the Supported Events above' => '',
    //
    // Template/config/webhook.php
    //
    'Connecting External Applications' => '',
    'Webhooks are useful to perform actions with external applications such as:' => '',
    'Using webhooks to create a task by calling a simple URL' => '',
    'Automatically calling an external URL when an event occurs in this application (e.g. task creation, comment updated, etc.)' => '',
    'To view the list of supported events or see some examples, visit the %s page' => '',
    'Webhooks Information' => '',
    'Visit page' => '',
    'Webhook Token' => '',
    'Warning' => '',
    'Resetting the webhook token may require the cron background jobs to be manually updated' => '',
    'Token:' => '',
    'Reset Token' => '',
    'Add Webhook' => '',
    'Webhook URL' => '',
    'Save Webhook' => '',
    //
    // Template/config/webhook_information.php
    //
    'Supported Events' => '',
    'Writing a Webhook Receiver' => '',
    'All internal events of this application can be sent to an external URL.' => '',
    'The webhook URL must be defined in %s.' => '',
    'Webhooks' => '',
    'Go to Settings' => '',
    'When an event is triggered this application calls the predefined URL automatically.' => '',
    'Data is encoded in JSON format and sent with a POST HTTP request.' => '',
    'The webhook token is also sent as a query string parameter, allowing the user to confirm whether the request was actually called from this application.' => '',
    'The custom URL must respond in less than 1 second as such requests are synchronous. This is a PHP limitation. The user interface can suffer from sever performance issues if your script is too slow.' => '',
    'Webhook Examples' => '',
    'HTTP Request Example' => '',
    'Event Payload Examples' => '',
);
