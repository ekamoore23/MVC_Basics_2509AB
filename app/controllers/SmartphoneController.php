<?php

class SmartphoneController extends BaseController
{
    private $smartphoneModel;

    public function __construct()
    {
        $this->smartphoneModel = $this->model('Smartphone');
    }

    public function index()
    {
        $result = $this->smartphoneModel->getAllSmartphones();

        // var_dump($result);

        $data = [
            'title' => 'Overzicht smartphones',
            'result' => $result
        ];

        $this->view('smartphone/index', $data);
    }
}