<div class="container mt-5">
  <h1>
    Data
  <small class="text-muted">Mahasiswa</small>
  </h1>
<br>
  <div class="row">
    <div class="col-lg-6">
      <a href="<?= BASEURL; ?>home/create" class="btn btn-primary">Add</a>
    </div>
    <div class="col-lg-6">
      <div class="btn-group" role="group" aria-label="Button group with nested dropdown" style="float: right;">
        <a href="" class="btn btn-info">Import CSNV</a>

        <div class="btn-group" role="group">
          <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Export
          </button>
          <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
            <a class="dropdown-item" href="#">PDF</a>
            <a class="dropdown-item" href="#">CSNV</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <table class="table table-bordered mt-2">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data['mahasiswa'] as $key => $row): ?>
      <tr>
        <th scope="row"><?= ++$key ?></th>
        <td><?= $row['name'] ?></td>
        <td><?= $row['email'] ?></td>
        <td>
          <a href="<?= BASEURL; ?>home/edit/<?= $row['id']; ?>" class="btn btn-info btn-sm">Edit</a>
          <a href="<?= BASEURL; ?>home/destroy/<?= $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
</div>