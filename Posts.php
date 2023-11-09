<?php

declare(strict_types=1);

class Posts
{
    private string $apiPosts = "https://jsonplaceholder.typicode.com/posts";

    public function getPostsList(): array
    {
        $api = curl_init($this->apiPosts);
        curl_setopt($api, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($api, CURLOPT_SSL_VERIFYPEER, false);

        $data = curl_exec($api);
        $posts = json_decode($data, true);
        curl_close($api);

        return $posts;
    }

    public function addPost(string $title, string $body, int $userId): array
    {
        $data = ['title' => $title, 'body' => $body, 'userId' => $userId];

        $dataJson = json_encode($data);

        $api = curl_init($this->apiPosts);
        curl_setopt($api, CURLOPT_POST, true);
        curl_setopt($api, CURLOPT_POSTFIELDS, $dataJson);
        curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($api, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        $result = curl_exec($api);
        $posts = json_decode($result);
        curl_close($api);

        return $posts;
    }

    public function updatePost(string $title, string $body, int $userId): array
    {
        $data = ['title' => $title, 'body' => $body, 'userId' => $userId];

        $dataJson = json_encode($data);

        $api = curl_init($this->apiPosts);
        curl_setopt($api, CURLOPT_PUT, true);
        curl_setopt($api, CURLOPT_POSTFIELDS, $dataJson);
        curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($api, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        $result = curl_exec($api);
        $posts = json_decode($result);
        curl_close($api);

        return $posts;
    }

    public function deletePost(int $userId): array
    {
        $data = ['userId' => $userId];

        $dataJson = json_encode($data);

        $api = curl_init($this->apiPosts);
        curl_setopt($api, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($api, CURLOPT_POSTFIELDS, $dataJson);
        curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($api, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        $result = curl_exec($api);
        $posts = json_decode($result);
        curl_close($api);

        return $posts;
    }
}