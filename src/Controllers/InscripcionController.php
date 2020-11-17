<?php

namespace App\Controllers;

use App\Helpers\JwtHelper;
use App\Models\Inscripcion;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\Usuario;

class InscripcionController {
    public function addOne(Request $request, Response $response, $args) {
        $token = $request->getHeaderLine('token');
        $payload = JwtHelper::validatorJWT($token);
        $idMateria = (int) $args['idMateria'];
        $idAlumno = $payload->id;

        $inscripcion = ["alumno_id" => $idAlumno, "materia_id" => $idMateria];
//        $response->getBody()->write(json_encode($inscripcion));
//        return $response;
        $nuevaInscripcion = Inscripcion::create($inscripcion);

        $rta = $nuevaInscripcion->save();
        $response->getBody()->write(json_encode($rta));
        return $response;
    }
}