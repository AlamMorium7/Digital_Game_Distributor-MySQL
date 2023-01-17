<?php


class Cart
{
    public $db=null;

    public function __construct(DBController $db){
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    //insert into cart table
    public function insertIntoCart($params = null, $table="cart"){
        if($this->db->con !=null){
            if($params !=null){
                //"insert into cart(user_id) values (0)"
                //get table columns
                $columns = implode(',', array_keys($params));

                $values = implode(',', array_values($params));

                //create sql query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);

                //execute sql query
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }

    }

    //to get user_id and game_id and insert it into cart table

    public function addToCart($userid, $gameid){
        if(isset($userid) && isset($gameid)){
            $params = array(
                "user_id" => $userid,
                "game_id" => $gameid
            );

            //insert data into cart
            $result = $this->insertIntoCart($params);
            if($result){
                //reload page
                header("Location: ".$_SERVER['PHP_SELF']);
            }

        }
    }

    //delete cart item using cart content
    public function deleteCart($game_id = null, $table = 'cart'){
        if($game_id != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE game_id={$game_id}");
            if($result){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    //calculate sub total
    public function getSum($arr){
        if (isset($arr)){
            $sum = 0;
            foreach ($arr as $item){
                $sum+= floatval($item[0]);
            }
            return sprintf("%.2f",$sum);
        }
    }

    // get games_id of shopping cart list
    public function getCartId($cartArray = null, $key = "game_id"){
        if ($cartArray != null){
            $cart_id = array_map(function ($value) use($key){
                return $value[$key];
            }, $cartArray);
            return $cart_id;
        }
    }

    // Save for later
    public function saveForLater($game_id = null, $saveTable = "wishlist", $fromTable = "cart"){
        if ($game_id != null){
            $query = "INSERT INTO {$saveTable} SELECT * FROM {$fromTable} WHERE game_id={$game_id};";
            $query .= "DELETE FROM {$fromTable} WHERE game_id={$game_id};";


            // execute multiple query, php can execute multiple queries
            $result = $this->db->con->multi_query($query);

            if($result){
                header("Location :" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

}