<?php

class SneakerController extends BaseController
{
    private $sneakerModel;

    public function __construct()
    {
        $this->sneakerModel = $this->model('Sneaker');
    }

    public function index($display='none', $message = '')
    {
        $result = $this->sneakerModel->getAllSneakers();

        // var_dump($result);

        $data = [
            'title' => 'Mooiste Sneakers',
            'display' => $display,
            'message' => $message,
            'result' => $result
        ];

        $this->view('sneaker/index', $data);
    }

    public function delete($Id)
    {
        $result = $this->sneakerModel->delete($Id);

        header('Refresh:3 ; url=' . URLROOT . '/sneakerController/index');

        $this->index('flex', 'Record is verwijdert');
    }

    public function create()
    {
        $data = [
            'title'   => 'Nieuwe sneaker toevoegen',
            'display' => 'none',
            'message' => '',
            'errors'  => []
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $errors = [];

            if (empty(trim($_POST['merk']))) {
                $errors['merk'] = 'Voer een merk in';
            } elseif (strlen($_POST['merk']) > 20) {
                $errors['merk'] = 'Merk mag maximaal 20 tekens bevatten';
            } elseif (!preg_match('/^[a-zA-Z0-9\s]+$/', $_POST['merk'])) {
                $errors['merk'] = 'Merk mag alleen letters, cijfers en spaties bevatten';
            }

            if (empty(trim($_POST['model']))) {
                $errors['model'] = 'Voer een model in';
            } elseif (strlen($_POST['model']) > 20) {
                $errors['model'] = 'Model mag maximaal 20 tekens bevatten';
            } elseif (!preg_match('/^[a-zA-Z0-9\s]+$/', $_POST['model'])) {
                $errors['model'] = 'Model mag alleen letters, cijfers en spaties bevatten';
            }

            if (empty(trim($_POST['type']))) {
                $errors['type'] = 'Voer een type in';
            } elseif (strlen($_POST['type']) > 20) {
                $errors['type'] = 'Type mag maximaal 20 tekens bevatten';
            } elseif (!preg_match('/^[a-zA-Z0-9\s]+$/', $_POST['type'])) {
                $errors['type'] = 'Type mag alleen letters, cijfers en spaties bevatten';
            }
            
            if (empty(trim($_POST['prijs']))) {
                $errors['prijs'] = 'Voer een prijs in';
            } elseif (!is_numeric($_POST['prijs']) || $_POST['prijs'] < 0 || $_POST['prijs'] > 99999.99) {
                $errors['prijs'] = 'Voer een geldige prijs in (0 - 99999,99)';
            } elseif (!preg_match('/^\d+(\.\d{1,2})?$/', $_POST['prijs'])) {
                $errors['prijs'] = 'Prijs mag maximaal 2 decimalen bevatten';
            }

            if (empty(trim($_POST['materiaal']))) {
                $errors['materiaal'] = 'Voer materiaal in';
            } elseif (strlen($_POST['materiaal']) > 30) {
                $errors['materiaal'] = 'Maximaal 30 tekens';
            } elseif (!preg_match('/^[a-zA-Z0-9\s]+$/', $_POST['materiaal'])) {
                $errors['materiaal'] = 'Materiaal mag alleen letters, cijfers en spaties bevatten';
            }   

            if (empty(trim($_POST['gewicht']))) {
                $errors['gewicht'] = 'Voer gewicht in';
            } elseif (!is_numeric($_POST['gewicht']) || $_POST['gewicht'] < 0 || $_POST['gewicht'] > 1000) {
                $errors['gewicht'] = 'Voer een geldig gewicht in (0 - 1000 g)';
            } elseif (!preg_match('/^\d+(\.\d{1,2})?$/', $_POST['gewicht'])) {
                $errors['gewicht'] = 'Gewicht mag maximaal 2 decimalen bevatten';
            }

            if (empty(trim($_POST['releasedatum']))) {
                $errors['releasedatum'] = 'Voer release datum in';
            } elseif (!DateTime::createFromFormat('Y-m-d', $_POST['releasedatum'])) {
                $errors['releasedatum'] = 'Voer een geldige datum in (jjjj-mm-dd)';
            } elseif (DateTime::createFromFormat('Y-m-d', $_POST['releasedatum']) > new DateTime()) {
                $errors['releasedatum'] = 'Releasedatum mag niet in de toekomst liggen';
            }

            if (!empty($errors)) {
                $data['errors'] = $errors;
            }
            else {
                $data['display'] = 'flex';
                $data['message'] = 'De gegevens zijn opgeslagen';

                $this->sneakerModel->create($_POST);

                header('Refresh: 3; URL=' . URLROOT . '/SneakerController/index');
            }
        }
        $this->view('sneaker/create', $data);
    }

