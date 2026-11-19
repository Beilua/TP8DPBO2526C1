<?php require __DIR__ . '/../layouts/header.php'; ?>
<?php // course page title and add button ?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Courses</h2>
  <a class="btn btn-primary" href="index.php?c=course&a=create">Add New</a>
</div>
<?php // course list table ?>
<table class="table table-striped">
  <thead><tr><th>ID</th><th>NAME</th><th>CREDITS</th><th>LECTURER</th><th>DEPARTMENT</th><th>ACTIONS</th></tr></thead>
  <tbody>
    <?php // course rows with edit and delete actions ?>
    <?php foreach ($courses as $row): ?>
    <tr>
      <th><?= htmlspecialchars($row['id']) ?></th>
      <td><?= htmlspecialchars($row['name']) ?></td>
      <td><?= htmlspecialchars($row['credits']) ?></td>
      <td><?= htmlspecialchars($row['lecturer_name'] ?? '-') ?></td>
      <td><?= htmlspecialchars($row['department_name'] ?? '-') ?></td>
      <td>
        <a class="btn btn-sm btn-success" href="index.php?c=course&a=edit&id=<?= $row['id'] ?>">Edit</a>
        <a class="btn btn-sm btn-danger" href="index.php?c=course&a=delete&id=<?= $row['id'] ?>" onclick="return confirm('Delete?')">Delete</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
