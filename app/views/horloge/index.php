<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-3 d-flex justify-content-center">

        <div class="col-10">
            <h3><?php echo $data['title']; ?></h3>
        </div>
    </div>

        <div class="row mt-3 d-<?= $data['display']; ?> justify-content-center">
        <div class="col-10 text-begin text-primary">
            <div class="alert alert-success" role="alert">
                <?= $data['message'] ?>
            </div>
        </div>
    </div>
    
        <!-- Knop voor het maken van een nieuw horloge record -->
    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10 text-begin text-danger">
            <a href="<?= URLROOT; ?>/HorlogeController/create"
               class="btn btn-warning"
               role="button">Nieuwe horloge
            </a> 
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Merk</th>
                        <th>Model</th>
                        <th>Prijs</th>
                        <th>Materiaal</th>
                        <th>Gewicht</th>
                        <th>Releasedatum</th>
                        <th>Waterdichtheid</th>
                        <th>Type</th>
                        <th>Uniek Kenmerk</th>
                        <th>Wijzig</th>
                        <th>Verwijder</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($data['result'] as $horloge) : ?>
                        <tr>
                            <td><?= $horloge->Merk; ?></td>
                            <td><?= $horloge->Model; ?></td>
                            <td><?= $horloge->Prijs; ?></td>
                            <td><?= $horloge->Materiaal; ?></td>
                            <td><?= $horloge->Gewicht; ?></td>
                            <td><?= $horloge->Releasedatum; ?></td>
                            <td><?= $horloge->Waterdichtheid; ?></td>
                            <td><?= $horloge->Type; ?></td>
                            <td><?= $horloge->UniekKenmerk; ?></td>
                            <td class="text-center">
                                <a href="<?=  URLROOT; ?>/HorlogeController/update/<?=  $horloge->Id; ?>">
                                    <i class="bi bi-pencil-fill text-success"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="<?= URLROOT; ?>/HorlogeController/delete/<?= $horloge->Id; ?>"
                                    onclick="return confirm('Weet je zeker dat je dit record wilt verwijderen?');">
                                    <i class="bi bi-trash3-fill text-danger"></i>  
                                </a>
                            </td>                          
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <a href="<?= URLROOT; ?>/homepages/index" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Terug naar homepage
            </a>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>