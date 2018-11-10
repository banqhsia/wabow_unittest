<?php // phpcs:disable

namespace App\Foundation;

class Request
{
    protected $decodedBody = [
        'username' => 'Ben',
        'title' => '我的第一篇文章',
        'content' => '<html>Hello! <br /> 這是我的第一篇文章！</html>',
    ];

    /**
     * 取得表單內容
     *
     * @param string $key
     * @return string
     */
    public function getDecodedBody($key)
    {
        return $this->decodedBody[$key];
    }
}
