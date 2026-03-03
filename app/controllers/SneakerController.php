<?php

class SneakerController extends BaseController
{
    private $sneakerModel;

    public function __construct()
    {
        $this->sneakerModel = $this->model('Sneaker');
    }

    public function index()
    {
        $result = $this->sneakerModel->getAllSneakers();

        // var_dump($result);

        $data = [
            'title' => 'Mooiste Sneakers',
            'result' => $result
        ];

        $this->view('sneaker/index', $data);
    }
}