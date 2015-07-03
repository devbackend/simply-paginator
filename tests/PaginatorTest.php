<?php

use SimplyPaginator\Paginator;

class PaginatorTest extends PHPUnit_Framework_TestCase  {

  public function testPageCount()
  {
    $Paginator = new Paginator(60);
    $this->assertEquals(6, $Paginator->getPageCount());
  }

  public function testRender()
  {
    $Paginator = new Paginator(60);

    $generatedPagination = $Paginator->render();
exit($generatedPagination);
    $this->assertStringStartsWith('<ul>', $generatedPagination);
    $this->assertStringEndsWith('</ul>', $generatedPagination);
  }
}