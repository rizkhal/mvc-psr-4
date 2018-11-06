
<div class="container mt-5">
  <a href="<?= BASEURL; ?>home" class="btn btn-primary">Back</a>
  <form class="mt-4" method="post" action="<?= BASEURL ?>home/update/<?= $data['mahasiswa']['id'] ?>">
    <div class="form-group">
      <label>Email address</label>
      <input type="email" class="form-control" name="email" placeholder="Email address" value="<?= $data['mahasiswa']['email'] ?>" required>
    </div>
    <div class="form-group">
      <label>Name</label>
      <input type="text" class="form-control" name="name" placeholder="Your name" value="<?= $data['mahasiswa']['name'] ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>