@extends('dashboard')

@section('content')
    <style>
        /* Bỏ gạch chân link + đường kẻ giữa các dòng bảng */
        .user-list-plain a { text-decoration: none; }
        .user-list-plain .pagination .page-link { text-decoration: none; }
    </style>
    <main class="login-form user-list-plain">
        <div class="container">
            <div class="row justify-content-center">
                <table class="table table-borderless mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a class="link-primary" href="{{ route('user.readUser', ['id' => $user->id]) }}">View</a> |
                                    <a class="link-primary" href="{{ route('user.updateUser', ['id' => $user->id]) }}">Edit</a> |
                                    <a class="link-primary" href="{{ route('user.deleteUser', ['id' => $user->id]) }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mt-3 w-100">
                    <div class="text-secondary small">
                        @if ($users->total() > 0)
                            Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} results
                        @else
                            No results
                        @endif
                    </div>
                    <div>
                        {!! $users->links() !!}
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection