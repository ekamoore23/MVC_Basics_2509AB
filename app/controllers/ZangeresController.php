<?php

class ZangeresController extends BaseController
{
    private $zangeresModel;

    public function __construct()
    {
        $this->zangeresModel = $this->model('Zangeres');
    }

    public function index($display = 'none', $message = '')
    {
        $result = $this->zangeresModel->getAllZangeressen();

        $data = [
            'title' => 'Rijkste Zangeressen',
            'display' => $display,
            'message' => $message,
            'result' => $result
        ];

        $this->view('zangeres/index', $data);
    }

    public function delete($Id)
    {
        $result = $this->zangeresModel->delete($Id);

        header('Refresh:3; url=' . URLROOT . '/ZangeresController/index');

        $this->index('flex', 'Record is verwijderd');
    }

    public function create()
    {
        $data = [
            'title'   => 'Nieuwe zangeres toevoegen',
            'display' => 'none',
            'message' => '',
            'errors'  => []
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $errors = [];

            if (empty(trim($_POST['naam']))) {
                $errors['naam'] = 'Voer een naam in';
            } elseif (strlen($_POST['naam']) > 100) {
                $errors['naam'] = 'Naam mag maximaal 100 tekens bevatten';
            } elseif (!preg_match('/^[a-zA-ZÀ-ÿ\s\'\-]+$/u', $_POST['naam'])) {
                $errors['naam'] = 'Naam mag alleen letters, spaties, apostrof en koppelteken bevatten';
            }

            if (empty(trim($_POST['land']))) {
                $errors['land'] = 'Voer een land in';
            } elseif (strlen($_POST['land']) > 50) {
                $errors['land'] = 'Land mag maximaal 50 tekens bevatten';
            } elseif (!preg_match('/^[a-zA-ZÀ-ÿ\s\-]+$/u', $_POST['land'])) {
                $errors['land'] = 'Land mag alleen letters, spaties en koppelteken bevatten';
            }

            if (empty(trim($_POST['geschatvermogen']))) {
                $errors['geschatvermogen'] = 'Voer een geschat vermogen in';
            } elseif (!is_numeric($_POST['geschatvermogen']) || $_POST['geschatvermogen'] < 0 || $_POST['geschatvermogen'] > 999999999999) {
                $errors['geschatvermogen'] = 'Voer een geldig vermogen in';
            }

            if (empty(trim($_POST['genre']))) {
                $errors['genre'] = 'Voer een genre in';
            } elseif (strlen($_POST['genre']) > 50) {
                $errors['genre'] = 'Genre mag maximaal 50 tekens bevatten';
            } elseif (!preg_match('/^[a-zA-ZÀ-ÿ0-9\s\/&\-]+$/u', $_POST['genre'])) {
                $errors['genre'] = 'Genre bevat ongeldige tekens';
            }

            if (empty(trim($_POST['geboortedatum']))) {
                $errors['geboortedatum'] = 'Voer een geboortedatum in';
            } elseif (!DateTime::createFromFormat('Y-m-d', $_POST['geboortedatum'])) {
                $errors['geboortedatum'] = 'Voer een geldige datum in (jjjj-mm-dd)';
            } elseif (DateTime::createFromFormat('Y-m-d', $_POST['geboortedatum']) > new DateTime()) {
                $errors['geboortedatum'] = 'Geboortedatum mag niet in de toekomst liggen';
            }

            if (empty(trim($_POST['aantalalbums']))) {
                $errors['aantalalbums'] = 'Voer het aantal albums in';
            } elseif (!filter_var($_POST['aantalalbums'], FILTER_VALIDATE_INT) && $_POST['aantalalbums'] != '0') {
                $errors['aantalalbums'] = 'Aantal albums moet een geheel getal zijn';
            } elseif ($_POST['aantalalbums'] < 0 || $_POST['aantalalbums'] > 9999) {
                $errors['aantalalbums'] = 'Aantal albums moet tussen 0 en 9999 liggen';
            }

            if (empty(trim($_POST['actiefsinds']))) {
                $errors['actiefsinds'] = 'Voer actief sinds in';
            } elseif (!preg_match('/^\d{4}$/', $_POST['actiefsinds'])) {
                $errors['actiefsinds'] = 'Voer een geldig jaartal in';
            } elseif ($_POST['actiefsinds'] < 1900 || $_POST['actiefsinds'] > date('Y')) {
                $errors['actiefsinds'] = 'Actief sinds moet tussen 1900 en dit jaar liggen';
            }

            if (empty(trim($_POST['bekendvan']))) {
                $errors['bekendvan'] = 'Voer in waar deze zangeres bekend van is';
            } elseif (strlen($_POST['bekendvan']) > 100) {
                $errors['bekendvan'] = 'BekendVan mag maximaal 100 tekens bevatten';
            }

            if (!empty($errors)) {
                $data['errors'] = $errors;
            } else {
                $data['display'] = 'flex';
                $data['message'] = 'De gegevens zijn opgeslagen';

                $this->zangeresModel->create($_POST);

                header('Refresh: 3; URL=' . URLROOT . '/ZangeresController/index');
            }
        }

        $this->view('zangeres/create', $data);
    }

