<?php

use Slim\Factory\AppFactory;
use Config\Database;
use App\Models\Usuario;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\JsonMiddleware;
use App\Middlewares\UserMiddleware;
use App\Controllers\UsuarioController;
use App\Controllers\MateriaController;
use App\Controllers\InscripcionController;
use Slim\Psr7\Response;
use Slim\Routing\RouteCollectorProxy;
use App\Helpers\JwtHelper;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Routing\RouteContext;

require __DIR__ . '/../vendor/autoload.php';

new Database();

$app = AppFactory::create();
$app->setBasePath('/PhpstormProjects/2doParcial/public');


$app->group('/', function (RouteCollectorProxy $group) {
    $group->post('users',UsuarioController::class.":addOne");
    $group->post('login',UsuarioController::class.":login");
    $group->post('materia', MateriaController::class.":addOne")->add(new AuthMiddleware('admin'));
    $group->post('inscripcion/{idMateria}', InscripcionController::class.":addOne")->add(new AuthMiddleware('alumno'));
    $group->put('notas/{idMateria}', MateriaController::class.":addNota")->add(new AuthMiddleware('profesor'));
}
)->add(new JsonMiddleware());
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);
$app->run();