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
    
    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10 text-begin text-danger">
            <a href="<?= URLROOT; ?>/ZangeresController/create"
               class="btn btn-warning"
               role="button">Nieuwe zangeres
            </a> 
        </div>
    </div>    

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Land</th>
                        <th>Geschat vermogen</th>
                        <th>Genre</th>
                        <th>Geboortedatum</th>
                        <th>Aantal albums</th>
                        <th>Actief sinds</th>
                        <th>Bekend van</th>
                        <th>Wijzig</th>
                        <th>Verwijder</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($data['result'] as $zangeres) : ?>
                        <tr>
                            <td><?= $zangeres->Naam; ?></td>
                            <td><?= $zangeres->Land; ?></td>
                            <td><?= $zangeres->GeschatVermogen; ?></td>
                            <td><?= $zangeres->Genre; ?></td>
                            <td><?= $zangeres->Geboortedatum; ?></td>
                            <td><?= $zangeres->AantalAlbums; ?></td>
                            <td><?= $zangeres->ActiefSinds; ?></td>
                            <td><?= $zangeres->BekendVan; ?></td>
                            <td class="text-center">
                                <a href="<?= URLROOT; ?>/ZangeresController/update/<?= $zangeres->Id; ?>">
                                    <i class="bi bi-pencil-fill text-success"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="<?= URLROOT; ?>/ZangeresController/delete/<?= $zangeres->Id; ?>"
                                   onclick="return confirm('Weet je zeker dat je dit record wilt verwijderen?');">
                                    <i class="bi bi-trash3-fill text-danger"></i>  
                                </a>
                            </td>                          
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <a href="<?php echo URLROOT; ?>/homepages/index"><i class="bi bi-arrow-left"></i></a>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>