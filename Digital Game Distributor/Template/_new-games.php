<?php

$games_shuffle = $games->getData();
shuffle($games_shuffle);

if($_SERVER['REQUEST_METHOD'] == "POST" ){
    if(isset($_POST['new_games_submit'])){
        //call method addToCart
        $Cart->addToCart($_POST['user_id'],$_POST['game_id']);
    }

}

?>



<section id="new-games">
    <div class="container">
        <h4 class="font-rubik font-size-20">
            New Games</h4>
        <hr>

        <div class="owl-carousel owl-theme">

            <?php foreach ($games_shuffle as $item) { ?>
                <div class="item" py-2 bg-light>
                    <div class="games font-raleway">
                        <a href="#"><img src="<?php echo $item['Game_Image'] ??"./assets/Games/1.jpg;" ?>" alt="game1" class="img-fluid"></a>
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
                            <button type="submit" name="new_games_submit" class="btn btn-warning font-size-12">Add to Cart</button>
                        </form>
                    </div>
                </div>
            <?php } //close foreach ?>

        </div>

    </div>
</section>