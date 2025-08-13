<?php

/**
 * Response.php
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
 * Classe Response
 *
 * @category StarNetworks
 * @package  StarNetworks
 * @author   Gustavo Dias <gustavodiasdsc@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/gustavodiadsc/star-wars
 */
class Response
{
    /**
     * Função para construir response em json
     *
     * @param array   $data   array associativo com o que será enviado
     *                        na response
     * @param integer $status status code da resposta, com padrão sendo 200
     * 
     * @return void
     */
    public static function json(array $data, int $status = 200)
    {
        http_response_code($status);

        header("Content-type: application/json");

        echo json_encode($data);
    }
}
