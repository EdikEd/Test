@extends('layout')

@section('page-content')

<div class="container">

  <h4 class="alert alert-info mt-3">Admin panel</h4>
  <table class="table table-striped">
    <thead>
      <tr>
        <td>Short links</td>
        <td>Created at</td>
        <td class="d-flex justify-content-end"><a href="/" class="btn btn-success">Back to main page</a></td>
      </tr>
    </thead>
    <tbody>
      @foreach ($shortLinks as $link)
        <tr>
        @if (time() - strtotime($link->created_at) >= 259200)
          <td><a class="btn disabled" href="{{ route('shorten.link',$link->shortUrl) }}"
            target="_blank">{{ route('shorten.link',$link->shortUrl) }}</a></td>
        @else
          <td><a class="btn btn-primary" href="{{ route('shorten.link',$link->shortUrl) }}"
            target="_blank">{{ route('shorten.link',$link->shortUrl) }}</a></td>
        @endif
            <td>{{ $link->created_at }}</td>
            <td class="d-flex justify-content-end"><a href="{{ route('delete',$link->id) }}" class="btn btn-danger">Delete</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
