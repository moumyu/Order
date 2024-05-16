<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/main.css'); ?>">
    <title>Successfully Checked Out!</title>
  </head>
  <body>
    <div class="container" style="height: 100vh;min-width: 100vw;background:none">
      <div class="row">
        <img class="banner" src="<?php echo base_url('images/banner.png'); ?>" />
      </div>
      <div class="d-flex p-5"  style="justify-content: center;align-items: center;flex-direction: column;">
      <div class="row mb-3" style="font-size: 24px;font-weight: bold;color: #000000">
        Successfully Checked Out!
      </div>
      <div class="row">
        <div class="col-12">
          <a href="<?php echo base_url('/index.php/products'); ?>" class="btn btn-primary">Back to Home</a>
        </div>
      </div>
      </div>
    </div>
  </body>
</html>