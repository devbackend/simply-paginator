<?php namespace SimplyPaginator;

class Paginator {

  private $_totalItems;

  private $_perPage;

  private $_pageCount;

  private $_route;

  private $_activeClassName = 'active';

  private $_currentPage;

  public function __construct($totalItems, $perPage=10, $currentPage=1, $route='?page=')
  {
    $this->_totalItems  = $totalItems;
    $this->_perPage     = $perPage;
    $this->_route       = $route;
    $this->_pageCount   = ceil($totalItems/$perPage);
    $this->_currentPage = $currentPage;
  }

  public function render()
  {
    $paginateData = '<ul>';
    for($page=1; $page<$this->_pageCount; $page++)
    {
      if($page == $this->_currentPage)
      {
        $paginateData .= '<li class="'.$this->_activeClassName.'">'.$page.'</li>';
        continue;
      }

      $paginateData .= '<li><a href="'.$this->_route.$page.'">'.$page.'</a></li>';
    }
    $paginateData .= '</ul>';

    return $paginateData;
  }

  public function getPageCount()
  {

    return $this->_pageCount;
  }

  /**
   * @param string $activeClassName
   */
  public function setActiveClassName($activeClassName)
  {

    $this->_activeClassName = $activeClassName;
  }
}