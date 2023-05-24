<?php
// Define an array of products with their corresponding categories
$products = array(
    "100001" => "Day-Date",
    "100002" => "Sky-Dweller",
    "100003" => "Date Just",
    "100004" => "Lady-Datejust",
    "100006" => "Pearlmaster",
    "100006" => "Date Just Pearl"
);

// Check if the category is provided via AJAX
if (isset($_POST['category'])) {
    $selectedCategory = $_POST['category'];

    // Filter the products based on the selected category
    $filteredProducts = array_filter($products, function ($category) use ($selectedCategory) {
        return $category === $selectedCategory;
    });

    // Display the filtered products
    foreach ($filteredProducts as $product => $prodCategory) {
        echo '<div class="col-md-4">';
        echo '<img src="Assets/Product-images/' . $product . '.png" alt="Product" width="380" height="340">';
        echo '<h6 class="product-head">Rolex</h6>';
        echo '<p class="product-paragrah">' . $prodCategory . '</p>';
        echo '</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programmers test - Filter</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
<!-- navbar -->
 <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="Assets/assets_portrait/official-retailer-plaque-en.png" alt="logo" width="70" height="40">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active link-success" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" data-category="All Items">All Items</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" data-category="Day-Date">Day-Date</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" data-category="Date Just Pearl">Date Just Pearl</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" data-category="Date Just" >Date Just</a>
        </li>
      </ul>
    </div>
  </div>
 </nav>
</div>

<!-- title -->
<h3 class="text-center">All Items</h3>

<!-- product -->
<div id="product-container" class="container products">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <img src="Assets/Product-images/100001.png" alt="Product 1" width="380" height="340">
      <h6 class="product-head">Rolex</h6>
      <p class="product-paragrah">DAY-DATE</p>
    </div>
    <div class="col-md-4">
      <img src="Assets/Product-images/100002.png" alt="Product 2" width="380" height="340">
      <h6 class="product-head">Rolex</h6>
      <p class="product-paragrah">SKY-DWELLER</p>
    </div>
    <div class="col-md-4">
      <img src="Assets/Product-images/100003.png" alt="Product 3" width="380" height="340">
      <h6 class="product-head">Rolex</h6>
      <p class="product-paragrah">DATEJUST</p>
    </div>
  </div>
    <div class="row justify-content-center">
    <div class="col-md-4">
      <img src="Assets/Product-images/100004.png" alt="Product 1" width="380" height="340">
      <h6 class="product-head">Rolex</h6>
      <p class="product-paragrah">LADY-DAYJUST</p>
    </div>
    <div class="col-md-4">
      <img src="Assets/Product-images/100006.png" alt="Product 2" width="380" height="340">
      <h6 class="product-head">Rolex</h6>
      <p class="product-paragrah">PEARLMASTER</p>
    </div>
    <div class="col-md-4">
      <img src="Assets/Product-images/100006.png" alt="Product 3" width="380" height="340">
      <h6 class="product-head">Rolex</h6>
      <p class="product-paragrah">DATE JUST PEARL</p>
    </div>
  </div>
</div>

    <!-- JavaScript and AJAX script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.nav-link').click(function() {
                var category = $(this).data('category');

                $.ajax({
                    url: 'filter.php',
                    method: 'POST',
                    data: { category: category },
                    success: function(response) {
                        $('#product-container').html(response);
                    },
                    error: function() {
                        console.log('Error occurred during AJAX request.');
                    }
                });
            });
        });
    </script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>