@extends('layouts.app')

@section('content')
<div class="row">
            <div class="col-md-3">
                 <div class="card bg-info">
                   <div class="card-header text-center">
                     POSTED

                   </div>
                   <div class="card-body bg-light ">
                     <h1 class="text-center">{{$posts_count}}</h1>
                   </div>

                 </div>
            </div>
            <div class="col-md-3">
                 <div class="card bg-danger">
                   <div class="card-header text-center">
                     TRASHED POSTS

                   </div>
                   <div class="card-body bg-light ">
                     <h1 class="text-center">{{$trashed_count}}</h1>
                   </div>

                 </div>
            </div>
            <div class="col-md-3">
                 <div class="card bg-success">
                   <div class="card-header text-center">
                     Users

                   </div>
                   <div class="card-body bg-light ">
                     <h1 class="text-center">{{$users_count}}</h1>
                   </div>

                 </div>
            </div>
            <div class="col-md-3">
                 <div class="card bg-info">
                   <div class="card-header text-center">
                     CATEGORIES

                   </div>
                   <div class="card-body bg-light ">
                     <h1 class="text-center">{{$categories_count}}</h1>
                   </div>

                 </div>
            </div>
</div>
@endsection
