<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete-cart-submit'])) {
        $deletedrecord = $Cart->deleteCart($_POST['game_id']);

    }
    if(isset($_POST['cart-submit'])){
        $Cart->saveForLater($_POST['game_id'], 'cart', 'wishlist');
    }
}


?>


<!--cart section-->
<section id="cart" class="py-3 mb-5">
    <div class="container-fluid w-75">
        <h5 class="font-rubik font-size-20">Wishlist</h5>

        <!--  shopping cart items   -->
        <div class="row">
            <div class="col-sm-9">
                <?php

                foreach ($games->getData('wishlist') as $item):

                    $cart = $games->getGames($item['game_id']);
                    $subTotal[]=  array_map(function ($item){

                        ?>
                        <!-- cart item -->
                        <div class="row border-top py-3 mt-3">
                            <div class="col-sm-2">
                                <img src="<?php echo $item['Game_Image'] ?? "./assets/Games/1.jpg" ?>" style="height: 120px;" alt="cart1" class="img-fluid">
                            </div>
                            <div class="col-sm-8">
                                <h5 class="font-rubik font-size-20"><?php echo $item["Game_Name"] ?? "Unknown"; ?></h5>
                                <small>by <?php echo $item["Publisher"] ?? "Publisher"; ?></small>
                                <!-- product rating -->
                                <div class="d-flex">
                                    <div class="rating text-warning font-size-12">
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="far fa-star"></i></span>
                                    </div>
                                    <a href="#" class="px-2 font-rale font-size-14">20,534 ratings</a>
                                </div>
                                <!--  !product rating-->

                                <!-- product qty -->
                                <div class="qty d-flex pt-2">

                                    <form method="post">
                                        <input type="hidden" value="<?php echo $item['game_id'] ?? 0; ?>" name="game_id">
                                        <button type="submit" name="delete-cart-submit" class="btn font-raleway text-danger pl-0 pr-3 border-right">Delete</button>
                                    </form>

                                    <form method="post">
                                        <input type="hidden" value="<?php echo $item['game_id'] ?? 0; ?>" name="game_id">
                                        <button type="submit" name="cart-submit" class="btn font-raleway text-danger pl-0 pr-3 border-right">Add to Cart</button>
                                    </form>
                                </div>
                                <!-- !product qty -->

                            </div>

                            <div class="col-sm-2 text-right">
                                <div class="font-size-20 text-danger font-raleway">
                                    $<span class="product_price"><?php echo $item["Game_Price"] ?? 0; ?></span>
                                </div>
                            </div>
                        </div>
                        <!-- !cart item -->
                        <?php
                        return $item["Game_Price"];
                    }, $cart); //closing array_map
                endforeach;


                ?>
            </div>

        </div>
        <!--  !shopping cart items   -->
    </div>
</section>

<!--cart section-->