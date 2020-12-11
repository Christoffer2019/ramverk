<?php
namespace chly19\Traits;
use Dotenv\Dotenv;

/**
 * Trait for accessing api key.
 */

trait ApiKeyTrait {
    /**
     * The api key is stored as an environment variable in config/.env. This
     * file is not available in the repository for safety reasons, but you can
     * find a sample file, config/.env.example where you can change the values
     * for the environment variables.
     * 
     * The package PHP dotenv is used for handling environment variables. You
     * can find the repository on https://github.com/vlucas/phpdotenv#why-env.
     * 
     * Get the api key from the file.
     * 
     * @return string api key
     * 
     */

    protected function getApiKey() {
        $dotenv = Dotenv::createImmutable(__DIR__ . "/../../config");
        $dotenv->load();
        $apiKey = $_ENV["API_KEY"];

        return $apiKey;
    }


    /**
     * Set api key.
     * 
     * @param string $apiKey
     * 
     * @return void
     */

    public function setApiKey($apiKey) {
        $this->apiKey = $apiKey;
    }
}
