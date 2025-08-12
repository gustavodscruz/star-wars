<?php

/**
 * Request.php
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

/**
 * Classe Request
 *
 * @category StarNetworks
 * @package  StarNetworks
 * @author   Gustavo Dias <gustavodiasdsc@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/gustavodiadsc/star-wars
 */
class Request
{
    /**
     * Serve para capturar método da requisição vinda para o servidor
     *
     * @return void
     */
    public static function method()
    {
        return $_SERVER["REQUEST_METHOD"];
    }

    /**
     * Captura corpo da requisição
     * 
     * Parâmetro get para requisições get e json para outras requisições
     *
     * @return void
     */
    public static function body()
    {
        $json = json_decode(file_get_contents("php://input"), true) ?? [];

        $data = match (self::method()) {
            'GET' => $_GET,
            'POST', 'PUT', 'DELETE' => $json
        };

        return $data;
    }
}
