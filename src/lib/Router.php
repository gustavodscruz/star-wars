<?php
/**
 * Router.php
 *
 * Arquivo de rotas da aplicação
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

require_once __DIR__ . "/Routes.php";

Route::get('/', 'HelloController@view');
