<?php

namespace App;

interface PostModelInterface
{
    /**
     * 存入一筆文章
     *
     * @return bool
     */
    public function createPost($post);
}
