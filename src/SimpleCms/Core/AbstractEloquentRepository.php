<?php namespace SimpleCms\Core;

use Illuminate\Support\Str;

/**
 * Our base Eloquent Repository, it provides a bunch of commonly used methods to prevent repeating code.
 *
 * Heavily inspired by the work by Philip Brown (phil.ipbrown.com) - http://culttt.com/2014/03/17/eloquent-tricks-better-repositories/
 *
 */
abstract class AbstractEloquentRepository {

  /**
   * Return all entities
   *
   * @param array $with     an array of relationships to return with the entities
   * @param array $orderBy  format: ['column', 'order']
   *
   * @return Illuminate\Database\Eloquent\Collection
   */
  public function all(array $with = [], array $orderBy = ['column' => 'updated_at', 'order' => 'desc'])
  {
    return $this->make($with)->orderBy($orderBy['column'], $orderBy['order'])->get();
  }

  /**
   * Returns paginated entities
   *
   * @param int $perPage    the number of entities per page
   * @param array $with     an array of relationships to return with the data set
   * @param array $orderBy  format: ['column', 'order']
   *
   * @return Illuminate\Pagination\Paginator
   */
  public function paginate($perPage = 15, array $with =[], array $orderBy = ['column' => 'updated_at', 'order' => 'desc'])
  {
    return $this->make($with)->orderBy($orderBy['column'], $orderBy['order'])->paginate($perPage);
  }

  /**
   * Search for a single entity by a key and value
   *
   * @param string $key     the column name to search
   * @param string $value   the value to search for
   * @param array $with     an array of relationships to return with the data set
   *
   * @return Illuminate\Database\Eloquent\Collection
   */
  public function getFirstBy($key, $value, array $with = [])
  {
    return $this->make($with)->where($key, '=', $value)->first();
  }

  /**
   * Find entities by key value
   *
   * @param string $key     the column name to search
   * @param string $value   the value to search for
   * @param array $with     an array of relationships to return with the data set
   * @param array $orderBy  format: ['column', 'order']
   *
   * @return Illuminate\Database\Eloquent\Collection
   */
  public function getManyBy($key, $value, array $with = [], array $orderBy = ['column' => 'updated_at', 'order' => 'desc'])
  {
    return $this->make($with)->where($key, '=', $value)->orderBy($orderBy['column'], $orderBy['order'])->get();
  }

  /**
   * Find an entity by it's ID
   *
   * @param int $id       the entity ID
   * @param array $with   an array of relationships to return with the data set
   *
   */
  public function getById($id, array $with = [])
  {
    $query = $this->make($with);

    return $query->find($id);
  }

  /**
   * Make a new instance of the entity to query on
   *
   * @param array $with
   */
  public function make(array $with = [])
  {
    return $this->model->with($with);
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

}