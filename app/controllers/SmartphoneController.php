<?php

class SmartphoneController extends BaseController
{
    private $smartphoneModel;

    public function __construct()
    {
        $this->smartphoneModel = $this->model('Smartphone');
    }

    public function index($display='none', $message = '')
    {
        $result = $this->smartphoneModel->getAllSmartphones();

        // var_dump($result);

        $data = [
            'title' => 'Overzicht smartphones',
            'display' => $display,
            'message' => $message,
            'result' => $result
        ];

        $this->view('smartphone/index', $data);
    }

    public function delete($Id)
    {
        $result = $this->smartphoneModel->delete($Id);

        header('Refresh:3 ; url=' . URLROOT . 'smartphoneController/index');

        $this->index('flex', 'Record is verwijdert');
    }

    public function create()
    {
        $data = [
            'title'   => 'Nieuwe smartphone toevoegen',
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
            
            if (empty(trim($_POST['prijs']))) {
                $errors['prijs'] = 'Voer een prijs in';
            } elseif (!is_numeric($_POST['prijs']) || $_POST['prijs'] < 0 || $_POST['prijs'] > 99999.99) {
                $errors['prijs'] = 'Voer een geldige prijs in (0 - 99999,99)';
            } elseif (!preg_match('/^\d+(\.\d{1,2})?$/', $_POST['prijs'])) {
                $errors['prijs'] = 'Prijs mag maximaal 2 decimalen bevatten';
            }
            
            if (empty(trim($_POST['geheugen']))) {
                $errors['geheugen'] = 'Voer geheugen in';
            } elseif (!is_numeric($_POST['geheugen']) || $_POST['geheugen'] < 0 || $_POST['geheugen'] > 4000) {
                $errors['geheugen'] = 'Voer een geldig geheugen in (0 - 4000 GB)';
            } elseif (!preg_match('/^\d+$/', $_POST['geheugen'])) {
                $errors['geheugen'] = 'Geheugen mag alleen gehele getallen bevatten';
            }

            if (empty(trim($_POST['besturingssysteem']))) {
                $errors['besturingssysteem'] = 'Voer besturingssysteem in';
            } elseif (strlen($_POST['besturingssysteem']) > 20) {
                $errors['besturingssysteem'] = 'Maximaal 20 tekens';
            } elseif (!preg_match('/^[a-zA-Z0-9\s]+$/', $_POST['besturingssysteem'])) {
                $errors['besturingssysteem'] = 'Besturingssysteem mag alleen letters, cijfers en spaties bevatten';
            }   

            if (empty(trim($_POST['schermgrootte']))) {
                $errors['schermgrootte'] = 'Voer schermgrootte in';
            } elseif (!is_numeric($_POST['schermgrootte']) || $_POST['schermgrootte'] < 0 || $_POST['schermgrootte'] > 10) {
                $errors['schermgrootte'] = 'Voer een geldige schermgrootte in (0 - 10 inch)';
            } elseif (!preg_match('/^\d+(\.\d{1,2})?$/', $_POST['schermgrootte'])) {
                $errors['schermgrootte'] = 'Schermgrootte mag maximaal 2 decimalen bevatten';
            }

            if (empty(trim($_POST['releasedatum']))) {
                $errors['releasedatum'] = 'Voer release datum in';
            } elseif (!DateTime::createFromFormat('Y-m-d', $_POST['releasedatum'])) {
                $errors['releasedatum'] = 'Voer een geldige datum in (jjjj-mm-dd)';
            } elseif (DateTime::createFromFormat('Y-m-d', $_POST['releasedatum']) > new DateTime()) {
                $errors['releasedatum'] = 'Releasedatum mag niet in de toekomst liggen';
            }

            if (empty(trim($_POST['megapixels']))) {
                $errors['megapixels'] = 'Voer megapixels in';
            } elseif (!is_numeric($_POST['megapixels']) || $_POST['megapixels'] < 0 || $_POST['megapixels'] > 200) {
                $errors['megapixels'] = 'Voer een geldig aantal in (0 - 200)';
            } elseif (!preg_match('/^\d+$/', $_POST['megapixels'])) {
                $errors['megapixels'] = 'Megapixels mag alleen gehele getallen bevatten';
            }

            if (!empty($errors)) {
                $data['errors'] = $errors;
            }
            else {
                $data['display'] = 'flex';
                $data['message'] = 'De gegevens zijn opgeslagen';
                $data['color'] = 'success';

                $this->smartphoneModel->create($_POST);

                header('Refresh: 3; URL=' . URLROOT . '/SmartphoneController/index');
            }
        }
        $this->view('smartphone/create', $data);
    }

