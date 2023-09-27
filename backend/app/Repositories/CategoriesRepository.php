<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Categories;
use App\Interfaces\CrudInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Pagination\Paginator;

class CategoriesRepository implements CrudInterface
{

    public Categories | null $categories;

    /**
     * Constructor.
     */
    public function __construct()
    {
        
    }

    /**
     * Get All Categories.
     *
     * @return collections Array of Categories Collection
     */
    public function getAll(): Paginator
    {
        return Categories::orderBy('id', 'desc')
            ->paginate(10);
    }

    /**
     * Get Paginated Categories Data.
     *
     * @param int $pageNo
     * @return collections Array of Categories Collection
     */
    public function getPaginatedData($perPage): Paginator
    {
        $perPage = isset($perPage) ? intval($perPage) : 12;
        return Categories::orderBy('id', 'desc')
            ->paginate($perPage);
    }

     /**
     * Get Searchable Categories Data with Pagination.
     *
     * @param int $pageNo
     * @return collections Array of Categories Collection
     */
    public function searchCategories($keyword, $perPage): Paginator
    {
        $perPage = isset($perPage) ? intval($perPage) : 10;

        return Categories::where('id', 'like', '%' . $keyword . '%')
            ->orWhere('description', 'like', '%' . $keyword . '%')
            ->orderBy('id', 'desc')
            ->paginate($perPage);
    }


    /**
     * Create New Categories.
     *
     * @param array $data
     * @return object Categories Object
     */
    public function create(array $data): Categories
    {

        $data['description'] = $data['description'];
        $data['active'] = $data['active'];

        return Categories::create($data);

    }

     /**
     * Delete Categories.
     *
     * @param int $id
     * @return boolean true if deleted otherwise false
     */
    public function delete($id): bool
    {
        $categories = Categories::find($id);
        if (empty($categories)) {
            return false;
        }

        $categories->delete($categories);
        return true;
    }


    /**
     * Get Categories Detail By ID.
     *
     * @param int $id
     * @return void
     */
    public function getByID($id): Categories|null
    {
        return Categories::find($id);
    }

    /**
     * Update Categories By ID.
     *
     * @param int $id
     * @param array $data
     * @return object Updated Categories Object
     */
    public function update($id, array $data): Categories|null
    {
        $categories = Categories::find($id);

        if (is_null($categories)) {
            return null;
        }

        // If everything is OK, then update.
        $categories->update($data);

        // Finally return the updated categories.
        return $this->getByID($categories->id);
    }

    
}
