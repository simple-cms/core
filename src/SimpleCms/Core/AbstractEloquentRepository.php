<?php namespace SimpleCms\Core;

use Illuminate\Support\Str;

abstract class AbstractEloquentRepository {

  /**
   * @var Model
   */
  protected $model;

  /**
   * @param null $model
   */
  public function __construct($model = null)
  {
    $this->model = $model;
  }

  /**
   * Return a single entity by it's ID
   *
   * @param int $id               The ID of the entity we're looking for
   * @param array $relationships  An array of relationships to return with the entity
   * @param array $columns        An array of columns to return
   *
   */
  public function getById($id, array $relationships = [], array $columns = ['*'])
  {
    // Grab the query builder
    $model = $this->make($relationships);

    // Return the entity
    return $model->find($id, $columns);
  }

  /**
   * Return the first single entity by a key and value
   *
   * @param string $key           The column to search
   * @param string $value         The value to search for
   * @param array $relationships  An array of relationships to return with the entity
   * @param array $columns        An array of columns to return
   *
   * @return Illuminate\Database\Eloquent\Collection
   */
  public function getFirstBy($key, $value, array $relationships = [], array $columns = ['*'])
  {
    // Grab the query builder
    $model = $this->make($relationships);

    // Return the entity
    return $model->where($key, '=', $value)->first($columns);
  }

  /**
   * Return many entities by key value
   *
   * @param string $key           The column to search
   * @param string $value         The value to search for
   * @param array $relationships  An array of relationships to return with the entities
   * @param array $orderBy        format: ['column', 'order']
   * @param array $columns        An array of columns to return
   *
   * @return Illuminate\Database\Eloquent\Collection
   */
  public function getManyBy($key, $value, array $relationships = [], array $orderBy = null, array $columns = ['*'])
  {
    // Grab the query builder
    $model = $this->make($relationships);

    // Are we specifying an order?
    if ($orderBy != null)
    {
      // Apply the ordering
      $model->orderBy($orderBy['column'], $orderBy['order']);
    }

    // Return the entity
    return $model->where($key, '=', $value)->get($columns);
  }

  /**
   * Return all entities
   *
   * @param array $relationships  An array of relationships to return with the entities
   * @param array $orderBy        format: ['column', 'order']
   * @param array $columns        An array of columns to return
   *
   * @return Illuminate\Database\Eloquent\Collection
   */
  public function all(array $relationships = [], array $orderBy = null, array $columns = ['*'])
  {
    // Grab the query builder
    $model = $this->make($relationships);

    // Are we specifying an order?
    if ($orderBy != null)
    {
      // Apply the ordering
      $model->orderBy($orderBy['column'], $orderBy['order']);
    }

    // Return the entities
    return $model->get($columns);
  }

  /**
   * Returns paginated entities
   *
   * @param int $perPage          The number of entities per page
   * @param array $relationships  An array of relationships to return with the entities
   * @param array $orderBy        format: ['column', 'order']
   * @param array $columns        An array of columns to return
   *
   * @return Illuminate\Pagination\Paginator
   */
  public function paginate($perPage = 15, array $relationships = [], array $orderBy = null, array $columns = ['*'])
  {
    // Grab the query builder
    $model = $this->make($relationships);

    // Return the paginated entities
    return $model->orderBy($orderBy['column'], $orderBy['order'])->paginate($perPage, $columns);
  }

  /**
   * Handles basic storing of our Model
   *
   * @param  array  $input
   *
   */
  public function store(array $input)
  {
    // Instantiate a new Model
    $model = new $this->model;

    // Fill the new Model with our input
    $model->fill($input);

    // Is this Model using slugs?
    if (isset($input['slug']))
    {
      // If the slug is empty use the title, other wise use the provided slug
      $model->slug = ($input['slug'] == '') ? Str::Slug($input['title']) : Str::slug($input['slug']);
    }

    // If the meta title is empty use the title, otherwise use the provided meta title
    $model->meta_title = ($input['meta_title'] == '') ? $input['title'] : $input->meta_title;

    // If the meta description is empty use the content, otherwise use the provided meta description
    $model->meta_description = ($input['meta_description'] == '') ? $input['content'] : $input->meta_description;

    // Attempt to save the model
    $model->save();

    // Return the model
    return $model;
  }

  /**
   * Handles basic updating of our Model
   *
   * @param  [type] $id
   * @param  array  $input
   *
   */
  public function update($id, array $input)
  {
    // Grab the Model by it's ID
    $model = $this->getById($id);

    // Fill it with the users input
    $model->fill($input);

    // If the meta title is empty use the title, otherwise use the provided meta tit
    $model->meta_title = ($input['meta_title'] == '') ? $input['title'] : $input['meta_title'];

    // If the meta description is empty use the content, other wiseuse the provided meta description
    $model->meta_description = ($input['meta_description'] == '') ? $input['content'] : $input['meta_description'];

    // Attempt to save the model
    $model->save();

    // Return the model
    return $model;
  }

  /**
   * Handles basic destruction of our Model
   *
   * @param  [type] $id
   *
   */
  public function destroy($id)
  {
    // Grab the Model by it's ID
    $model = $this->getById($id)->destroy($id);

    // Return the model
    return $model;
  }


  /**
   * Returns an array of entities to be used in a relationship <select> drop down
   *
   * @param  string $valueField   the name of the field to be used as text
   *
   * @return array
   */
  public function getSelectArray($valueField = 'title')
  {
    // Grab all of the regions
    $entities = $this->all();

    // An array to hold our entities
    $entityArray = ['0' => 'None'];

    // Loop through each entity and add them to an array with the entity ID as a key and the specified field as a value
    foreach ($entities as $entity) {
      $entityArray[$entity->id] = $entity->$valueField;
    }

    //Return the array
    return $entityArray;
  }

  /**
   * Sets up our Eloquent query builder object
   *
   * @param array $relationships An array of relationships to grab with the entities
   *
   * @return Illuminate\Database\Eloquent\Builder
   */
  protected function make(array $relationships = [])
  {
    // Grab the model
    $model = $this->model;

    // Grab any relationships we require
    return $this->with($relationships);
  }

}