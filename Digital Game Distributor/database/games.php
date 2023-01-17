<?php

//used to fetch game data

// Use to fetch game data
class Games
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // fetch game data using getData Method
    public function getData($table = 'games'){
        $result = $this->db->con->query("SELECT * FROM {$table}");

        $resultArray = array();

        // fetch game data one by one
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    //get games using item id
    public function getGames($game_id=null, $table='games'){
        if(isset($game_id)){
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE game_id={$game_id}");
            $resultArray = array();

            // fetch game data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }

            return $resultArray;
        }
    }

}