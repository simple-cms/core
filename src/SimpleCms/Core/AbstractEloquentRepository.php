<?php namespace SimpleCms\Core;

use Illuminate\Support\Str;

/**
 * Our base Eloquent Repository, it provides a bunch of commonly used methods to prevent repeating code.
 *
 * Very HEAVILY based work by Philip Brown (phil.ipbrown.com) - http://culttt.com/2014/03/17/eloquent-tricks-better-repositories/
 *
 */
abstract class AbstractEloquentRepository {

  /**
   * Return all entities
   *
   * @return Illuminate\Database\Eloquent\Collection
   */
  public function all()
  {
    return $this->model->orderBy('updated_at', 'DESC')->get();
  }

  /**
   * Find a single entity by a key value
   *
   * @param string $key
   * @param string $value
   * @param array $with
   *
   */
  public function getFirstBy($key, $value, array $with = [])
  {
    return $this->make($with)->where($key, '=', $value)->first();
  }

  /**
   * Find entities by key value
   *
   * @param string $key
   * @param string $value
   * @param array $with
   *
   * @return Illuminate\Database\Eloquent\Collection
   */
  public function getManyBy($key, $value, array $with = [])
  {
    return $this->make($with)->where($key, '=', $value)->get();
  }

  /**
   * Find an entity by it's ID
   *
   * @param int $id
   * @param array $with
   *
   */
  public function getById($id, array $with = [])
  {
    $query = $this->make($with);

    return $query->find($id);
  }

  /**
   * Return all entities that have a required relationship
   *
   * @param string $relation
   * @param array $with
   *
   */
  public function has($relation, array $with = [])
  {
    $entity = $this->make($with);

    return $entity->has($relation)->get();
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

    // If the meta title is empty use the title, other wise use the provided meta title
    $model->meta_title = ($input['meta_title'] == '') ? $input['title'] : $input->meta_title;

    // If the meta description is empty use the excerpt, other wise use the provided meta description
    $model->meta_description = ($input['meta_description'] == '') ? $input['excerpt'] : $input->meta_description;

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

    // If the meta title is empty use the title, other wise use the provided meta tit
    $model->meta_title = ($input['meta_title'] == '') ? $input['title'] : $input['meta_title'];

    // If the meta description is empty use the excerpt, other wise use the provided meta description
    $model->meta_description = ($input['meta_description'] == '') ? $input['excerpt'] : $input['meta_description'];

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
   * Returns an array of entities to be used in a relationship <select> dropdown
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