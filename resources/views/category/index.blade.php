@extends('layouts.app')
@section('pageTitle', 'Home')
@section('content')
<br>

<section class="content-header mt-5">
    <div class="container">
      <div class="row mb-0">
        <div class="col-sm-5">
          <h1>Categories</h1>
        </div>
        <div class="col-sm-7">
            <nav aria-label=" breadcrumb">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a  href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item active">Categories</li>
          </ol>
            </nav>
        </div>
      </div>
    </div>
  </section>
  <br>
<a href="{{ route('category.create') }}" class="btn btn-success ">Create New Job Category</a>
    <h3> Categories</h3>
    @include('layouts.partials.message')
    <div class="table-responsive">
    <table class="table table-hover ">
        <thead class="thead-light">
          <tr>

            <th>Category</th>
            <th>Job</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            @foreach ($categories as $category)

            <td>{{ $category->category }}</td>
            <td> {{ $category->job }}</td>
            <td><a href="{{ route('category.edit',$category->id) }}" class="btn btn-primary btn-sm">Edit</a></td>
            <td><form action="{{ route('category.destroy',$category->id) }}" method="POST">
                {{ method_field('delete') }}
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')"> Delete</button>
                </form></td>
          </tr>
          @endforeach

        </tbody>
      </table>
    </div>
@endsection

