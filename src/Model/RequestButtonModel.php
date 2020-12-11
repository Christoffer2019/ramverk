<?php
namespace chly19\Model;

/**
 * Model for creating API request buttons with random ipv4 and ipv6.
 */

class RequestButtonModel extends RequestURLModel {
    /**
     * Get API request buttons with random ipv4 and ipv6.
     * 
     * @param string $baseUrl       Base url
     * 
     * @return string               Buttons
     */
    public function getRequestButton($baseUrl) {
        $this->ip = $this->getRandomIP();
        $buttons = "";

        for ($i = 0; $i < count($this->ip); $i++) {
            $url = $this->getRequestURL($baseUrl, $this->ip[$i]);
            $buttons .= '<a class="button" href="' . $url . '">
            Testroute ' . ($i + 1) . '</a>';
        }
        return $buttons;
    }
}
