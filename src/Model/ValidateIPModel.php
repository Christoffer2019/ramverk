<?php
namespace chly19\Model;
use chly19\Traits\ApiKeyTrait;

/**
 * Model for validating IP.
 */

class ValidateIPModel extends RequestModel {
    use ApiKeyTrait;

    /**
     * Get information about the IP address.
     * 
     * @param int $ip       The IP address
     * 
     * @return array        Information about the IP address presented in an
     *                      array.
     */

    public function getInfo($ip) {
        $baseUrl = 'http://api.ipstack.com/';
        $this->apiKey = $this->getApiKey();
        $parameter = "&hostname=1";
        $url = $baseUrl . $ip .'?access_key='. $this->apiKey . $parameter;
        $api_result = $this->callAPI($url);

        return isset($api_result["success"]) && $api_result["success"] === 
            false ? $api_result : $this->getPresentation($api_result);
    }


    /**
     * Get the presentation from the API result.
     * 
     * @param array     $api_result     The API result
     * 
     * @return array                    Array presenting the API result with
     *                                  selected data.
     */

    public function getPresentation($api_result) {
        return [
            "ip" => $api_result["ip"],
            "hostname" => $api_result["hostname"],
            "type" => $api_result["type"],
            "latitude" => $api_result["latitude"],
            "longitude" => $api_result["longitude"],
            "city" => $api_result["city"],
            "country_name" => $api_result["country_name"],
            "continent_name" => $api_result["continent_name"]
        ];
    }
}
