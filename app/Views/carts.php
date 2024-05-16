<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/main.css'); ?>">
    <title>Carts</title>
  </head>
  <body>
    <div class="container" style="height: 100vh;min-width: 100vw;background:none">
      <div class="row">
        <img class="banner" src="<?php echo base_url('images/banner.png'); ?>" />
      </div>
      <div class="row" style="min-height: calc(100vh - 150px)">
        <div class="col-md-12 col-12" style="margin-bottom: 80px">
        <?php
          if($cart)
          {
              foreach($cart as $key => $item)
              {
              echo '
                <div class="card my-2">
                  <img src="'.$item['product']["image"].'" class="card-img-top" style="max-width: 200px">
                  <div class="card-body row">
                    <div class="col-12 col-md-10">
                      <h5 class="card-title mb-0">'.$item['product']["name"].'</h5>
                      <p class="card-text text-danger mb-0">$'.$item['product']["price"].'</p>
                    </div>
                    <div class="col-12 col-md-2">
                    <div class="cart-action">
                      <form action="'.base_url().'CartController/cartAdd" method="POST" class="cart-btn">
                        <input type="hidden" name="product" value="'.$item['product']["id"].'">
                        <input type="hidden" name="price" value="'.$item['product']["price"].'">
                        <input type="hidden" name="quantity" value="-1">
                        <button type="submit">-</button>
                      </form>
                      <div class="cart-btn">'.$item['quantity'].'</div>
                      <form action="'.base_url().'CartController/cartAdd" method="POST" class="cart-btn">
                        <input type="hidden" name="product" value="'.$item['product']["id"].'">
                        <input type="hidden" name="price" value="'.$item['product']["price"].'">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit">+</button>
                      </form>
                    </div>
                    </div>
                  </div>
                </div>
                ';
              }
          }
        ?>
        <div class="carts-order">
          <div>Total Price: <?php echo $total ?>$</div>
          <form action="<?php echo base_url().'OrderController/add' ?>" method="POST">
            <input type="hidden" name="price" value="<?php echo $total ?>">
            <input type="hidden" name="products" value="<?php 
              $products = [];
              foreach($cart as $key => $item)
              {
                $products[] = $item['product']["id"];
              }
              echo implode(",", $products)
            ?>">
            <button type="submit" class="btn btn-primary">Confirm and Pay</button>
          </form>
        </div>
        </div>
      </div>
    </div>
  </body>
</html>