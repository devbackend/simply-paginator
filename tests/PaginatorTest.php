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
    $Paginator = new Paginator(6, 1, 3);

    $generatedPagination = $Paginator->render();

    $this->assertStringStartsWith('<ul>', $generatedPagination);
    $this->assertStringEndsWith('</ul>', $generatedPagination);
  }
}