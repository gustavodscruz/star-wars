<?php

/**
 * Core.php
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
 * Classe Core
 *
 * @category StarNetworks
 * @package  StarNetworks
 * @author   Gustavo Dias <gustavodiasdsc@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/gustavodiadsc/star-wars
 */
class Core
{
    /**
     * Dispatch
     * 
     * Função responsável por chamar controladores via conteúdo de rotas
     *
     * @param array $routes rotas da aplicação
     * 
     * @return void
     */
    public static function dispatch(array $routes)
    {
        // Detecta automaticamente a URL do REQUEST_URI
        $prefixController = 'App\\Controllers\\';
        $routeFound = false;
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // Se não for a raiz e o arquivo existir, serve o arquivo estático
        if ($uri !== '/' && file_exists(__DIR__ . '/../../' . $uri)) {
            return false;
        }

        // Configura a URL para o sistema de rotas
        $url = $uri === '/' ? '/' : '/' . ltrim($uri, '/');
        $url !== '/' && $url = rtrim($url, '/');

        foreach ($routes as $route) {
            $pattern = $route['path'];
            $pattern = preg_replace('/\{[\w]+\}/', '([\w.-]+)', $pattern);
            $pattern = '#^' . $pattern . '$#';

            if (preg_match($pattern, $url, $matches)) {
                array_shift($matches);
                $routeFound = true;

                if ($route['method'] !== Request::method()) {
                    Response::json(
                        [
                            'error' => true,
                            'success' => false,
                            'message' => "Sorry, method not allowed"
                        ],
                        405
                    );
                    return;
                }

                [$controller, $action] = explode('@', $route['action']);

                $controller = $prefixController . $controller;
                $extendController = new $controller();
                $extendController->$action(new Request, new Response, $matches);
                return;
            }
        }

        if (!$routeFound) {
            $controller = $prefixController . 'NotFoundController';
            $extendController = new $controller();
            $extendController->index(new Request, new Response);
        }
    }
}
