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

        .custom-file-input::-webkit-file-upload-button {
            visibility: hidden;
        }

        .custom-file-input::before {
            content: 'Select some files';
            display: inline-block;
            background: linear-gradient(top, #f9f9f9, #e3e3e3);
            border: 1px solid #999;
            border-radius: 3px;
            padding: 5px 8px;
            outline: none;
            white-space: nowrap;
            -webkit-user-select: none;
            cursor: pointer;
            text-shadow: 1px 1px #fff;
            font-weight: 700;
            font-size: 10pt;
        }

        .custom-file-input:hover::before {
            border-color: black;
        }

        .custom-file-input:active::before {
            background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
        }

    </style>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create New Post</h6>
        </div>
        <div class="card-body">
            <h1 style="text-align: center">Create New Post</h1>
            <form class="user" method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="title" required autocomplete="title"
                        autofocus placeholder="Title New Post">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="content" required autocomplete="content"
                        autofocus placeholder="Name New Post">
                </div>
                <div style="display:flex;width: 100% ">
                    @foreach ($category as $item)
                        <input class="exam-element flex-grow-ele1" style="flex-grow: 2;margin-top: 5px" type="checkbox"
                            name="category_id[]" value="{{ $item->id }}">
                        <label class="exam-element flex-grow-ele1"
                            style="flex-grow: 2;margin-top: 0px;margin-left: -20px">{{ $item->name }}</label><br>
                    @endforeach
                </div>
                <input type="file" id="feature_url" name="feature_url">


                {{-- <form method="post" style="">
                    <textarea id="summernote" name="editordata"></textarea>
                </form> --}}

                <button type="submit" class="btn btn-primary btn-user btn-block">
                    {{ __('Create New Post') }}
                </button>
            </form>

        </div>
    </div>

@endsection
@section('script')
{{-- <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script> --}}

@endsection