    public function update($id=NULL)
    {
        $data = [
            'title'   => 'Wijzig sneaker',
            'display' => 'none',
            'message' => '',
            'errors'  => []
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $errors = [];

            if (empty(trim($_POST['merk']))) {
                $errors['merk'] = 'Voer een merk in';
            } elseif (strlen($_POST['merk']) > 20) {
                $errors['merk'] = 'Merk mag maximaal 20 tekens bevatten';
            } elseif (!preg_match('/^[a-zA-Z0-9\s]+$/', $_POST['merk'])) {
                $errors['merk'] = 'Merk mag alleen letters, cijfers en spaties bevatten';
            }

            if (empty(trim($_POST['model']))) {
                $errors['model'] = 'Voer een model in';
            } elseif (strlen($_POST['model']) > 20) {
                $errors['model'] = 'Model mag maximaal 20 tekens bevatten';
            } elseif (!preg_match('/^[a-zA-Z0-9\s]+$/', $_POST['model'])) {
                $errors['model'] = 'Model mag alleen letters, cijfers en spaties bevatten';
            }

            if (empty(trim($_POST['type']))) {
                $errors['type'] = 'Voer een type in';
            } elseif (strlen($_POST['type']) > 20) {
                $errors['type'] = 'Type mag maximaal 20 tekens bevatten';
            } elseif (!preg_match('/^[a-zA-Z0-9\s]+$/', $_POST['type'])) {
                $errors['type'] = 'Type mag alleen letters, cijfers en spaties bevatten';
            }
            
            if (empty(trim($_POST['prijs']))) {
                $errors['prijs'] = 'Voer een prijs in';
            } elseif (!is_numeric($_POST['prijs']) || $_POST['prijs'] < 0 || $_POST['prijs'] > 99999.99) {
                $errors['prijs'] = 'Voer een geldige prijs in (0 - 99999,99)';
            } elseif (!preg_match('/^\d+(\.\d{1,2})?$/', $_POST['prijs'])) {
                $errors['prijs'] = 'Prijs mag maximaal 2 decimalen bevatten';
            }
            

            if (empty(trim($_POST['materiaal']))) {
                $errors['materiaal'] = 'Voer materiaal in';
            } elseif (strlen($_POST['materiaal']) > 30) {
                $errors['materiaal'] = 'Maximaal 30 tekens';
            } elseif (!preg_match('/^[a-zA-Z0-9\s]+$/', $_POST['materiaal'])) {
                $errors['materiaal'] = 'Materiaal mag alleen letters, cijfers en spaties bevatten';
            }   

            if (empty(trim($_POST['gewicht']))) {
                $errors['gewicht'] = 'Voer gewicht in';
            } elseif (!is_numeric($_POST['gewicht']) || $_POST['gewicht'] < 0 || $_POST['gewicht'] > 1000) {
                $errors['gewicht'] = 'Voer een geldig gewicht in (0 - 1000 g)';
            } elseif (!preg_match('/^\d+(\.\d{1,2})?$/', $_POST['gewicht'])) {
                $errors['gewicht'] = 'Gewicht mag maximaal 2 decimalen bevatten';
            }

            if (empty(trim($_POST['releasedatum']))) {
                $errors['releasedatum'] = 'Voer release datum in';
            } elseif (!DateTime::createFromFormat('Y-m-d', $_POST['releasedatum'])) {
                $errors['releasedatum'] = 'Voer een geldige datum in (jjjj-mm-dd)';
            } elseif (DateTime::createFromFormat('Y-m-d', $_POST['releasedatum']) > new DateTime()) {
                $errors['releasedatum'] = 'Releasedatum mag niet in de toekomst liggen';
            }

            if (!empty($errors)) {
                $data['errors'] = $errors;
            }
            else {
                $result = $this->sneakerModel->updateSneaker($_POST);

                $data['display'] = 'flex';
                $data['message'] = 'Het record is succesvol opgeslagen';
                $data['color'] = 'success';
                header("Refresh: 3; URL='/sneakerController/index'");
            }
        }        

        // laat de model de data ophalen uit de database
        $data['sneaker'] = $this->sneakerModel->getSneakerById($id);

        $this->view('sneaker/update', $data);
    }
}