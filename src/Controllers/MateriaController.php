<?php

namespace App\Controllers;

use App\Models\AlumnoNotas;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\Materia;

class MateriaController {
    public function getAll(Request $request, Response $response) {
        $rta = Materia::get();
        $response->getBody()->write(json_encode($rta));
        return $response;
    }

    public function getOne(Request $request, Response $response, $args) {
        $rta = Materia::find($args['id']);
        $response->getBody()->write(json_encode($rta));
        return $response;
    }

    public function addOne(Request $request, Response $response, $args) {
        //$materia = new Materia($request->getParsedBody()); //obtener los 3 datos pasados por postman

        $params = (array) $request->getParsedBody();
        $materia = Materia::create($params);
        $rta = $materia->save();
        $response->getBody()->write(json_encode($rta));
        return $response;
    }

    public function updateOne(Request $request, Response $response, $args) {
        $user = Materia::find(10);

        $user->Materia = "Pepe Grillo!";
        $rta = $user->save();
        $response->getBody()->write(json_encode($rta));
        return $response;
    }

    public function deleteOne(Request $request, Response $response, $args) {
        $user = Materia::find(10);
        $rta = $user->delete();
        $response->getBody()->write(json_encode($rta));
        return $response;
    }

    public function addNota(Request $request, Response $response, $args)
    {
        $params = $request->getParsedBody();

        $alumnoNota = new AlumnoNotas;
        $alumnoNota->nota = $params['nota'];
        $alumnoNota->idAlumno = $params['idAlumno'];
        $alumnoNota->idMateria = $args['idMateria'];

        if($alumnoNota->save()){
            $response->getBody()->write('La nota ha sido asignada con exito');
            return $response;
        }else{
            $response->getBody()->write('No se pudo asignar la nota');
            return $response->withStatus(500);
        }
    }



}