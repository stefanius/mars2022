<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    /**
     * Table headers.
     *
     * @var array
     */
    public $headers;

    /**
     * Search query.
     *
     * @var string
     */
    public $query;

    /**
     * Route base key for CRUD actions.
     *
     * @var string
     */
    public $routeKey;

    /**
     * Fields to query on.
     *
     * @var array
     */
    public $queryOn;

    /**
     * The model.
     *
     * @var string
     */
    public $model;

    /**
     * @var string
     */
    public $orderBy = 'id';

    /**
     * @var string
     */
    public $orderDirection = 'asc';

    /**
     * @var integer
     */
    public $pagerLimit;

    /**
     * @var boolean
     */
    public $showHeader;

    /**
     * @var array
     */
    public $scopes;

    /**
     * @var array
     */
    public $actions;

    /**
     * @var boolean
     */
    public $modal;

    /**
     * @var boolean
     */
    public $showCreateButton = true;

    /**
     * @var bool
     */
    public $allowPagination = true;

    /**
     * Mount Livewire component.
     *
     * @param array $headers
     * @param string $routeKey
     * @param string $model
     * @param array $queryOn
     * @param integer $pagerLimit
     * @param boolean $showHeader
     * @param array $scopes
     * @param boolean $modal
     * @param boolean $allowPagination
     * @param boolean $showCreateButton
     * @param array $actions
     */
    public function mount($headers, $routeKey, $model, $queryOn = [], $pagerLimit = 15, $showHeader = true, $scopes = [], $modal = false, $allowPagination=true, $showCreateButton=true, $actions = [])
    {
        $this->headers = $headers;
        $this->queryOn = $queryOn;
        $this->routeKey = $routeKey;
        $this->model = $model;
        $this->pagerLimit = $pagerLimit;
        $this->showHeader = $showHeader;
        $this->scopes = $scopes;
        $this->modal = $modal;
        $this->allowPagination = $allowPagination;
        $this->showCreateButton = $showCreateButton;
        $this->actions = $actions;
    }

    /**
     * @return mixed
     */
    protected function builder()
    {
        if (empty($this->scopes)) {
            return $this->model::query();
        }

        $query = $this->model::query();

        return $query;
    }

    /**
     * @return mixed
     */
    public function records()
    {
        $query = $this->builder();

        foreach ($this->queryOn as $queryOn) {
            $query->orWhere($queryOn, 'like', '%' . $this->query . '%');
        }

        foreach ($this->scopes as $key => $value) {
            if (is_int($key) && is_string($value)) {
                $query->$value();
            } else {
                $query->$key($value);
            }
        }

        return $query->orderBy($this->orderBy, $this->orderDirection)
            ->paginate($this->pagerLimit);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('backoffice.components.table', ['records' => $this->records()]);
    }

    /**
     * @param string $column
     */
    public function orderBy($column)
    {
        $this->orderBy = $column;
        $this->orderDirection = $this->orderDirection === 'asc' ? 'desc' : 'asc';
    }

    /**
     * @return string
     */
    public function paginationView()
    {
        return 'backoffice.components.pagination';
    }
}
