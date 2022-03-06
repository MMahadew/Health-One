<?php
global $products;
/*var_dump($products);*/
?>
<?php foreach($products as $product): ?>

    <div class="col-sm-4 col-md-3 col-lg-2">
        <div class="card">
            <div class="card-body text-center">
                <a href="/product/<?=$product->id?>">
                    <img class="product-img img-responsive center-block" src="/<?= $product->picture ?>" />
                </a>
                <div class="card-title mb-3"><?= $product->name ?></div>
                <!--<div class="card-title mb-3">/*= ($value['description']); *</div>-->
            </div>
        </div>
    </div>
<?php endforeach; ?>
