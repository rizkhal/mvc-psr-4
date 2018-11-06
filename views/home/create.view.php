
<div class="container mt-5">
  <a href="<?= BASEURL; ?>home" class="btn btn-primary">Back</a>
  <form class="mt-4" method="post" action="<?= BASEURL ?>home/store">
    <div class="form-group">
      <label>Email address</label>
      <input type="email" class="form-control" name="email" placeholder="Email address" required>
    </div>
    <div class="form-group">
      <label>Name</label>
      <input type="text" class="form-control" name="name" placeholder="Your name" required>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
  </form>
</div>