@if($errors->count() > 0)
<div class="alert alert-danger alert-dismissable">
  <i class="fa fa-ban"></i>
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>The following errors occurred:</strong>
  <ul>
  @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
  @endforeach
  </ul>
</div>
@endif

@if(Session::has('flash-type') and Session::has('flash-message'))
<div class="alert alert-{{ Session::get('flash-type') }} alert-dismissable">
  <i class="fa fa-ban"></i>
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <p>{{ Session::get('flash-message') }}</p>
</div>
@endif