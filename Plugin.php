<?php

namespace Kanboard\Plugin\KanboardSupport;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;
use Kanboard\Model\UserModel;
use Kanboard\Controller\UserViewController;

class Plugin extends Base
{
    public function initialize()
    {
        // Template Override
        //  - Override name should be camelCase e.g. pluginNameExampleCamelCase
        $this->template->setTemplateOverride('config/webhook', 'kanboardSupport:config/webhook');

        // CSS - Asset Hook - keep filename lowercase
        $this->hook->on('template:layout:css', array('template' => 'plugins/KanboardSupport/Assets/css/kanboard-support.css'));
        if (!file_exists('plugins/ContentCleaner') || !file_exists('plugins/PluginManager')) {
            $this->hook->on('template:layout:css', array('template' => 'plugins/KanboardSupport/Assets/css/messages.css'));
        }

        // JS - Asset Hook
        //  - Keep filename lowercase
        $this->hook->on('template:layout:js', array('template' => 'plugins/KanboardSupport/Assets/js/kanboard-support.js'));

        // SETTINGS SIDEBAR - Template Hook - Override name should start lowercase e.g. pluginNameExampleCamelCase
        $this->template->hook->attach('template:config:sidebar', 'kanboardSupport:config/sidebar');
        // TOP RIGHT MENU
        $this->template->hook->attach('template:header:dropdown', 'kanboardSupport:header/user_dropdown');

        // SUPPORT PAGE - Routes
        $this->route->addRoute('/settings/support', 'TechnicalSupportController', 'show', 'KanboardSupport');

        // HELPER
        $this->helper->register('supportHelper', '\Kanboard\Plugin\KanboardSupport\Helper\SupportHelper');
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__.'/Locale');
    }

    public function getPluginName()
    {
        return 'KanboardSupport';
    }

    public function getPluginDescription()
    {
        return t('Add a support section in the Kanboard Settings interface so that end users can easily gather any information required by their internal technical support departments for troubleshooting.');
    }

    public function getPluginAuthor()
    {
        return 'aljawaid';
    }

    public function getPluginVersion()
    {
        return '2.6.0';
    }

    public function getCompatibleVersion()
    {
        // Examples:
        // >=1.0.37
        // <1.0.37
        // <=1.0.37
        return '>=1.2.20';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/aljawaid/KanboardSupport';
    }
}
