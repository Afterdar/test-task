<?php

declare(strict_types=1);

class Todos
{
    private string $apiTodos = "https://jsonplaceholder.typicode.com/todos";

    public function getTodosList(): array
    {
        $api = curl_init($this->apiTodos);
        curl_setopt($api, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($api, CURLOPT_SSL_VERIFYPEER, false);

        $data = curl_exec($api);
        $todos = json_decode($data, true);
        curl_close($api);

        return $todos;
    }
}