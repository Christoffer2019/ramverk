<?php
namespace chly19\Model;
use chly19\Traits\ApiKeyTrait;

/**
 * Model for creating API request URL.
 */

class RequestURLModel extends RandomIPModel {
    use ApiKeyTrait;

    /**
     * Get API request URL.
     * 
     * @param string $baseUrl   Base url
     * @param string $ip        IP address
     * 
     * @return string           API request URL
     */

    public function getRequestURL($baseUrl, $ip) {
        $apiKey = $this->getApiKey();
        return $baseUrl . '/api?ip=' . $ip . '?api-key=' . $apiKey;
    }
}
