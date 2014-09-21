<?php namespace SimpleCms\Core;

use Illuminate\Database\Eloquent\Model;
// use Validator;

class BaseModel extends Model {

  // /**
  //  * Errors
  //  *
  //  * @var Illuminate\Support\MessageBag
  //  */
  // protected $errors;

  // /**
  //  * Override the default boot method to hook into the saving event
  //  *
  //  * @return bool
  //  */
  // public static function boot()
  // {
  //   // Call the parent boot method
  //   parent::boot();

  //   // Here we hook into the saving event with a closure
  //   static::saving(function($model) {
  //     return $model->validate($model->getAttributes(), $model::$rules);
  //   });
  // }

  // /**
  //  * Attempts to validate our Model
  //  *
  //  * @param  array $input the input to validate
  //  * @param  array $rules an array of rules
  //  * @param  array $messages an array of rules
  //  *
  //  * @return bool
  //  */
  // public function validate(array $input, array $rules, array $messages = [])
  // {
  //   // Here we call our validator and pass it our attributes and rules
  //   $validation = Validator::make($input, $rules, $messages);

  //   // Validation fails
  //   if ($validation->fails())
  //   {
  //     // Store the error messages
  //     $this->errors = $validation->messages();

  //     return false;
  //   }

  //   return true;
  // }

  // /**
  //  * Handy method to return any errors associated with the Model
  //  *
  //  * @return Illuminate\Support\MessageBag
  //  */
  // public function getErrors()
  // {
  //   return $this->errors;
  // }

  // /**
  //  * Handy method to check if the Model has any errors
  //  *
  //  * @return bool
  //  */
  // public function hasErrors()
  // {
  //   return count($this->getErrors()) ? true : false;
  // }

}