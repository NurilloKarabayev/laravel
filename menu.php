<?php
require_once 'src/helper.php';


$stmt = $pdo->prepare("SELECT * FROM products");
$stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
$stmt->execute();
$products = $stmt->fetchAll();



?>



  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Bizning maktab    </h1>
        <p class="lead text-body-secondary">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
        <p>
          <a href="index.php" class="btn btn-primary my-2">Bosh sahifa</a>
          <a href="chornafka.php" class="btn btn-secondary my-2">O'quvchilar sahifasi</a>
        </p>
      </div>
    </div>
  </section>


  <div class="album py-5 bg-body-tertiary">
    <div class="container">
         


<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

    <?php foreach($products as $product): ?>
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            <div class="card-body">

                
                <h5><?= $product->product_name ; ?></h5>
              <p class="card-text"><?= $product->product_cost; ?></p>
                
                <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="poduct.php?id=<?= $product->product_id ?> "class="btn btn-sm btn-outline-secondary">book</a>
                  
                  <form method="POST" action="">
                    <input type="hidden" name="DELETE">
                    <input type="hidden" name="post_id" value="<?= $student['student_id'] ?> ">
                  <button type="submit" class="btn btn-sm btn-outline-secondary">Delete</button>
                  </form>
                
                </div>
            
              </div>
            </div>
          </div>
        </div>
    <?php endforeach; ?>
       
      </div>
    </div>
  </div>

  <?php require_once 'src/footer.php';