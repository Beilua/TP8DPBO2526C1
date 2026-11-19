<?php require __DIR__ . '/../layouts/header.php'; ?>
<div class="col-lg-6 m-auto">
  <form method="post">
    <br><br>
    <div class="card">
      <div class="card-header bg-warning">
        <h1 class="text-white text-center">Update Lecturer</h1>
      </div><br>
      <input type="hidden" name="id" value="<?= htmlspecialchars($lecturer['id']) ?>">
      <label>NAME:</label>
      <input type="text" name="name" value="<?= htmlspecialchars($lecturer['name']) ?>" class="form-control"><br>
      <label>NIDN:</label>
      <input type="text" name="nidn" value="<?= htmlspecialchars($lecturer['nidn']) ?>" class="form-control"><br>
      <label>PHONE:</label>
      <input type="text" name="phone" value="<?= htmlspecialchars($lecturer['phone']) ?>" class="form-control"><br>
      <label>JOIN DATE:</label>
      <input type="date" name="join_date" value="<?= htmlspecialchars($lecturer['join_date']) ?>" class="form-control"><br>
      <label>DEPARTMENT:</label>
      <select name="department_id" class="form-control">
        <option value="">-- none --</option>
        <?php foreach ($departments as $d): ?>
          <option value="<?= $d['id'] ?>" <?= ($lecturer['department_id'] == $d['id']) ? 'selected' : '' ?>><?= htmlspecialchars($d['name']) ?></option>
        <?php endforeach; ?>
      </select><br>
      <button class="btn btn-success" type="submit" name="submit">Submit</button>
      <a class="btn btn-info" href="index.php?c=lecturer&a=index">Cancel</a>
    </div>
  </form>
</div>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
