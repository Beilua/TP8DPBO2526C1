<?php require __DIR__ . '/../layouts/header.php'; ?>
<div class="col-lg-6 m-auto">
  <form method="post">
    <br><br>
    <div class="card">
      <div class="card-header bg-primary"><h1 class="text-white text-center">Create Course</h1></div><br>
      <label>NAME:</label>
      <input type="text" name="name" class="form-control" required><br>
      <label>CREDITS:</label>
      <input type="number" name="credits" class="form-control" required><br>
      <label>LECTURER:</label>
      <select name="lecturer_id" class="form-control">
        <option value="">-- none --</option>
        <?php foreach ($lecturers as $l): ?>
          <option value="<?= $l['id'] ?>"><?= htmlspecialchars($l['name']) ?></option>
        <?php endforeach; ?>
      </select><br>
      <label>DEPARTMENT:</label>
      <select name="department_id" class="form-control">
        <option value="">-- none --</option>
        <?php foreach ($departments as $d): ?>
          <option value="<?= $d['id'] ?>"><?= htmlspecialchars($d['name']) ?></option>
        <?php endforeach; ?>
      </select><br>
      <button class="btn btn-success" type="submit">Submit</button>
      <a class="btn btn-info" href="index.php?c=course&a=index">Cancel</a>
    </div>
  </form>
</div>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
