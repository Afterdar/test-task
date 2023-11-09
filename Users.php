<?php

declare(strict_types=1);

class Users
{
    private string $apiUsers = "https://jsonplaceholder.typicode.com/users";

    public function getUsersList(): array
    {
        $api = curl_init($this->apiUsers);
        curl_setopt($api, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($api, CURLOPT_SSL_VERIFYPEER, false);

        $data = curl_exec($api);
        $users = json_decode($data, true);
        curl_close($api);

        return $users;
    }
}