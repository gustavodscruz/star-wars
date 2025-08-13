<?php

/**
 * StarWarsApi.php
 *
 * PHP version 7.4.39
 * Entry point for the Star Networks project.
 *
 * @category StarNetworks
 * @package  StarNetworks
 * @author   Gustavo Dias <gustavodiasdsc@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/yourusername/star-networks
 */

require_once __DIR__ . "/Response.php";

/**
 * Classe StarWarsApi
 *
 * @category StarNetworks
 * @package  StarNetworks
 * @author   Gustavo Dias <gustavodiasdsc@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/gustavodiadsc/star-wars
 */
class StarWarsApi
{
    private $_baseUrl = "https://swapi.dev/api/";
    
    /**
     * Função para retornar dados da api conforme o caminho
     *
     * @param string $endpoint caminho da api
     * 
     * @return void
     */
    public function get(string $endpoint)
    {
        $url = $this->_baseUrl . $endpoint; 
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);

        $response = curl_exec($curl);
        
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if (curl_errno($curl)) {
            Response::json(
                [
                    'message' => "Erro: " . curl_error($curl)
                ], 400
            );
            curl_close($curl);
            return;
        }
        if ($httpCode != 200) {
            Response::json(
                [
                    'message' => "Não foi possível chamar o endpoint " . $endpoint
                ], 400
            );
            curl_close($curl);
            return;
        }

        Response::json(json_decode($response, true), 200);
        return;
    }

}