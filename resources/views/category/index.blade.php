@extends('partials.main')

@section('container')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Category</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Striped Full Width Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No.</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <form action="{{ route('category.store') }}" method="POST">
                                @csrf
                                <div class="card">

                                    <div class="card-body">
                                        <label for="category">Category</label><br>
                                        <input type="text" id="category" name="name" placeholder="Category"><br><br>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>

                            </form>


                            <tbody>
                                @foreach ($category as $cat)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $cat->name }}</td>
                                        <td>
                                            <form action="{{ route('category.destroy', ['id' => $cat->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                {{-- <a href="{{ route('category.edit', ['id' => $cat->id]) }}"
                                                    class="btn btn-warning btn-sm"
                                                    style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"><span
                                                        data-feather="edit" width="17px" height="17px"></span> Edit </a> --}}

                                                <button class="btn btn-danger btn-sm"
                                                    style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"><span
                                                        data-feather="trash-2"
                                                        width="17px"height="17px"></span>Delete</button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
