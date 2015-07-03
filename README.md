Simply-paginate
=============

Installation:
---------------

    composer require tsbgroup/simply-paginator

Use
-----

    use SimplyPaginator\Paginator

	$totalItems = 50; //Total count elements for which will be build pagination
	$perPage = 10; //Count elements to showing on each page
	$currentPage = 1; //Number of current page
	$route = '/?page='; //Part of url, which responsible for get elements for this page

	$Paginator = new Paginator($totalItems, $perPage, $currentPage, $route);
	
	//render paginate block
	$Paginator->render();
	
	/**
	
        Return html block like this: 
        
        <ul>
            <li class="active">1</li>
            <li><a href="/?page=2">2</a></li>
            <li><a href="/?page=3">3</a></li>
            <li><a href="/?page=4">4</a></li>
            <li><a href="/?page=5">5</a></li>
        </ul>
	
	 */