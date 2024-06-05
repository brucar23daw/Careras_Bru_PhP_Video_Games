<?php

define('GAMES_DATA', 'C:\\xampp\\data\\videogames.json');

function get_all_games() {
    $data = file_get_contents(GAMES_DATA);

    if ($data != false) {
        try {
            $games = [];
            $objects = json_decode($data, true);

            foreach ($objects as $object) {
                $game = new Videogame();

                foreach ($object as $key => $value) {
                    $game->{$key} = $value;
                }

                $games[] = $game;
            }

            return $games;
        } catch (Exception $e) {
            return null;
        }
    }

    return null;
}

function get_game_by_id($id) {
    $data = file_get_contents(GAMES_DATA);

    if ($data != false) {
        try {
            $objects = json_decode($data, true);
            $key = array_search($id, array_column($objects, 'id'));

            if ($key !== false) {
                $game = new Videogame();

                foreach ($objects[$key] as $object_key => $value) {
                    $game->{$object_key} = $value;
                }

                return $game;
            }
        } catch (Exception $e) {
            return null;
        }
    }

    return null;
}

function save_game($game) {
    $data = file_get_contents(GAMES_DATA);

    if ($data === false) {
        $data = '[]';
    }

    try {
        $objects = json_decode($data, true);
        $key = array_search($game->id, array_column($objects, 'id'));

        if ($key === false) {
            $objects[] = $game;
        } else {
            foreach ($game as $object_key => $value) {
                $objects[$key][$object_key] = $value;
            }
        }

        file_put_contents(GAMES_DATA, json_encode($objects));

        return true;
    } catch (Exception $e) {
        return false;
    }

    return false;
}

function delete_game($id) {
    $data = file_get_contents(GAMES_DATA);

    if ($data != false) {
        try {
            $objects = json_decode($data, true);
            $key = array_search($id, array_column($objects, 'id'));

            if ($key !== false) {
                array_splice($objects, $key, 1);
            }

            file_put_contents(GAMES_DATA, json_encode($objects));

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    return false;
}