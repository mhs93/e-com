@extends('admin.master')

@section('admin_dashboard')

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <p>
                    <?php
                     $message = Session::get('message');
                     if ($message){
                         echo $message;
                         $message = Session::put('message',null);
                     }
                    ?>
                </p>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                    <tr>
                        <th >Name</th>
                        <th>Description</th>
                        <th >Image</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td class="center">{{ $category->description }}</td>
                        <td class="center">
                            <img src="{{ asset('category/'.$category->image) }}" style="height: 50px; width: 40px;">
                        </td>
                        @if($category->status == 1)
                            <td class="center">
                                <span class="label label-success">Active</span>
                            </td>
                        @else
                            <td class="center">
                                <span class="label label-danger">Deactive</span>
                            </td>
                        @endif
                        <td class="center">
                            @if($category-> status == 1)
                                <a class="btn btn-success" href="{{ route('catStatusUpdate',$category->id) }}">
                                    <i class="halflings-icon white thumbs-down"></i>
                                </a>
                            @else
                                <a class="btn btn-success" href="{{ route('catStatusUpdate',$category->id) }}">
                                    <i class="halflings-icon white thumbs-up"></i>
                                </a>
                            @endif
                            <a class="btn btn-info" href="#">
                                <i class="halflings-icon white edit"></i>
                            </a>
                            <a class="btn btn-danger" href="#">
                                <i class="halflings-icon white trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div><!--/span-->

    </div><!--/row-->

@endsection