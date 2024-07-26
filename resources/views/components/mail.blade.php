@extends('layouts_bak.app')
@section('title', 'Mail')
@section('content')
<div class="container">
    <div class="row justify-content-center">
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
        <form  action="{{ route('send-mail') }}" method="POST" class="ajaxForm">
          @csrf
            <div class="mb-3 mt-3">
              <label for="email" class="form-label">Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="mb-3">
              <label for="subject" class="form-label">Subject:</label>
              <input type="text" class="form-control" id="subject" placeholder="Enter Subject" name="subject">
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message:</label>
                <textarea class="form-control" id="message" name="message">Hello, World!</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
          </form>
    </div>
</div>
@endsection