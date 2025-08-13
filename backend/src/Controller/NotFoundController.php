<?php

/**
 * NotFoundController.php
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
 * Classe NotFoundController
 *
 * @category StarNetworks
 * @package  StarNetworks
 * @author   Gustavo Dias <gustavodiasdsc@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/gustavodiadsc/star-wars
 */

class NotFoundController
{
    /**
     * Função responsável por indexar resposta em json com rota não encontrada
     *
     * @return void
     */
    public function index()
    {
        Response::json(
            [
                "message" => "Sorry, route not found"
            ],
            404
        );

        return;
    }
}
