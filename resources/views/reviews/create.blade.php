@extends('layouts.main')

@section('content')
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <form action="{{ route('reviews.store') }}" method="POST">
    @csrf
    @method ('POST')
    <div class="form-group">
      <label for="author">Inserisci autore</label>
      <input type="text" class="form-control" id="author" name="author" value="{{ old('author') }}">
    </div>
    <div class="form-group">
      <label for="rating">Voto</label>
      <input type="number" min="1" max="10" class="form-control" id="rating" name="rating" value="{{ old('rating') }}">
    </div>
    <div class="form-group">
      <label for="body">Commento</label>
      <textarea class="form-control" id="body" name="body">{{ old('body') }}</textarea>
    </div>

    <input type="submit" class="btn btn-primary" value="Edit">
  </form>
@endsection