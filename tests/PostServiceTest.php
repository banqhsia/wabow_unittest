<?php // phpcs:disable

namespace Tests;

use App\Foundation\Request;
use App\PostModelInterface;
use PHPUnit\Framework\TestCase;
use App\Service\Post\PostService;

class PostServiceTest extends TestCase
{
    public function setUp()
    {
        $this->request = $this->createMock(Request::class);
        $this->post = $this->createMock(PostModelInterface::class);

        $this->target = new PostService($this->request, $this->post);
    }

    /**
     * 測試當 title 不符合規則時，應該收到 UnexpectedValueException
     *
     * 提示: Mock 方法參數 with()->willReturn()
     */
    public function test_should_receive_UnexpectedValueException_when_title_is_invalid()
    {
        $this->request->method('getDecodedBody')->with('title')->willReturn('444');

        $this->expectException(\UnexpectedValueException::class);
        $this->expectExceptionMessage('Title');

        $this->target->post();
    }

    public function test_should_receive_UnexpectedValueException_when_content_contains_html()
    {
        $this->request->method('getDecodedBody')->will($this->returnValueMap([
            ['title', '444444444444'],
            ['content', '<html>5</html>'],
        ]));

        $this->expectException(\UnexpectedValueException::class);
        $this->expectExceptionMessage('Content');

        $this->target->post();
    }

    // TODO: 實作其他測試案例
}
