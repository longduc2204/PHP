@extends('layouts.app')

@section('content')
    <style>
        .exam-container {
            display: flex;
            background: #ab7bb0;
            padding: 4px;
        }

        .exam-element {

            margin: 1px;
            color: black;
            min-height: 15px;
            justify-content: center;
            display: flex;
            align-items: center;
        }

    </style>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit New Post</h6>
        </div>
        <div class="card-body">
            <h1 style="text-align: center">Edit New Post</h1>
            <form class="user" method="POST" action="{{ route('post.update') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $post->id }}">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" value="{{ $post->title }}" name="title"
                        required autocomplete="title" autofocus placeholder="Title New Post">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" value="{{ $post->content }}" name="content"
                        required autocomplete="content" autofocus placeholder="Name New Post">
                </div>

                <div style="display:flex;width: 100% ">

                    @foreach ($category as $item)
                        <input class="exam-element flex-grow-ele1" style="flex-grow: 2;margin-top: 5px" type="checkbox"
                            name="category_id[]'" value="{{ $item->id }}"
                            {{ in_array($item->id, $category_post) ? 'checked' : '' }}>
                        <label class="exam-element flex-grow-ele1"
                            style="flex-grow: 2;margin-top: 0px;margin-left: -20px">{{ $item->name }}</label><br>
                    @endforeach
                </div>
                <input type="file" id="feature_url" name="feature_url">
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    {{ __('Edit New Post') }}
                </button>
            </form>

            <script src="{{ asset('./sb/vendor/jquery/jquery.min.js') }}"></script>
            <script src="{{ asset('./sb/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
            <script src=" {{ asset('./sb/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
            <script src="{{ asset('./sb/js/sb-admin-2.min.js') }}"></script>
            <script src="{{ asset('./sb/vendor/datatables/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('./sb/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('./sb/js/demo/datatables-demo.js') }}"></script>
        </div>
    </div>

@endsection
