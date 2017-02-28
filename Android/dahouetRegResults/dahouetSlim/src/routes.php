<?php

// Routes
$app->group('/api/v1', function () use ($app) {
// get all regates
    $app->get('/regates', function ($request, $response, $args) {        
        $sth = $this->db->prepare("SELECT * FROM regate r INNER JOIN challenge c on r.cha_id = c.cha_id WHERE c.cha_date_debut < CURDATE() AND c.cha_date_fin > CURDATE()");
        $sth->execute();
        $regates = $sth->fetchAll();
        return $this->response->withJson($regates);
    });
});
