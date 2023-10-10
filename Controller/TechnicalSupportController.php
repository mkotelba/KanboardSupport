<?php

namespace Kanboard\Plugin\KanboardSupport\Controller;

use Kanboard\Controller\BaseController;
use ZipArchive;

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

    /**
     * Display Current Raw Config File (Modal)
     *
     * @see     config.php
     * @return  modal
     * @author  aljawaid
     */
    public function showCurrentRawConfigModal()
    {
        $this->response->html($this->template->render('kanboardSupport:modals/current-raw-config', array(
            'title' => t('Current Raw Configuration File'),
        )));
    }

    /**
     * Display Default Raw Config File (Modal)
     *
     * @see     config.default.php
     * @return  modal
     * @author  aljawaid
     */
    public function showDefaultRawConfigModal()
    {
        $this->response->html($this->template->render('kanboardSupport:modals/default-raw-config', array(
            'title' => t('Default Raw Configuration File'),
        )));
    }

    /**
     * Display Debug Log (Modal)
     *
     * @see     debug.log
     * @return  modal
     * @author  aljawaid
     */
    public function showDebugLogModal()
    {
        $this->response->html($this->template->render('kanboardSupport:modals/debug-log', array(
            'title' => t('Debug Log'),
        )));
    }

    /**
     * Compress and Download Config Files
     *
     * Archive includes 'config.php' and 'config.default.php' named as 'KB_v(version)_Config_Backup-(date/time).zip'
     * @see     app-sections.php
     * @return  zip archive
     * @author  Phani https://stackoverflow.com/a/20216192
     * @author  aljawaid
     */
    public function backupConfigFiles()
    {
        $files = array(ROOT_DIR . DIRECTORY_SEPARATOR . 'config.php', ROOT_DIR . DIRECTORY_SEPARATOR . 'config.default.php');

        // Create new zip object
        $zip = new ZipArchive();

        // Create a temp file and open it
        $tmp_file = tempnam('.', '');
        $zip->open($tmp_file, ZipArchive::CREATE);

        // Loop through each file
        foreach ($files as $file) {
            // Download file
            $download_file = file_get_contents($file);

            // Add it to the zip
            $zip->addFromString(basename($file), $download_file);
        }

        // Close zip
        $zip->close();

        // Send the file to the browser as a download
        $filename = 'KB_v' . APP_VERSION . '_Config_Backup-' . date('d-m-Y\THi') . '.zip';
        header('Content-disposition: attachment; filename=' . $filename . '');
        header('Content-type: application/zip');
        readfile($tmp_file);
        unlink($tmp_file);
    }

    /**
     * Compress and Download Debug Log File
     *
     * Archive includes 'debug.log' named as 'KB_v(version)_Debug_Backup-(date/time).zip'
     * @see     app-sections.php
     * @return  zip archive
     * @author  Phani https://stackoverflow.com/a/20216192
     * @author  aljawaid
     */
    public function downloadDebugFile()
    {
        $files = array(LOG_FILE);

        // Create new zip object
        $zip = new ZipArchive();

        // Create a temp file and open it
        $tmp_file = tempnam('.', '');
        $zip->open($tmp_file, ZipArchive::CREATE);

        // Loop through each file
        foreach ($files as $file) {
            // Download file
            $download_file = file_get_contents($file);

            // Add it to the zip
            $zip->addFromString(basename($file), $download_file);
        }

        // Close zip
        $zip->close();

        // Send the file to the browser as a download
        $filename = 'KB_v' . APP_VERSION . '_Debug_Backup-' . date('d-m-Y\THi') . '.zip';
        header('Content-disposition: attachment; filename=' . $filename . '');
        header('Content-type: application/zip');
        readfile($tmp_file);
        unlink($tmp_file);
    }

    /**
     * Download Raw Debug Log File
     *
     * @see     app-sections.php
     * @return  download debug.log
     * @author  aljawaid
     */
    public function downloadRawDebugFile()
    {
        if (file_exists(LOG_FILE)) {
            // Send the file to the browser as a download
            $filename = 'KB_v' . APP_VERSION . '-' . date('d-m-Y\THi') . '-debug.log';

            header('Content-disposition: attachment; filename=' . $filename . '');
            header('Content-type: application/octet-stream');
            flush();
            readfile(LOG_FILE);
        } else {
            $this->flash->failure(t('Unable to download the log file. Check that the file exists.'));
            $this->response->redirect($this->helper->url->to('TechnicalSupportController', 'show', array('plugin' => 'KanboardSupport')));
        }
    }

    /**
     * Delete the Debug Log File
     *
     * @return  void
     * @author  aljawaid
     */
    public function deleteDebugLog()
    {
        if (is_writable(dirname(LOG_FILE))) {
            if (unlink(LOG_FILE)) {
                $this->flash->success(t('Debug Log Deleted Successfully'));
            } else {
                $this->flash->failure(t('Unable to Delete Debug Log'));
            }
        } else {
            $this->flash->failure(t('Unable to delete the file. Check the folder permissions.'));
        }

        $this->response->redirect($this->helper->url->to('TechnicalSupportController', 'show', array('plugin' => 'KanboardSupport')));
    }
}
