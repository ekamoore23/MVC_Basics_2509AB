<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
  <h3><?= htmlspecialchars($data['title']); ?></h3>

  <?php if (!empty($data['items'])): ?>
    <table class="table">
      <thead>
        <tr>
          <th>Id</th><th>Merk</th><th>Model</th><th>Prijs</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data['items'] as $row): ?>
          <tr>
            <td><?= $row->Id ?? '' ?></td>
            <td><?= htmlspecialchars($row->Merk ?? '') ?></td>
            <td><?= htmlspecialchars($row->Model ?? '') ?></td>
            <td><?= $row->Prijs ?? '' ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php else: ?>
    <p>Geen gegevens gevonden.</p>
  <?php endif; ?>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>