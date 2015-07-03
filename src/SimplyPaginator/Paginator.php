<?php namespace SimplyPaginator;

/**
 * Yet another simple and light-weight paginate master
 *
 * Class Paginator
 * @package SimplyPaginator
 */

class Paginator {

  /**
   * Total count elements for which will be build pagination
   *
   * @var int
   */
  private $_totalItems;

  /**
   * Count elements to showing on each page
   *
   * @var int
   */
  private $_perPage;

  /**
   * Total page count
   *
   * @var int
   */
  private $_pageCount;

  /**
   * Part of url, which will be responsible for get elements for this page
   *
   * @var string
   */
  private $_route;

  /**
   * Number of current page
   *
   * @var int
   */
  private $_currentPage;

  /**
   * Middle of paginate list
   *
   * @var int
   */
  private $_middlePaginate;

  /**
   * Count elements for showing on right and left by middle
   *
   * @var int
   */
  private $_middleAroundSteps;

  /**
   * Class name for active page element in pagination list
   *
   * @var string
   */
  private $_activeClassName = 'active';

  /**
   * Count pages which will be showing in paginate blocks
   *
   * @var int
   */
  private $_showingPagesInPaginate = 5;

  /**
   * Class constructor
   *
   * @param        $totalItems  - Total count elements for which will be build pagination
   * @param int    $perPage     - Count elements to showing on each page
   * @param int    $currentPage - Number of current page
   * @param string $route       - Part of url, which will be responsible for get elements for this page
   */
  public function __construct($totalItems, $perPage=10, $currentPage=1, $route='?page=')
  {
    $this->_totalItems        = $totalItems;
    $this->_perPage           = $perPage;
    $this->_route             = $route;
    $this->_pageCount         = ceil($totalItems/$perPage);
    $this->_middlePaginate    = ceil($this->_pageCount/2);
    $this->_middleAroundSteps = floor($this->_showingPagesInPaginate/2);
    $this->_currentPage       = $currentPage;
  }

  /**
   * Rendering pagination block
   *
   * @return string
   */
  public function render()
  {
    $paginateData = '<ul>';
    for($page=1; $page<=$this->_pageCount; $page++)
    {
      if($page == $this->_currentPage)
      {
        $paginateData .= '<li class="'.$this->_activeClassName.'">'.$page.'</li>';
        continue;
      }

      if($page > 1 && $page < $this->_pageCount)
      {
        if($page == $this->_currentPage+$this->_showingPagesInPaginate || $page == $this->_currentPage - $this->_showingPagesInPaginate)
        {
          $paginateData .= '<li><a href="'.$this->_route.$page.'">...</a></li>';
          continue;
        }
        elseif($this->_currentPage > $this->_pageCount - $this->_showingPagesInPaginate && $page < $this->_showingPagesInPaginate)
        {
          $paginateData .= '<li><a href="'.$this->_route.$page.'">'.$page.'</a></li>';
          continue;
        }
        elseif($this->_currentPage < $this->_showingPagesInPaginate && $page > $this->_pageCount - $this->_showingPagesInPaginate)
        {
          $paginateData .= '<li><a href="'.$this->_route.$page.'">'.$page.'</a></li>';
          continue;
        }
        elseif($page > $this->_currentPage+$this->_showingPagesInPaginate || $page < $this->_currentPage - $this->_showingPagesInPaginate)
        {
          continue;
        }


      }

      $paginateData .= '<li><a href="'.$this->_route.$page.'">'.$page.'</a></li>';
    }
    $paginateData .= '</ul>';
    return $paginateData;
  }

  /**
   * Get pages count
   *
   * @return int
   */
  public function getPageCount()
  {

    return $this->_pageCount;
  }

  /**
   * Set new classname for active page element in paginate list
   *
   * @param string $activeClassName
   */
  public function setActiveClassName($activeClassName)
  {

    $this->_activeClassName = $activeClassName;
  }

  /**
   * Set new count of elements for showing in paginate blocks
   *
   * @param mixed $showingPagesInPaginate
   */
  public function setShowingPagesInPaginate($showingPagesInPaginate)
  {

    $this->_showingPagesInPaginate = $showingPagesInPaginate;
  }
}