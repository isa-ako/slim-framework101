<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// $app->get('/', function ($request, $response, $args) {
// 	$str = '';
//     return $response->getBody()->write($str);
// });

// $app->get('/', function ($request, $response, $args){
// 	$data['key'] = 'value';

//     return $this->tpl->render($response, 'template.php', $data);
// });

$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("<H1>Selamat datang di pemrograman web dengan Slim</H1>");
    return $response;
});

$app->get('/actors', function ($request, $response, $args){
	$stmt = $this->pdo->prepare('select * from actor');
	$stmt->execute();
	$data['data_actor'] = $stmt->fetchAll();

    return $this->tpl->render($response, 'list-actor.php', $data);
});

$app->get('/kota/{id_negara}', function ($request, $response, $args){
    $query = "SELECT city_id, city, city.country_id, country FROM city 
            JOIN country ON (city.country_id = country.country_id)
            WHERE city.country_id = ?";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([$args['id_negara']]);

    $data['kota'] = $stmt->fetchAll();

    return $this->tpl->render($response, 'list-kota.php', $data);
});

$app->get('/city[/{id_city}]', function ($request, $response, $args){
    $data['key'] = '';
    $data['msg'] = '';
    $data['city'] = [];
    $data['act'] = isset($args['id_city']) ? 'upd' : 'ins';

    $stmt_data = $this->pdo->query('select * from country');
    $data['data_country'] = $stmt_data->fetchAll();

    if( isset($args['id_city']) ){
        $sql_city = 'select * from city where city_id = ?';
        $stmt_city = $this->pdo->prepare($sql_city);
        $stmt_city->execute([$args['id_city']]);
        $data['city'] = $stmt_city->fetch();
    }
    
    return $this->tpl->render($response, 'form_city.php', $data);
});

$app->post('/city[/{id_city}]', function ($request, $response, $args){
    $data['msg'] = '';
    if($request->getParam('act') == 'ins'){
        $sql = 'INSERT INTO city (city, country_id, last_update) VALUES (?, ?, NOW())';
        $stmt = $this->pdo->prepare($sql);
        $values = [
            $request->getParam('city'),
            $request->getParam('country_id')
        ];
        $res = $stmt->execute($values);
        if($res){
            $data['msg'] = 'Input data kota '.$request->getParam('city').' berhasil';
        }
    }
    elseif($request->getParam('act') == 'upd'){
        $sql = 'UPDATE city SET city = ?, country_id = ?, last_update = NOW() WHERE city_id = ?';
        $stmt = $this->pdo->prepare($sql);
        $id = $args['id_city'];
        $values = [
            $request->getParam('city'),
            $request->getParam('country_id'),
            $id
        ];
        $res = $stmt->execute($values);
        if($res){
            $data['msg'] = 'Update data kota '.$request->getParam('city').' berhasil';
        }
    }

    echo $data['msg'];
});

$app->get('/del-city/{id_city}', function ($request, $response, $args){
    $query = 'DELETE FROM city WHERE city_id = ?';
    $stmt = $this->pdo->prepare($query);
    $res = $stmt->execute([$args['id_city']]);

    if($res){
        echo 'Delete data kota id '.$args['id_city'].' berhasil';
    }else{
        echo 'Delete data kota id '.$args['id_city'].' gagal';
    }
});