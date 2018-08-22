<!--since we enabled validations in the controller
if there are any validation errors the $errors number will increase-->
@if(count($errors) > 0)

<ul class="list-group">
    @foreach($errors->all() as $error)
    <li class="list-group-item text-danger">
      {{ $error }}
    </li>
    @endforeach
</ul>

@endif
