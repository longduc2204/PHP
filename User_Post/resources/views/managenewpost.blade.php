@extends('layouts.app')

@section('content')
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            text-align: center;
            border-collapse: collapse;
        }

        h1 {
            text-align: center;
        }

        a {
            text-decoration: none;
        }

        h3 {
            text-align: center;
        }

    </style>

    <?php $count = 1; ?>

    <div>

    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Manage Post</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <h1>Manage Post</h1>
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <th>STT</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tfoot>
                    <tbody>
                        @foreach ($post as $item)
                            <tr>
                                <td><?php echo $count++; ?></td>
                            <td>{{ $item->title }}</td>
                                <td>{{ $item->content }}</td>
                                <td>
                                <a href="{{ route('post.edit',$item->id) }}">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('post.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button style="border-radius: 10px; background-color: red;">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

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
