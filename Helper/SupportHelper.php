<?php

namespace Kanboard\Plugin\KanboardSupport\Helper;

use Kanboard\Core\Base;

/**
 * Plugin KanboardSupport
 * Class SupportHelper
 *
 * @package  Plugin\KanboardSupport\Helper
 * @author   aljawaid
 */
class SupportHelper extends Base
{
    /**
     * Detect User Browser
     *
     * @see     support.php
     * @return  string
     * @author  W3docs https://www.w3docs.com/snippets/php/browser-detection.html
     */
    public function getBrowser()
    {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $browser = "N/A";
        $browsers = [
            '/msie/i' => 'Internet explorer',
            '/firefox/i' => 'Firefox',
            '/safari/i' => 'Safari',
            '/chrome/i' => 'Chrome',
            '/edge/i' => 'Edge',
            '/opera/i' => 'Opera',
            '/mobile/i' => 'Mobile browser',
        ];
        foreach ($browsers as $regex => $value) {
            if (preg_match($regex, $user_agent)) {
                $browser = $value;
            }
        }

        return $browser;
    }

    /**
     * Get Directory Permissions
     *
     * @var     $dir
     * @see     support.php app-config.php
     * @return  string
     * @author  PHP Example #2 https://www.php.net/manual/en/function.fileperms.php
     */
    public function getPermissions($dir)
    {
        $perms = fileperms($dir);

        switch ($perms & 0xF000) {
            case 0xC000: // socket
                $info = 's';
                break;
            case 0xA000: // symbolic link
                $info = 'l';
                break;
            case 0x8000: // regular
                $info = 'r';
                break;
            case 0x6000: // block special
                $info = 'b';
                break;
            case 0x4000: // directory
                $info = '<span class="p-type" title="' . t('Directory') . '">d</span>';
                break;
            case 0x2000: // character special
                $info = 'c';
                break;
            case 0x1000: // FIFO pipe
                $info = 'p';
                break;
            default: // unknown
                $info = 'u';
        }

        // Owner
        $info .= (($perms & 0x0100) ? 'r' : '-');
        $info .= (($perms & 0x0080) ? 'w' : '-');
        $info .= (($perms & 0x0040) ?
                    (($perms & 0x0800) ? 's' : 'x') :
                    (($perms & 0x0800) ? 'S' : '-'));

        // Group
        $info .= (($perms & 0x0020) ? 'r' : '-');
        $info .= (($perms & 0x0010) ? 'w' : '-');
        $info .= (($perms & 0x0008) ?
                    (($perms & 0x0400) ? 's' : 'x') :
                    (($perms & 0x0400) ? 'S' : '-'));

        // World
        $info .= (($perms & 0x0004) ? 'r' : '-');
        $info .= (($perms & 0x0002) ? 'w' : '-');
        $info .= (($perms & 0x0001) ?
                    (($perms & 0x0200) ? 't' : 'x') :
                    (($perms & 0x0200) ? 'T' : '-'));

        echo $info;
        clearstatcache();
    }

    /**
     * Get Linux Directory Permissions
     *
     * Displays as octal value
     * @var     $directory
     * @see     support.php app-config.php
     * @return  string
     * @author  PHP Example #1 https://www.php.net/manual/en/function.fileperms.php
     */
    public function getPermissionsLinux($directory)
    {
        // phpcs:ignore Generic.ControlStructures.InlineControlStructure.NotAllowed
        if (!file_exists($directory)) return false;

        echo substr(sprintf('%o', fileperms($directory)), -4);
        clearstatcache();
    }

    /**
     * Get Directory Owner
     *
     * @var     $dir
     * @see     support.php app-config.php
     * @return  string
     * @author  PHP https://www.php.net/manual/en/function.posix-getpwuid.php
     */
    public function getPermissionsOwner($directory)
    {
        $owner = posix_getpwuid(fileowner($directory));
        echo $owner['name'];
    }
}
