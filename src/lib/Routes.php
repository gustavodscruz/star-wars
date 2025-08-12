<?php
/**
 * Route.php
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
 * Classe Route
 *
 * @category StarNetworks
 * @package  StarNetworks
 * @author   Gustavo Dias <gustavodiasdsc@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/gustavodiadsc/star-wars
 */
class Route
{
    private static array $_routes = [];

    /**
     * Push em $_routes para rotas get
     *
     * @param string $path   controlador referido
     * @param string $action método referido do controlador
     * 
     * @return void
     */
    public static function get(string $path, string $action)
    {
        self::$_routes[] = [
            "path"=> $path,
            "action"=> $action,
            "method" => "GET",
        ];
    }

    /**
     * Push em $_routes para rotas post
     *
     * @param string $path   controlador referido
     * @param string $action método referido do controlador
     * 
     * @return void
     */
    public static function post(string $path, string $action)
    {
        self::$_routes[] = [
            "path"=> $path,
            "action"=> $action,
            "method" => "POST",
        ];
    }

    /**
     * Push em $_routes para rotas put
     *
     * @param string $path   controlador referido
     * @param string $action método referido do controlador
     * 
     * @return void
     */
    public static function put(string $path, string $action)
    {
        self::$_routes[] = [
            "path"=> $path,
            "action"=> $action,
            "method" => "PUT",
        ];
    }

    /**
     * Push em $_routes para rotas delete
     *
     * @param string $path   controlador referido
     * @param string $action método referido do controlador
     * 
     * @return void
     */
    public static function delete(string $path, string $action)
    {
        self::$_routes[] = [
            "path"=> $path,
            "action"=> $action,
            "method" => "DELETE",
        ];
    }

    /**
     * Retorno de todas as rotas que constam no array local
     *
     * @return void
     */
    public static function routes()
    {
        return self::$_routes;
    }
}