    public function update($id=NULL)
    {
        $data = [
            'title'   => 'Wijzig smartphone',
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
            
            if (empty(trim($_POST['prijs']))) {
                $errors['prijs'] = 'Voer een prijs in';
            } elseif (!is_numeric($_POST['prijs']) || $_POST['prijs'] < 0 || $_POST['prijs'] > 9999.99) {
                $errors['prijs'] = 'Voer een geldige prijs in (0 - 9999,99)';
            } elseif (!preg_match('/^\d+(\.\d{1,2})?$/', $_POST['prijs'])) {
                $errors['prijs'] = 'Prijs mag maximaal 2 decimalen bevatten';
            }
            
            if (empty(trim($_POST['geheugen']))) {
                $errors['geheugen'] = 'Voer geheugen in';
            } elseif (!is_numeric($_POST['geheugen']) || $_POST['geheugen'] < 0 || $_POST['geheugen'] > 4000) {
                $errors['geheugen'] = 'Voer een geldig geheugen in (0 - 4000 GB)';
            } elseif (!preg_match('/^\d+$/', $_POST['geheugen'])) {
                $errors['geheugen'] = 'Geheugen mag alleen gehele getallen bevatten';
            }

            if (empty(trim($_POST['besturingssysteem']))) {
                $errors['besturingssysteem'] = 'Voer besturingssysteem in';
            } elseif (strlen($_POST['besturingssysteem']) > 20) {
                $errors['besturingssysteem'] = 'Maximaal 20 tekens';
            } elseif (!preg_match('/^[a-zA-Z0-9\s]+$/', $_POST['besturingssysteem'])) {
                $errors['besturingssysteem'] = 'Besturingssysteem mag alleen letters, cijfers en spaties bevatten';
            }   

            if (empty(trim($_POST['schermgrootte']))) {
                $errors['schermgrootte'] = 'Voer schermgrootte in';
            } elseif (!is_numeric($_POST['schermgrootte']) || $_POST['schermgrootte'] < 0 || $_POST['schermgrootte'] > 10) {
                $errors['schermgrootte'] = 'Voer een geldige schermgrootte in (0 - 10 inch)';
            } elseif (!preg_match('/^\d+(\.\d{1,2})?$/', $_POST['schermgrootte'])) {
                $errors['schermgrootte'] = 'Schermgrootte mag maximaal 2 decimalen bevatten';
            }

            if (empty(trim($_POST['releasedatum']))) {
                $errors['releasedatum'] = 'Voer release datum in';
            } elseif (!DateTime::createFromFormat('Y-m-d', $_POST['releasedatum'])) {
                $errors['releasedatum'] = 'Voer een geldige datum in (jjjj-mm-dd)';
            } elseif (DateTime::createFromFormat('Y-m-d', $_POST['releasedatum']) > new DateTime()) {
                $errors['releasedatum'] = 'Releasedatum mag niet in de toekomst liggen';
            }

            if (empty(trim($_POST['megapixels']))) {
                $errors['megapixels'] = 'Voer megapixels in';
            } elseif (!is_numeric($_POST['megapixels']) || $_POST['megapixels'] < 0 || $_POST['megapixels'] > 200) {
                $errors['megapixels'] = 'Voer een geldig aantal in (0 - 200)';
            } elseif (!preg_match('/^\d+$/', $_POST['megapixels'])) {
                $errors['megapixels'] = 'Megapixels mag alleen gehele getallen bevatten';
            }

            if (!empty($errors)) {
                $data['errors'] = $errors;
            }
            else {
                $result = $this->smartphoneModel->updateSmartphone($_POST);

                $data['display'] = 'flex';
                $data['message'] = 'Het record is succesvol opgeslagen';
                $data['color'] = 'success';
                header("Refresh: 3; URL='/smartphoneController/index'");
            }
        }        

        // laat de model de data ophalen uit de database
        $data['smartphone'] = $this->smartphoneModel->getSmartphoneById($id);

        $this->view('smartphone/update', $data);
    }
}