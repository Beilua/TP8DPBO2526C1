<?php require __DIR__ . '/../layouts/header.php'; ?>
<div class="col-lg-6 m-auto">
  <form method="post">
    <br><br>
    <div class="card">
      <div class="card-header bg-warning"><h1 class="text-white text-center">Update Department</h1></div><br>
      <input type="hidden" name="id" value="<?= htmlspecialchars($department['id']) ?>">
      <label>NAME:</label>
      <input type="text" name="name" value="<?= htmlspecialchars($department['name']) ?>" class="form-control"><br>
      <label>CODE:</label>
      <input type="text" name="code" value="<?= htmlspecialchars($department['code']) ?>" class="form-control"><br>
      <button class="btn btn-success" type="submit">Submit</button>
      <a class="btn btn-info" href="index.php?c=department&a=index">Cancel</a>
    </div>
  </form>
</div>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
