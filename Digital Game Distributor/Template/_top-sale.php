<!--top sale-->
<?php


    shuffle($games_shuffle);

    //request method post
    if($_SERVER['REQUEST_METHOD'] == "POST" ){
        if(isset($_POST['top_sale_submit'])){
            //call method addToCart
            $Cart->addToCart($_POST['user_id'],$_POST['game_id']);
        }

    }
?>

<section id="top-sale">
    <div class="container py-5">
        <h4 class="font-rubik font-size-20">Top Sale</h4>
        <hr>
        <div class="owl-carousel owl-theme">
            <?php foreach ($games_shuffle as $item) { ?>
            <div class="item" py-2>
                <div class="games font-raleway">
                    <a href="<?php printf('%s?game_id=%s', 'games.php',  $item['game_id']); ?>"><img src="<?php echo $item['Game_Image'] ??"./assets/Games/1.jpg;" ?>" alt="game1" class="img-fluid"></a>
                    <div class="text-center">
                        <h6><?php echo $item['Game_Name'] ??"Unknown"; ?></h6>
                        <div class="rating text-warning font-size-12"></div>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="far fa-star"></i></span>
                    </div>
                    <div class="price py-2">
                        <span>$<?php echo $item['Game_Price'] ??'0'; ?></span>
                    </div>
                    <form method="post">
                        <input type="hidden" name="game_id" value="<?php echo $item['game_id'] ?? '1'; ?>">
                        <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                        <?php
                        if (in_array($item['game_id'], $Cart->getCartId($games->getData('cart')) ?? [])){
                            echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                        }else{
                            echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                        }
                        ?>
                    </form>
                </div>
            </div>
            <?php } //close foreach ?>
        </div>
    </div>
</section>

<!--top sale-->
