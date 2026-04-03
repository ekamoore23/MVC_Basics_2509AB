<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-6">
            <h3 class="text-success"><?php echo $data['title']; ?></h3>
        </div>
    </div>

    <div class="row mt-3 d-<?= $data['display']; ?> justify-content-center">
        <div class="col-6">
            <div class="alert alert-<?= $data['color'] ?? 'success'; ?>" role="alert">
                <?= $data['message']; ?>
            </div>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-6">
            <form action="<?= URLROOT; ?>/ZangeresController/update" method="post">

                <div class="mb-3">
                    <label for="naam" class="form-label">Naam</label>
                    <input name="naam" type="text" class="form-control <?= isset($data['errors']['naam']) ? 'is-invalid' : ''; ?>" id="naam" value="<?= $_POST['naam'] ?? $data['zangeres']->Naam; ?>">
                    <?php if (isset($data['errors']['naam'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['naam']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="land" class="form-label">Land</label>
                    <input name="land" type="text" class="form-control <?= isset($data['errors']['land']) ? 'is-invalid' : ''; ?>" id="land" value="<?= $_POST['land'] ?? $data['zangeres']->Land; ?>">
                    <?php if (isset($data['errors']['land'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['land']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="geschatvermogen" class="form-label">Geschat vermogen</label>
                    <input name="geschatvermogen" type="number" min="0" max="999999999999" step="1" class="form-control <?= isset($data['errors']['geschatvermogen']) ? 'is-invalid' : ''; ?>" id="geschatvermogen" value="<?= $_POST['geschatvermogen'] ?? $data['zangeres']->GeschatVermogen; ?>">
                    <?php if (isset($data['errors']['geschatvermogen'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['geschatvermogen']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="genre" class="form-label">Genre</label>
                    <input name="genre" type="text" class="form-control <?= isset($data['errors']['genre']) ? 'is-invalid' : ''; ?>" id="genre" value="<?= $_POST['genre'] ?? $data['zangeres']->Genre; ?>">
                    <?php if (isset($data['errors']['genre'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['genre']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="geboortedatum" class="form-label">Geboortedatum</label>
                    <input name="geboortedatum" type="date" class="form-control <?= isset($data['errors']['geboortedatum']) ? 'is-invalid' : ''; ?>" id="geboortedatum" value="<?= $_POST['geboortedatum'] ?? $data['zangeres']->Geboortedatum; ?>">
                    <?php if (isset($data['errors']['geboortedatum'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['geboortedatum']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="aantalalbums" class="form-label">Aantal albums</label>
                    <input name="aantalalbums" type="number" min="0" max="9999" step="1" class="form-control <?= isset($data['errors']['aantalalbums']) ? 'is-invalid' : ''; ?>" id="aantalalbums" value="<?= $_POST['aantalalbums'] ?? $data['zangeres']->AantalAlbums; ?>">
                    <?php if (isset($data['errors']['aantalalbums'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['aantalalbums']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="actiefsinds" class="form-label">Actief sinds</label>
                    <input name="actiefsinds" type="number" min="1900" max="<?= date('Y'); ?>" step="1" class="form-control <?= isset($data['errors']['actiefsinds']) ? 'is-invalid' : ''; ?>" id="actiefsinds" value="<?= $_POST['actiefsinds'] ?? $data['zangeres']->ActiefSinds; ?>">
                    <?php if (isset($data['errors']['actiefsinds'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['actiefsinds']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="bekendvan" class="form-label">Bekend van</label>
                    <input name="bekendvan" type="text" class="form-control <?= isset($data['errors']['bekendvan']) ? 'is-invalid' : ''; ?>" id="bekendvan" value="<?= $_POST['bekendvan'] ?? $data['zangeres']->BekendVan; ?>">
                    <?php if (isset($data['errors']['bekendvan'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['bekendvan']; ?></div>
                    <?php endif; ?>
                </div>

                <input type="hidden" name="id" value="<?= $_POST['id'] ?? $data['zangeres']->Id; ?>">

                <button type="submit" class="btn btn-primary">Verstuur</button>
            </form>

            <a href="<?= URLROOT; ?>/homepages/index">
                <i class="bi bi-arrow-left"></i>
            </a>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>