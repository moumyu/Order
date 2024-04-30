<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/main.css'); ?>">
    <title>Admin Products</title>
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
          <div class="p-5">
            <a href="admin-add-product" class="btn btn-primary">Add Product</a>
            <table class="table mt-3">
              <thead>
                <tr>
                  <th scope="col">Image</th>
                  <th scope="col">Name</th>
                  <th scope="col">Price</th>
                  <th scope="col">Type</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if($products)
                {
                    foreach($products as $product)
                    {
                        echo '
                        <tr>
                            <td><img src="'.$product["image"].'" style="width: 100px" /></td>
                            <td>'.$product["name"].'</td>
                            <td>'.$product["price"].'</td>
                            <td>'.$product["type"].'</td>
                            <td>
                              <div class="d-flex gap-1">
                                <a href="" class="btn btn-primary">Edit</a>
                                <form action="'.base_url().'/AdminProductsController/remove/'.$product["id"].'" method="post">
                                  <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                              </div>
                            </td>
                        </tr>';
                    }
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
    </div>
  </body>
</html>