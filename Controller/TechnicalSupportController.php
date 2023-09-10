<?php

namespace Kanboard\Plugin\KanboardSupport\Controller;

use Kanboard\Controller\BaseController;

/**
 * Plugin KanboardSupport
 *
 * Class TechnicalSupportController
 * @package  Kanboard/Controller
 * @author   aljawaid
 */
class TechnicalSupportController extends \Kanboard\Controller\ConfigController
{
    /**
     * Display the Support Page
     *
     * @access public
     */
    public function show()
    {
        $this->response->html($this->helper->layout->config('kanboardSupport:config/support', array(
            'db_size' => $this->configModel->getDatabaseSize(),
            'db_version' => $this->db->getDriver()->getDatabaseVersion(),
            'user_agent' => $this->request->getServerVariable('HTTP_USER_AGENT'),
            'title' => e('Settings %s Configuration', ' &#10562; '),
        )));
    }

    /**
     * Display the Webhooks Information Page
     *
     * @access public
     */
    public function showWebhookInformation()
    {
        $this->response->html($this->helper->layout->config('kanboardSupport:config/webhook_information', array(
            'title' => e('Webhooks %s Information', ' &#10562; '),
        )));
    }
}
