<?php require_once APPROOT . '/views/includes/header.php'; ?>

<?php // var_dump($_POST); ?>

<!-- Voor het centreren van de container gebruiken we het bootstrap grid -->
<div class="container">
    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-6">
            <h3 class="text-success"><?php echo $data['title']; ?></h3>
        </div>
    </div>

    <!-- Terugkoppeling naar de gebruiker -->
    <?php if (!empty($data['message'])): ?>
    <div class="row mt-3 d-<?= $data['display']; ?> justify-content-center">
        <div class="col-6 text-begin text-primary">
            <div class="alert alert-<?= $data['color']; ?>" role="alert">
                <?= $data['message'] ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-6">
            <form action="<?= URLROOT; ?>/HorlogeController/update/<?= $data['horloge']->Id ?>" method="post">

                <div class="mb-3">
                    <label for="merk" class="form-label">Merk</label>
                    <input name="merk" type="text" class="form-control" id="merk" value="<?= $_POST['merk'] ?? $data['horloge']->Merk ?>">
                </div>

                <div class="mb-3">
                    <label for="model" class="form-label">Model</label>
                    <input name="model" type="text" class="form-control" id="model" value="<?= $_POST['model'] ?? $data['horloge']->Model ?>" required>
                </div>

                <div class="mb-3">
                    <label for="prijs" class="form-label">Prijs</label>
                    <input name="prijs" type="number" min="0" max="99999" step="0.01" class="form-control" id="prijs" value="<?= $_POST['prijs'] ?? $data['horloge']->Prijs ?>" required>
                </div>

                <div class="mb-3">
                    <label for="materiaal" class="form-label">Materiaal</label>
                    <input name="materiaal" type="text" class="form-control" id="materiaal" value="<?= $_POST['materiaal'] ?? $data['horloge']->Materiaal ?>" required>
                </div>

                <div class="mb-3">
                    <label for="gewicht" class="form-label">Gewicht (g)</label>
                    <input name="gewicht" type="number" min="0" max="1000" step="1.00" class="form-control" id="gewicht" value="<?= $_POST['gewicht'] ?? $data['horloge']->Gewicht ?>" required>
                </div>

                <div class="mb-3">
                    <label for="releasedatum" class="form-label">Releasedatum</label>
                    <input name="releasedatum" type="date" class="form-control" id="releasedatum" value="<?= $_POST['releasedatum'] ?? $data['horloge']->Releasedatum ?>" required>
                </div>

                <div class="mb-3">
                    <label for="waterdichtheid" class="form-label">Waterdichtheid (m)</label>
                    <input name="waterdichtheid" type="text" class="form-control" id="waterdichtheid" value="<?= $_POST['waterdichtheid'] ?? $data['horloge']->Waterdichtheid ?>" required>
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <input name="type" type="text" class="form-control" id="type" value="<?= $_POST['type'] ?? $data['horloge']->Type ?>" required>
                </div>

                <div class="mb-3">
                    <label for="uniekkenmerk" class="form-label">Uniek Kenmerk</label>
                    <input name="uniekkenmerk" type="text" class="form-control" id="uniekkenmerk" value="<?= $_POST['uniekkenmerk'] ?? $data['horloge']->UniekKenmerk ?>" required>
                </div>
                <input type="hidden" name="id" value="<?= $_POST['id'] ?? $data['horloge']->Id; ?>">
                <button type="submit" class="btn btn-primary">Verstuur</button>
            </form>

            <a href="<?= URLROOT; ?>/homepages/index">
                <i class="bi bi-arrow-left"></i>
            </a>
        </div>
    </div>
</div>

<!-- eind tabel -->
<?php require_once APPROOT . '/views/includes/footer.php'; ?>