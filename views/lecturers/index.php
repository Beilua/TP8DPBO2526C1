<?php require __DIR__ . '/../layouts/header.php'; ?>
<?php // lecturer page title and add button ?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Lecturers</h2>
  <a class="btn btn-primary" href="index.php?c=lecturer&a=create">Add New</a>
</div>
<?php // lecturer list table ?>
<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th><th>NAME</th><th>NIDN</th><th>PHONE</th><th>JOIN DATE</th><th>DEPARTMENT</th><th>ACTIONS</th>
    </tr>
  </thead>
  <tbody>
    <?php // lecturer rows with edit and delete actions ?>
    <?php foreach ($lecturers as $row): ?>
    <tr>
      <th><?= htmlspecialchars($row['id']) ?></th>
      <td><?= htmlspecialchars($row['name']) ?></td>
      <td><?= htmlspecialchars($row['nidn']) ?></td>
      <td><?= htmlspecialchars($row['phone']) ?></td>
      <td><?= htmlspecialchars($row['join_date']) ?></td>
      <td><?= htmlspecialchars($row['department_name'] ?? '-') ?></td>
      <td>
        <a class="btn btn-sm btn-success" href="index.php?c=lecturer&a=edit&id=<?= $row['id'] ?>">Edit</a>
        <a class="btn btn-sm btn-danger" href="index.php?c=lecturer&a=delete&id=<?= $row['id'] ?>" onclick="return confirm('Delete?')">Delete</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
