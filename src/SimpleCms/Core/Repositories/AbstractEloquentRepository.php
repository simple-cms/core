<?php namespace SimpleCms\Core\Repositories;

use Str;

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
    return $this->model->all();
  }

  /**
   * Find a single entity by a key value
   *
   * @param string $key
   * @param string $value
   * @param array $with
   *
   * @return SimpleCms\Blog\Models\Post
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
   * @return SimpleCms\Blog\Models\Post
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

  public function store(array $input)
  {
    $model = new $this->model;

    $model->fill($input);

    if (isset($input['slug']))
    {
      $model->slug = ($input['slug'] == '') ? Str::Slug($input['title']) : Str::slug($input->slug);
    }

    $model->save();

    return $model;
  }

  public function update($slug, array $input)
  {
    $model = $this->getFirstBy('slug', $slug);

    $model->fill($input);

    $model->save();

    return $model;
  }

}