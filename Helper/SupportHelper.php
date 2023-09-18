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
     * Get SVG Icons for Inline Markup and CSS Styling (Embed SVG Fly Method)
     *
     * Include filename as class inside SVG file
     * Set 'color' as 'currentColor' to use CSS or define a color
     * Style using normal CSS
     * @uses    $this->helper->supportHelper->embedSVGIcon('icon-filename-without-extension')
     * @var     $svgFilename
     * @return  svg
     * @author  Erik Moberg https://www.erikmoberg.net/article/embed-svg-icons-in-html-with-php
     * @author  aljawaid
     */
    public function embedSVGIcon($icon_filename)
    {
        if ($this->router->getPlugin()) {
            // For plugin templates
            return file_get_contents('plugins/' . $this->helper->app->getPluginName() . '/Assets/icons/' . $icon_filename . '.svg');
        } else {
            // For core templates
            return file_get_contents('plugins/KanboardSupport/Assets/icons/' . $icon_filename . '.svg');
        }
    }

    /**
     * Mask the IP Address for Security Reasons
     *
     * Works with IP addresses and hostnames (e.g. 'localhost' will become 'host')
     * @uses    $this->helper->supportHelper->maskIPAddress('ip address')
     * @var     $ip_address
     * @return  string          'xxx.xxx.xxx.123' or 'xhost'
     * @author  latrarchy       https://stackoverflow.com/a/31195574
     * @author  aljawaid
     */
    public function maskIPAddress($ip_address)
    {
        if ($ip_address == 'localhost') {
            return '<span title="' . t('Only Administrators can see the full value') . '" style="cursor: help;">xhost</span>';
        }

        // Split the subnets of the IP address
        $ip_subnets = explode('.', $ip_address);

        // The variable to store the filtered subnets
        $masked_ip = '';

        foreach ($ip_subnets as $subnet) {
            // Mask the first three parts of the IP
            if ($subnet == $ip_subnets[0] || $subnet == $ip_subnets[1] || $subnet == $ip_subnets[2]) {
                $masked_subnet = 'xxx.';
            // Leave the last subnet intact
            } else {
                $masked_subnet = $subnet;
            }

            // Append to the variable
            $masked_ip .= $masked_subnet;
        }

        return '<span title="' . t('Only Administrators can see the full value') . '" style="cursor: help;">' . $masked_ip . '</span>';
    }

    /**
     * Mask the Directory Path for Security Reasons
     *
     * @uses    $this->helper->supportHelper->maskPath('directory/path')
     * @var     $path
     * @return  string          '/xxx/xxx/xxx/public_html'
     * @author  aljawaid
     */
    public function maskPath($path)
    {
        // Split the directories of the path
        $directories = explode('/', $path);

        // The variable to store the filtered subnets
        $masked_path = '';

        foreach ($directories as $directory) {
            if ($directory == $directories[0]) {
                // Remove first trailing slash
                $masked_directory = '';
            } elseif ($directory != $directories[0] && $directory != end($directories)) {
                // Mask all but the last directory in the path
                $masked_directory = '/xxx';
            } else {
                // Leave the last directory intact
                $masked_directory = '/' . $directory;
            }

            // Append to the variable
            $masked_path .= $masked_directory;
        }

        return '<span title="' . t('Only Administrators can see the full value') . '" style="cursor: help;">' . $masked_path . '</span>';
    }

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
            '/msie/i' => 'Internet Explorer',
            '/firefox/i' => 'Mozilla Firefox',
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

        return $info;
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
        if (!file_exists($directory)) {
            return false;
        }

        return substr(sprintf('%o', fileperms($directory)), -4);
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

        return $owner['name'];
    }
}
