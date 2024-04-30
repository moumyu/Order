<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/main.css'); ?>">
    <title>Admin Add Products</title>
  </head>
  <body>
  <div class="container" style="min-height: 100vh;min-width: 100vw;background: none">
        <div class="row">
          <nav class="navbar navbar-expand-lg bg-primary border-bottom border-body" data-bs-theme="dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Admin</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" href="#">Products</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Order</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">User</a>
                  </li>
                </ul>
              </div>
              <form class="d-flex" role="logout" action="<?php echo base_url(); ?>/SigninController/logout" method="post">
                <button class="btn btn-outline-light" type="submit">Logout</button>
              </form>
            </div>
          </nav>
          <div class="p-5 col-md-5 mx-auto">
            <?php if(isset($validation)):?>
              <div class="alert alert-warning">
                  <?= $validation->listErrors() ?>
              </div>
            <?php endif;?>
            <form action="<?php echo base_url(); ?>/AdminProductsController/add" method="post">
              <div class="mb-3">
                <label for="file" class="form-label">Product Image</label>
                <input class="form-control" type="file" id="file">
                <input type="hidden" name="image" id="image">
              </div>
              <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" name="name" id="name">
              </div>
              <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" name="price" id="price">
              </div>
              <div class="mb-3">
                <label for="price" class="form-label">Type</label>
                <select class="form-select" name="type">
                  <option value="Appetizer">Appetizer</option>
                  <option value="Soup">Soup</option>
                  <option value="Salad">Salad</option>
                  <option value="Seafood">Seafood</option>
                  <option value="Meat">Meat</option>
                  <option value="Nacks">Nacks</option>
                </select>
              </div>
              <div class="modal-footer">
                <a href="admin-products" class="btn btn-secondary me-2">Cancel</a>
                <button type="submit" class="btn btn-primary">Confirm</button>
              </div>
            </form>
          </div>
        </div>
    </div>
  </body>
  <script>
    document.getElementById('file').addEventListener('change', function() {
      var file = this.files[0];
      var reader = new FileReader();
      reader.onload = function(e) {
        var image = document.getElementById('image');
        image.value = e.target.result;
      };
      reader.readAsDataURL(file);
    });
  </script>
</html>