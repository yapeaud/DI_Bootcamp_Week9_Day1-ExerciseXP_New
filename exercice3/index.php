<?php

require_once __DIR__.' /vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

$routes = new RouteCollection();
$routes->add('hello', new Route('/hello/{name}', array(
    '_controller' => function (Request $request) {
        $name = $request->attributes->get('name');
        $response = new Response(sprintf('Hello %s', $name));
        return $response;
    }
)));


$context = new RequestContext();
$context->fromRequest(Request::createFromGlobals());

$matcher = new UrlMatcher($routes, $context);

try {
    $request = Request::createFromGlobals();
    $attributes = $matcher->matchRequest($request);
    $response = call_user_func($attributes['_controller'], $request);
} catch (ResourceNotFoundException $e) {
    $response = new Response('Not Found', 404);
}

$response->send();