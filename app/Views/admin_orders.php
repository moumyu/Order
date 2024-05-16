<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/main.css'); ?>">
    <title>Admin Order</title>
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
                    <a class="nav-link" href="/index.php/admin-products">Products</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="/index.php/admin-orders">Order</a>
                  </li>
                  <!-- <li class="nav-item">
                    <a class="nav-link" href="#">User</a>
                  </li> -->
                </ul>
              </div>
              <form class="d-flex" role="logout" action="<?php echo base_url(); ?>/SigninController/logout" method="post">
                <button class="btn btn-outline-light" type="submit">Logout</button>
              </form>
            </div>
          </nav>
          <div class="p-5">
            <table class="table mt-3">
              <thead>
                <tr>
                  <th scope="col">Product Image</th>
                  <th scope="col">Name</th>
                  <th scope="col">Price</th>
                  <th scope="col">User</th>
                  <th scope="col">Status</th>
                  <th scope="col">Date time</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if($orders)
                {
                    foreach($orders as $order)
                    {
                        $status = 'In progress...';
                        if ($order["status"] == 2) {
                          $status = 'Finish';
                        }
                        echo '
                        <tr>
                            <td><img src="'.$order['products'][0]["image"].'" style="width: 100px" /></td>
                            <td>'.$order['products'][0]["name"].'</td>
                            <td>'.$order["price"].'</td>
                            <td>'.$order["user"]['email'].'</td>
                            <td>'.$status.'</td>
                            <td>'.$order["date"].'</td>
                            <td>
                              <div class="d-flex gap-1">
                                <form action="'.base_url().'/AdminOrdersController/finish/'.$order["id"].'" method="post">
                                  <button type="submit" class="btn btn-primary">Finish</button>
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