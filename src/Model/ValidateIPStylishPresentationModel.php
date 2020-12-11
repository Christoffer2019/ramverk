<?php
namespace chly19\Model;

/**
 * Model for validating IP and returning a stylish presentation.
 */

class ValidateIPStylishPresentationModel extends ValidateIPModel {
    /**
     * Get a stylish presentation of the API result.
     * 
     * @param string $ip        The IP address
     * 
     * @return string           A stylish presentation of the API result.
     */

    public function getStylishPresentation($ip) {
        $res = $this->getInfo($ip);
        $pres = $this->getArrayAsString($res, "");

        return $pres;
    }


    /**
     * Convert the API result from array to string.
     * 
     * @param array $res        The API result as an array.
     * @param string $pres      The API result as a string.
     * 
     * @return string           The API result as a string.
     */

    public function getArrayAsString($res, $pres) {
        foreach ($res as $key => $val) {
            if (is_array($val)) {
                $pres = $this->getArrayAsString($val, $pres);
            } else {
                $val = is_bool($val) ? $this->getBoolAsString($val) : $val;
                $pres .= "<p>" . ucfirst(str_replace("_", " ", $key)) .
                    ": " . str_replace("_", " ", $val) . "</p>";
            }
        }
        return $pres;
    }


    /**
     * Convert bool to string.
     * 
     * @param bool $val     Bool value representing data in the API result.
     * 
     * @return string       The bool as a string.
     */

    public function getBoolAsString($val) {
        return $val ? "true" : "false";
    }
}
