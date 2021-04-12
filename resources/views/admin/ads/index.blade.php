@extends('layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> ADs </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active"> ADs
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">All ADs </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                @include('admin.includes.alerts.success')
                                @include('admin.includes.alerts.errors')

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered ">
                                            <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Status</th>
                                                {{--                                                <th>appearance</th>--}}
                                                {{--                                                <th>duration</th>--}}
                                                {{--                                                <th>Status</th>--}}
                                                {{--                                                <th>Image</th>--}}
                                                {{--                                                <th>views</th>--}}
                                                {{--                                                <th>Appearance/Day</th>--}}

                                                <th>Date From</th>
                                                <th>Date To</th>

                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($ads)
                                                @foreach($ads as $ad)
                                                    <tr>
                                                        <td>{{$ad -> title}}</td>
                                                        <td>{{$ad -> getActive()}}</td>
                                                        <td>{{$ad -> date_from}}</td>
                                                        <td>{{$ad -> date_to}}</td>

                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('admin.ad.edit',$ad -> id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">Edit</a>
                                                                <a href="{{route('admin.ad.show',$ad -> id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">More</a>
                                                                <a href="{{route('admin.ad.status',$ad -> id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">Change Status</a>
                                                                <form action="ads/delete/{{$ad->id}}" method="post">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button type="submit"
                                                                            class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">
                                                                        Delete
                                                                    </button>
                                                                </form>

                                                         </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endisset


                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