    public function update($id = NULL)
    {
        $data = [
            'title'   => 'Wijzig zangeres',
            'display' => 'none',
            'message' => '',
            'errors'  => []
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $errors = [];

            if (empty(trim($_POST['naam']))) {
                $errors['naam'] = 'Voer een naam in';
            } elseif (strlen($_POST['naam']) > 100) {
                $errors['naam'] = 'Naam mag maximaal 100 tekens bevatten';
            } elseif (!preg_match('/^[a-zA-ZÀ-ÿ\s\'\-]+$/u', $_POST['naam'])) {
                $errors['naam'] = 'Naam mag alleen letters, spaties, apostrof en koppelteken bevatten';
            }

            if (empty(trim($_POST['land']))) {
                $errors['land'] = 'Voer een land in';
            } elseif (strlen($_POST['land']) > 50) {
                $errors['land'] = 'Land mag maximaal 50 tekens bevatten';
            } elseif (!preg_match('/^[a-zA-ZÀ-ÿ\s\-]+$/u', $_POST['land'])) {
                $errors['land'] = 'Land mag alleen letters, spaties en koppelteken bevatten';
            }

            if (empty(trim($_POST['geschatvermogen']))) {
                $errors['geschatvermogen'] = 'Voer een geschat vermogen in';
            } elseif (!is_numeric($_POST['geschatvermogen']) || $_POST['geschatvermogen'] < 0 || $_POST['geschatvermogen'] > 999999999999) {
                $errors['geschatvermogen'] = 'Voer een geldig vermogen in';
            }

            if (empty(trim($_POST['genre']))) {
                $errors['genre'] = 'Voer een genre in';
            } elseif (strlen($_POST['genre']) > 50) {
                $errors['genre'] = 'Genre mag maximaal 50 tekens bevatten';
            } elseif (!preg_match('/^[a-zA-ZÀ-ÿ0-9\s\/&\-]+$/u', $_POST['genre'])) {
                $errors['genre'] = 'Genre bevat ongeldige tekens';
            }

            if (empty(trim($_POST['geboortedatum']))) {
                $errors['geboortedatum'] = 'Voer een geboortedatum in';
            } elseif (!DateTime::createFromFormat('Y-m-d', $_POST['geboortedatum'])) {
                $errors['geboortedatum'] = 'Voer een geldige datum in (jjjj-mm-dd)';
            } elseif (DateTime::createFromFormat('Y-m-d', $_POST['geboortedatum']) > new DateTime()) {
                $errors['geboortedatum'] = 'Geboortedatum mag niet in de toekomst liggen';
            }

            if (empty(trim($_POST['aantalalbums']))) {
                $errors['aantalalbums'] = 'Voer het aantal albums in';
            } elseif (!filter_var($_POST['aantalalbums'], FILTER_VALIDATE_INT) && $_POST['aantalalbums'] != '0') {
                $errors['aantalalbums'] = 'Aantal albums moet een geheel getal zijn';
            } elseif ($_POST['aantalalbums'] < 0 || $_POST['aantalalbums'] > 9999) {
                $errors['aantalalbums'] = 'Aantal albums moet tussen 0 en 9999 liggen';
            }

            if (empty(trim($_POST['actiefsinds']))) {
                $errors['actiefsinds'] = 'Voer actief sinds in';
            } elseif (!preg_match('/^\d{4}$/', $_POST['actiefsinds'])) {
                $errors['actiefsinds'] = 'Voer een geldig jaartal in';
            } elseif ($_POST['actiefsinds'] < 1900 || $_POST['actiefsinds'] > date('Y')) {
                $errors['actiefsinds'] = 'Actief sinds moet tussen 1900 en dit jaar liggen';
            }

            if (empty(trim($_POST['bekendvan']))) {
                $errors['bekendvan'] = 'Voer in waar deze zangeres bekend van is';
            } elseif (strlen($_POST['bekendvan']) > 100) {
                $errors['bekendvan'] = 'BekendVan mag maximaal 100 tekens bevatten';
            }

            if (!empty($errors)) {
                $data['errors'] = $errors;
            } else {
                $result = $this->zangeresModel->updateZangeres($_POST);

                $data['display'] = 'flex';
                $data['message'] = 'Het record is succesvol opgeslagen';
                $data['color'] = 'success';
                header('Refresh: 3; URL=' . URLROOT . '/ZangeresController/index');
            }
        }

        $data['zangeres'] = $this->zangeresModel->getZangeresById($id);

        $this->view('zangeres/update', $data);
    }
}