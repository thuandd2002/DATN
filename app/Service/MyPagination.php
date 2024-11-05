<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 10/17/18
 * Time: 8:34 AM
 */

namespace App\Service;


namespace App\Service;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\HtmlString;
use Illuminate\Contracts\Pagination\LengthAwarePaginator as LengthAwarePaginatorContract;
use Illuminate\Support\Str;

class MyPagination extends AbstractPaginator implements LengthAwarePaginatorContract
{
    protected $paginator;
    protected $window;
    public static $defaultView = 'pagination.default';
    private $removeParam = ['catName', 'source'];

    /**
     * The total number of items before slicing.
     *
     * @var int
     */
    protected $total;

    /**
     * The last available page.
     *
     * @var int
     */
    protected $lastPage;

    /**
     * Create a new paginator instance.
     *
     * @param  mixed $items
     * @param  int $total
     * @param  int $perPage
     * @param  int|null $currentPage
     * @param  array $options (path, query, fragment, pageName)
     * @return void
     */
    public function __construct(Paginator $paginator, $option = [], $display_page = 5)
    {
        $this->paginator = $paginator;
        $this->path = $this->paginator->path;
        $this->currentPage = $this->setCurrentPage();
    }

    /**
     * Add a set of query string values to the paginator.
     *
     * @param  array|string $key
     * @param  string|null $value
     * @return $this
     */
    public function appends($key, $value = null)
    {
        if (is_array($key)) {
            if ($this->removeParam) {
                foreach ($this->removeParam as $name) {
                    if (array_key_exists($name, $key)) {
                        unset($key[$name]);
                    }
                }
            }
            return $this->appendArray($key);
        }
        return $this->addQuery($key, $value);
    }

    public function url($page = 1)
    {
        if ($page <= 0) $page = 1;

        // If we have any extra query string key / value pairs that need to be added
        // onto the URL, we will put them in query string form and then attach it
        // to the URL. This allows for extra information like sortings storage.
        $parameters = [$this->pageName => $page];

        if (count($this->query) > 0) {
            $parameters = array_merge($this->query, $parameters);
        }

        return $this->path
            . (Str::contains($this->path, '?') ? '&' : '?')
            . http_build_query($parameters, '', '&')
            . $this->buildFragment();
    }

    /**
     * Get the current page for the request.
     *
     * @param  int $currentPage
     * @param  string $pageName
     * @return int
     */
    protected function setCurrentPage()
    {
        $currentPage = $this->paginator->currentPage();
        $currentPage = $this->isValidPageNumber($currentPage) ? (int)$currentPage : 1;

        return $currentPage;
    }

    /**
     * Render the paginator using the given view.
     *
     * @param  string|null $view
     * @param  array $data
     * @return \Illuminate\Support\HtmlString
     */
    public function links($view = null, $data = [])
    {
        return $this->render($view, $data);
    }

    /**
     * Render the paginator using the given view.
     *
     * @param  string|null $view
     * @param  array $data
     * @return \Illuminate\Support\HtmlString
     */
    public function render($view = null, $data = [])
    {
        return new HtmlString(static::viewFactory()->make($view ?: static::$defaultView, array_merge($data, [
            'paginator' => $this,
            'elements' => $this->elements(),
        ]))->render());
    }


    /**
     * Get the array of elements to pass to the view.
     *
     * @return array
     */
    protected function elements($display_page = 5)
    {
        $total_page = $this->paginator->lastPage();
        if ($display_page > $total_page) $display_page = $total_page;

        $start_display_page = $this->currentPage - floor($display_page / 2);

        if ($start_display_page + $display_page > $total_page) {
            $start_display_page = $total_page - $display_page + 1;
        }

        $start_display_page = ($start_display_page >= 1) ? $start_display_page : 1;
        $array_page = array_fill($start_display_page, $display_page, array());

        foreach ($array_page as $page_no => &$page_data) {
            $page_data = $this->url($page_no);
        }

        return $array_page;
    }

    /**
     * Get the total number of items being paginated.
     *
     * @return int
     */
    public function total()
    {
        return $this->paginator->total();
    }

    /**
     * Determine if there are more items in the data source.
     *
     * @return bool
     */
    public function hasMorePages()
    {
        return $this->currentPage() < $this->lastPage();
    }

    /**
     * Get the URL for the next page.
     *
     * @return string|null
     */
    public function nextPageUrl()
    {
        if ($this->lastPage() > $this->currentPage()) {
            return $this->url($this->currentPage() + 1);
        }
    }

    public function firstPageUrl()
    {
        return $this->url(1);
    }

    public function lastPageUrl()
    {
        return $this->url($this->lastPage());
    }

    /**
     * Get the last page.
     *
     * @return int
     */
    public function lastPage()
    {
        return $this->paginator->lastPage();
    }
}