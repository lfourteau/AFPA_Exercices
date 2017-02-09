<?php

// Routes

$app->group('/api/v1', function () use ($app) {

    // get all garages
    $app->get('/garage', function ($request, $response, $args) {
        $sth = $this->db->prepare("SELECT * FROM garage");
        $sth->execute();
        $garages = $sth->fetchAll();
        return $this->response->withJson($garages);
    });
});
