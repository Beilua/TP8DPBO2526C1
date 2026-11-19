<?php require __DIR__ . '/../layouts/header.php'; ?>
<?php // create lecturer form ?>
<div class="col-lg-6 m-auto">
  <form method="post">
    <br><br>
    <div class="card">
      <div class="card-header bg-primary">
        <h1 class="text-white text-center">Create Lecturer</h1>
      </div><br>
      <label>NAME:</label>
      <input type="text" name="name" class="form-control" required><br>
      <label>NIDN:</label>
      <input type="text" name="nidn" class="form-control" required><br>
      <label>PHONE:</label>
      <input type="text" name="phone" class="form-control" required><br>
      <label>JOIN DATE:</label>
      <input type="date" name="join_date" class="form-control" required><br>
      <label>DEPARTMENT:</label>
      <select name="department_id" class="form-control">
        <option value="">-- none --</option>
        <?php // department options ?>
        <?php foreach ($departments as $d): ?>
          <option value="<?= $d['id'] ?>"><?= htmlspecialchars($d['name']) ?></option>
        <?php endforeach; ?>
      </select><br>
      <button class="btn btn-success" type="submit" name="submit">Submit</button>
      <a class="btn btn-info" href="index.php?c=lecturer&a=index">Cancel</a>
    </div>
  </form>
</div>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
