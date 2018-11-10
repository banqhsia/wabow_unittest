<?php

namespace App\Service\Post;

use App\Foundation\Request;
use App\PostModelInterface;

class PostService
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @var PostModelInterface
     */
    private $post;

    /**
     * Construct
     *
     * @param Request $request
     * @param PostModelInterface $post
     */
    public function __construct(Request $request, PostModelInterface $post)
    {
        $this->request = $request;
        $this->post = $post;
    }

    /**
     * 建立一筆文章
     *
     * @return bool
     *
     * @throws \UnexpectedValueException
     */
    public function post()
    {
        if (! $this->isTitleValid()) {
            throw new \UnexpectedValueException('Title is invalid.');
        }

        if ($this->isContainHtml()) {
            throw new \UnexpectedValueException('Content contains HTML.');
        }

        return $this->post->createPost([
            'title' => $this->request->getDecodedBody('title'),
            'content' => $this->request->getDecodedBody('content'),
            'username' => $this->request->getDecodedBody('username'),
        ]);
    }

    /**
     * 標題是否合法大於 5 個字
     *
     * @return bool
     */
    private function isTitleValid()
    {
        $title = $this->request->getDecodedBody('title');

        return $title && (strlen($title) > 5);
    }

    /**
     * 內容是否包含 HTML
     *
     * @return bool
     */
    private function isContainHtml()
    {
        $content = $this->request->getDecodedBody('content');

        return strip_tags($content) !== $content;
    }
}
