<?php require __DIR__ . '/../layouts/header.php'; ?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Departments</h2>
  <a class="btn btn-primary" href="index.php?c=department&a=create">Add New</a>
</div>
<table class="table table-striped">
  <thead><tr><th>ID</th><th>NAME</th><th>CODE</th><th>ACTIONS</th></tr></thead>
  <tbody>
    <?php foreach ($departments as $row): ?>
    <tr>
      <th><?= htmlspecialchars($row['id']) ?></th>
      <td><?= htmlspecialchars($row['name']) ?></td>
      <td><?= htmlspecialchars($row['code']) ?></td>
      <td>
        <a class="btn btn-sm btn-success" href="index.php?c=department&a=edit&id=<?= $row['id'] ?>">Edit</a>
        <a class="btn btn-sm btn-danger" href="index.php?c=department&a=delete&id=<?= $row['id'] ?>" onclick="return confirm('Delete?')">Delete</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
