<?php
namespace chly19\Model;

/**
 * Model for creating random ipv4 and ipv6.
 */

class RandomIPModel {
    /**
     * Get random IP as an array.
     * 
     * @return array Random IP
     */
    public function getRandomIP()
    {
        return [
            $this->getRandomIPv4(),
            $this->getRandomIPv6(),
            $this->getRandomIPv4(256, 500),
            $this->getRandomIPv6(50)
        ];
    }


    /**
     * Get random ipv4.
     * 
     * @param int $min      Minimum number for ipv4
     * @param int $max      Maximum number for ipv4
     * 
     * @return string       Random ipv4 address
     */

    public function getRandomIPv4($min = 0, $max = 255)
    {
        return mt_rand($min, $max) . "." . mt_rand($min, $max) . "." .
            mt_rand($min, $max) . "." . mt_rand($min, $max);
    }


    /**
     * Get random ipv6.
     * 
     * @param int $max      Maximum number of numbers/letters in ipv6
     *                      excluding prefix 'fd'.
     * 
     * @return string       Random ipv6 address
     */

    public function getRandomIPv6($max = 30)
    {
        $ipv6 = "fd";
        for ($i = 0; $i < $max; $i++) {
            if (($i - 2) % 4 == 0 && $i !== $max) {
                $ipv6 .= ":";
            }
            $ipv6 .= $this->getRandomHex();
        }
        return $ipv6;
    }


    /**
     * Get random hex.
     * 
     * @return string Random hex
     */

    public function getRandomHex()
    {
        $hex = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f"];
        return strval($hex[array_rand($hex)]);
    }
}