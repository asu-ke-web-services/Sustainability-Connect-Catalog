<?php

namespace SCCatalog\Repositories\Reference;

use Illuminate\Support\Facades\DB;
use SCCatalog\Exceptions\GeneralException;
use SCCatalog\Models\Reference\Category;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class CategoryRepository
 */
class CategoryRepository extends BaseRepository
{
    /**
     * CategoryRepository constructor.
     *
     * @param  Category  $model
     */
    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    /**
     * Array of one or more ORDER BY column/value pairs.
     *
     * @var array
     */
    protected $orderBys = [
        ['column' => 'name', 'direction' => 'asc'],
    ];

    /**
     * @param array $data
     *
     * @throws \Exception
     * @throws \Throwable
     * @return Category
     */
    public function create(array $data) : Category
    {
        return DB::transaction(function () use ($data) {
            $category = $this->model::create($data);

            if ($category) {
                // event(new CategoryCreated($category));

                return $category;
            }

            throw new GeneralException(__('exceptions.backend.access.users.create_error'));
        });
    }

    /**
     * @param Category  $category
     * @param array $data
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     * @return Category
     */
    public function update(Category $category, array $data) : Category
    {
        return DB::transaction(function () use ($category, $data) {
            if ($category->update($data)) {
                // event(new CategoryUpdated($category));

                return $category;
            }

            throw new GeneralException(__('exceptions.backend.access.users.update_error'));
        });
    }
}
