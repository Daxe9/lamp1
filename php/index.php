<?php
use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/controllers/AlunniController.php';

$app = AppFactory::create();
$app->addBodyParsingMiddleware();

$app->get("/", function(Request $req, Response $res) {
    $res->getBody()->write("This route does not exist, please visit /alunni");
    return $res;
});

$app->get('/alunni', "AlunniController:index");
$app->get("/alunni/{id}", "AlunniController:getOne");
$app->post("/alunni", "AlunniController:createOne");
$app->put("/alunni/{id}", "AlunniController:updateOne");
$app->delete("/alunni/{id}", "AlunniController:deleteOne");

$app->run();
