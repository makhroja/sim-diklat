@extends('layouts.site')
@push('styles')
<style>
    .dataTables_filter {
        display: none;
    }
</style>
@endpush
@section('content')
<div id="content">
    <div class="error">
        <div class="error__content">
          <h2>404</h2>
          <h3>Something went wrong!</h3>
          <p>There was a problem on our end. Please try again later.</p>
        <a href="{{url('')}}" type="button" class="btn btn-accent btn-pill">← Go Home</a>
        </div> <!-- / .error_content -->
      </div>
</div>
@endsection

@push('scripts')

@endpush