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
      <div class="row" style="min-height: calc(100vh - 150px)">
        <div class="col-md-3 col-4 d-flex flex-column menu-left">
          <a href="/products/Appetizer" class="p-2 text-center">Appetizer</a>
          <a href="/products/Soup" class="p-2 text-center">Soup</a>
          <a href="/products/Salad" class="p-2 text-center">Salad</a>
          <a href="/products/Seafood" class="p-2 text-center">Seafood</a>
          <a href="/products/Meat" class="p-2 text-center">Meat</a>
          <a href="/products/Nacks" class="p-2 text-center">Nacks</a>
        </div>
        <div class="col-md-9 col-8" style="margin-bottom: 80px">
        <?php
          if($products)
          {
              foreach($products as $product)
              {
                  $actionForm = '
                    <form action="'.base_url().'CartController/add" method="POST">
                      <input type="hidden" name="product" value="'.$product["id"].'">
                      <input type="hidden" name="quantity" value="1">
                      <input type="hidden" name="price" value="'.$product["price"].'">
                      <button type="submit" class="btn btn-primary btn-sm">Add</button>
                    </form>
                  ';
                  // Count occurrences of the name "Bob"
                  $count = 0;
                  foreach ($cart as $ct) {
                      if ($ct["product"] === $product["id"]) {
                          $count = $ct["quantity"];
                      }
                  }
                  if (in_array($product["id"], array_column($cart, 'product'))) {
                    $actionForm = '
                      <div class="cart-action">
                        <form action="'.base_url().'CartController/add" method="POST" class="cart-btn">
                          <input type="hidden" name="product" value="'.$product["id"].'">
                          <input type="hidden" name="price" value="'.$product["price"].'">
                          <input type="hidden" name="quantity" value="-1">
                          <button type="submit">-</button>
                        </form>
                        <div class="cart-btn">'.$count.'</div>
                        <form action="'.base_url().'CartController/add" method="POST" class="cart-btn">
                          <input type="hidden" name="product" value="'.$product["id"].'">
                          <input type="hidden" name="price" value="'.$product["price"].'">
                          <input type="hidden" name="quantity" value="1">
                          <button type="submit">+</button>
                        </form>
                      </div>
                    ';
                  }
                  echo '
                    <div class="card my-2">
                      <img src="'.$product["image"].'" class="card-img-top" style="max-width: 200px">
                      <div class="card-body row">
                        <div class="col-12 col-md-10">
                          <h5 class="card-title mb-0">'.$product["name"].'</h5>
                          <p class="card-text text-danger mb-0">$'.$product["price"].'</p>
                        </div>
                        <div class="col-12 col-md-2">
                          '.$actionForm.'
                        </div>
                      </div>
                    </div>
                  ';
              }
          }
        ?>
        </div>
        <div class="order">
          <div>Total Price: <?php echo $total ?>$</div>
          <a href="/carts" class="btn btn-success">Checkout(<?php echo sizeof($cart) ?>)</a>
        </div>
      </div>
    </div>
  </body>
</html>