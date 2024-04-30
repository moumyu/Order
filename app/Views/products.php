<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/main.css'); ?>">
    <title>Menus</title>
  </head>
  <body>
    <div class="container" style="height: 100vh;min-width: 100vw;background:none">
      <div class="row">
        <img class="banner" src="<?php echo base_url('images/banner.png'); ?>" />
      </div>
      <div class="row">
        <div class="col-md-3 col-4 d-flex flex-column menu-left">
          <a href="/products/Appetizer" class="p-2 text-center">Appetizer</a>
          <a href="/products/Soup" class="p-2 text-center">Soup</a>
          <a href="/products/Salad" class="p-2 text-center">Salad</a>
          <a href="/products/Seafood" class="p-2 text-center">Seafood</a>
          <a href="/products/Meat" class="p-2 text-center">Meat</a>
          <a href="/products/Nacks" class="p-2 text-center">Nacks</a>
        </div>
        <div class="col-md-9 col-8">
        <?php
          if($products)
          {
              foreach($products as $product)
              {
                  echo '
                    <div class="card my-2">
                      <img src="'.$product["image"].'" class="card-img-top" style="max-width: 200px">
                      <div class="card-body row">
                        <div class="col-12 col-md-10">
                          <h5 class="card-title mb-0">'.$product["name"].'</h5>
                          <p class="card-text text-danger mb-0">$'.$product["price"].'</p>
                        </div>
                        <div class="col-12 col-md-2">
                          <a href="#" class="btn btn-primary btn-sm">Add</a>
                        </div>
                      </div>
                    </div>
                  ';
              }
          }
        ?>
        </div>
      </div>
    </div>
  </body>
</html>