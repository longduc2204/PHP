
@extends('layouts.Homepage')

@section('content')
<table class="content-table">
    @foreach ($post as $item)
        <tr>
            <td class="style-content">
                <img src="{{ $item->feature_url }}" alt="logo" class="header-logo">
                {{ $item->title }}
            </td>
            <td class="style-content2">{{ $item->content }}</td>
        </tr>
    @endforeach
</table>
@endsection
