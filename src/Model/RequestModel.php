<?php
namespace chly19\Model;

/**
 * Model for making API requests.
 */

class RequestModel {
    /**
     * Call the API.
     * 
     * @param string    $url        The url for calling the API.
     * 
     * @return array                The API result presented with selected data.
     */

    public function callAPI($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        curl_close($ch);
        $api_result = json_decode($json, true);

        return $api_result;
    }
}
