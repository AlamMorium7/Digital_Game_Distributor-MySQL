

<?php

$games_shuffle = $games->getData();
shuffle($games_shuffle);

if($_SERVER['REQUEST_METHOD'] == "POST" ){
    if(isset($_POST['special_price_submit'])){
        //call method addToCart
        $Cart->addToCart($_POST['user_id'],$_POST['game_id']);
    }

}

?>

<section id="special-price">
    <div class="container">
        <h4 class="font-rubik font-size-20">Special Price</h4>
        <div id="filters" class="button-group text-right font-rubik font-size-16">
            <button class="btn is-checked" data-filter="*">All Publishers</button>
            <button class="btn" data-filter=".Rockstar">Rockstar</button>
            <button class="btn" data-filter=".Activision">Activision</button>
            <button class="btn" data-filter=".Ubisoft">Ubisoft</button>

        </div>

        <div class="grid">
            <?php array_map(function ($item){ ?>
            <div class="grid-item border <?php echo $item["Publisher"] ?? "Publisher";?>">
                <div class="item py-2" style="width: 200px;">
                    <div class="product font-rale">
                        <a href="#"><img src="<?php echo $item["Game_Image"] ?? "./assets/Games/9.jpg"; ?>" alt="game9" class="img-fluid"></a>
                        <div class="text-center">
                            <h6><?php echo $item["Game_Name"] ?? "Unknown" ?></h6>
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <div class="price py-2">
                                <span>$<?php echo $item["Game_Price"]?? 0 ?></span>
                            </div>
                            <form method="post">
                                <input type="hidden" name="game_id" value="<?php echo $item['game_id'] ?? '1'; ?>">
                                <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                <button type="submit" name="special_price_submit" class="btn btn-warning font-size-12">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                <?php }, $games_shuffle) ?>

        </div>
        </div>



</section>