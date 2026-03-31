<?php

class HorlogeController extends BaseController
{
    private $horlogeModel;

    public function __construct()
    {
        $this->horlogeModel = $this->model('Horloge');
    }

    public function index($display='none', $message = '')
    {
        $result = $this->horlogeModel->getAllHorloges();

        // var_dump($result);

        $data = [
            'title' => 'Duurste Horloges',
            'display' => $display,
            'message' => $message,
            'result' => $result
        ];

        $this->view('horloge/index', $data);
    }

    public function delete($Id)
    {
        $result = $this->horlogeModel->delete($Id);

        header('Refresh:3 ; url=' . URLROOT . 'horlogeController/index');

        $this->index('flex', 'Record is verwijdert');
    }

    public function create()
    {
        $data = [
            'title'   => 'Nieuwe horloge toevoegen',
            'display' => 'none',
            'message' => ''
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['merk']) ||
                empty($_POST['model']) ||
                empty($_POST['prijs']) ||
                empty($_POST['materiaal']) ||
                empty($_POST['gewicht']) ||
                empty($_POST['releasedatum']) ||
                empty($_POST['waterdichtheid']) ||
                empty($_POST['type']) ||
                empty($_POST['uniekkenmerk'])) {

                $data['display'] = 'flex';
                $data['message'] = 'Vul alle velden in';
                $data['color'] = 'danger';
            }
            else {
                $data['display'] = 'flex';
                $data['message'] = 'De gegevens zijn opgeslagen';
                $data['color'] = 'success';
                
                $this->horlogeModel->create($_POST);

                header('Refresh: 3; URL=' . URLROOT . '/HorlogeController/index');
            }
        }
        $this->view('horloge/create', $data);
    }
    
    public function update($id=NULL)
    {
        $data = [
            'title'   => 'Wijzig horloge',
            'display' => 'none',
            'message' => ''
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['merk']) ||
                empty($_POST['model']) ||
                empty($_POST['prijs']) ||
                empty($_POST['materiaal']) ||
                empty($_POST['gewicht']) ||
                empty($_POST['releasedatum']) ||
                empty($_POST['waterdichtheid']) ||
                empty($_POST['type']) ||
                empty($_POST['uniekkenmerk'])) {

                $data['display'] = 'flex';
                $data['message'] = 'Vul alle velden in';
                $data['color'] = 'danger';
            }
            else {
                $result = $this->horlogeModel->updateHorloge($_POST);

                $data['display'] = 'flex';
                $data['message'] = 'Het record is succesvol opgeslagen';
                $data['color'] = 'success';
                header("Refresh: 3; URL='/horlogeController/index'");
            }
        }        

        // laat de model de data ophalen uit de database
        $data['horloge'] = $this->horlogeModel->getHorlogeById($id);

        $this->view('horloge/update', $data);
    }
}