<?php

/**
 * HelloController.php
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

require_once __DIR__ . "./../lib/StarWarsApi.php";

/**
 * Classe HelloController
 *
 * @category StarNetworks
 * @package  StarNetworks
 * @author   Gustavo Dias <gustavodiasdsc@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/gustavodiadsc/star-wars
 */
class HelloController
{
    /**
     * Função que retorna view da pagina
     *
     * @return void
     */
    public function view()
    {
        $api = new StarWarsApi();
        $api->get("films/");
    }
}
