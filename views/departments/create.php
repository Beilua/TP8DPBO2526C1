<?php require __DIR__ . '/../layouts/header.php'; ?>
<div class="col-lg-6 m-auto">
  <form method="post">
    <br><br>
    <div class="card">
      <div class="card-header bg-primary"><h1 class="text-white text-center">Create Department</h1></div><br>
      <label>NAME:</label>
      <input type="text" name="name" class="form-control" required><br>
      <label>CODE:</label>
      <input type="text" name="code" class="form-control" required><br>
      <button class="btn btn-success" type="submit">Submit</button>
      <a class="btn btn-info" href="index.php?c=department&a=index">Cancel</a>
    </div>
  </form>
</div>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
