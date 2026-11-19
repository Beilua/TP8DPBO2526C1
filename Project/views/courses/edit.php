<?php require __DIR__ . '/../layouts/header.php'; ?>
<?php // update course form ?>
<div class="col-lg-6 m-auto">
  <form method="post">
    <br><br>
    <div class="card">
      <div class="card-header bg-warning"><h1 class="text-white text-center">Update Course</h1></div><br>
      <input type="hidden" name="id" value="<?= htmlspecialchars($course['id']) ?>">
      <label>NAME:</label>
      <input type="text" name="name" value="<?= htmlspecialchars($course['name']) ?>" class="form-control"><br>
      <label>CREDITS:</label>
      <input type="number" name="credits" value="<?= htmlspecialchars($course['credits']) ?>" class="form-control"><br>
      <label>LECTURER:</label>
      <select name="lecturer_id" class="form-control">
        <option value="">-- none --</option>
        <?php // lecturer options with selected value ?>
        <?php foreach ($lecturers as $l): ?>
          <option value="<?= $l['id'] ?>" <?= ($course['lecturer_id'] == $l['id']) ? 'selected' : '' ?>><?= htmlspecialchars($l['name']) ?></option>
        <?php endforeach; ?>
      </select><br>
      <label>DEPARTMENT:</label>
      <select name="department_id" class="form-control">
        <option value="">-- none --</option>
        <?php // department options with selected value ?>
        <?php foreach ($departments as $d): ?>
          <option value="<?= $d['id'] ?>" <?= ($course['department_id'] == $d['id']) ? 'selected' : '' ?>><?= htmlspecialchars($d['name']) ?></option>
        <?php endforeach; ?>
      </select><br>
      <button class="btn btn-success" type="submit">Submit</button>
      <a class="btn btn-info" href="index.php?c=course&a=index">Cancel</a>
    </div>
  </form>
</div>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
