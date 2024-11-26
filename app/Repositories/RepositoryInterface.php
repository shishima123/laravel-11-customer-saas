<?php

namespace App\Repositories;

/**
 * Interface RepositoryInterface
 */
interface RepositoryInterface
{
    /**
     * Retrieve all data of repository
     *
     * @param  array  $columns
     * @return mixed
     */
    public function all($columns = ['*']);

    /**
     * Retrieve all data of repository, paginated
     *
     * @param  number  $limit
     * @param  array  $columns
     * @return mixed
     */
    public function paginate($limit = 20, $columns = ['*']);

    /**
     * Find data by id
     *
     * @param  number  $id
     * @param  array  $columns
     * @return mixed
     */
    public function findById($id, $columns = ['*']);

    /**
     * Find data by field and value
     *
     * @param  string  $field
     * @param  string  $value
     * @return mixed
     */
    public function findByField($field, $value);

    /**
     * Save a new entity in repository
     *
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Update a entity in repository by id
     *
     * @param  number  $id
     * @return mixed
     */
    public function update(array $attributes, $id);

    /**
     * Delete a entity in repository by id
     *
     * @param  number  $id
     * @return mixed
     */
    public function delete($id);

    /**
     * Delete a entity in repository by multiple id
     *
     * @param  array  $ids
     * @return bool
     */
    public function deleteMultiple($ids);

    /**
     * Order collection by a given column
     *
     * @param  string  $field
     * @param  string  $direction
     * @return $this
     */
    public function orderBy($field, $direction = 'asc');

    /**
     * Load relations
     *
     * @return $this
     */
    public function with($tableName);

    /**
     * return datatable
     *
     * @param  null  $orderCallback
     * @param  null  $getPagination
     * @return $this
     */
    public function returnDataTable(
        array $params,
        $sql,
        $sort = '',
        $pk = false,
        $orderCallback = null,
        $getPagination = null
    );

    /** Update or Create an entity in repository
     *
     *
     * @return mixed
     */
    public function updateOrCreate(array $attributes, array $values = []);

    /** Find an entity in repository
     *
     *
     * @return mixed
     */
    public function findOrFail($id);
}
