<?php

define('USER_DATA', 'C:\\xampp\\data\\users.json');

function get_all_users() {
    $data = file_get_contents(USER_DATA);

    if ($data != false) {
        try {
            $users = [];
            $objects = json_decode($data, true);

            foreach ($objects as $object) {
                $user = new User($object['username'], $object['role'], $object['email']);
                $user->password = $object['password'];
                $users[] = $user;
            }

            return $users;
        } catch (Exception $e) {
            return null;
        }
    }

    return null;
}

function get_user_by_username($username) {
    $data = file_get_contents(USER_DATA);

    if ($data != false) {
        try {
            $objects = json_decode($data, true);
            $key = array_search($username, array_column($objects, 'username'));

            if ($key !== false) {
                $user = new User($objects[$key]['username'], $objects[$key]['role'], $objects[$key]['email']);
                $user->password = $objects[$key]['password'];

                return $user;
            }
        } catch (Exception $e) {
            return null;
        }
    }

    return null;
}

function save_user($user) {
    $data = file_get_contents(USER_DATA);

    if ($data === false) {
        $data = '[]';
    }

    try {
        $objects = json_decode($data, true);
        $key = array_search($user->username, array_column($objects, 'username'));

        if ($key === false) {
            $objects[] = $user;
        } else {
            foreach ($user as $object_key => $value) {
                $objects[$key][$object_key] = $value;
            }
        }

        file_put_contents(USER_DATA, json_encode($objects));

        return true;
    } catch (Exception $e) {
        return false;
    }

    return false;
}

function delete_user($username) {
    $data = file_get_contents(USER_DATA);

    if ($data != false) {
        try {
            $objects = json_decode($data, true);
            $key = array_search($username, array_column($objects, 'username'));

            if ($key !== false) {
                array_splice($objects, $key, 1);
            }

            file_put_contents(USER_DATA, json_encode($objects));

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    return false;
}