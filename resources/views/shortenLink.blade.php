@extends('layout')

@section('page-content')


  <div class="container">

    <h4 class="alert alert-info mt-3">Create short link</h4>
    <div class="card">
      <div class="card-header">
        <form action="{{ route('generate.post') }}" method="post">
          @csrf
          <div class="input-group mb-3">
            <input type="text" name="originUrl" class="form-control" placeholder="URL">
            <div class="input-group-append">
              <button type="submit" class="btn btn-success">Shorten Link</button>
              <a href="{{ route('admin.index') }}" class="btn btn-danger">Admin Panel</a>
            </div>
          </div>
        </form>
      </div>

    @if($errors->any())
      <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
          @endforeach
      </div>
    @endif

      <div class="card-body">

        @if (Session::has('success'))
          <div class="alert alert-success">
            <p>{{ Session::get('success') }}</p>
          </div>
        @endif

        <table class="table talbe-bordered table-sm">
          <thead>
            <tr>
              <td>Short Link</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              @if ($shortLink == null)
                  <td></td>
              @else
                @if (time() - strtotime($shortLink->created_at) >= 259200)
                  <td><a class="btn disabled" href="{{ route('shorten.link',$shortLink->shortUrl) }}"
                    target="_blank">{{ route('shorten.link',$shortLink->shortUrl) }}</a></td>
                @else
                  <td><a  href="{{ route('shorten.link',$shortLink->shortUrl) }}"
                    target="_blank">{{ route('shorten.link',$shortLink->shortUrl) }}</a></td>
                @endif
              @endif
            </tr>
          </tbody>
        </table>

      </div>
    </div>
  </div>
@endsection
