@extends('layouts.master')

@section('css')
    <!-- Table css -->
    <link href="{{ URL::asset('plugins/RWD-Table-Patterns/dist/css/rwd-table.min.css') }}" rel="stylesheet"
        type="text/css" media="screen">
@endsection

@section('button')
        <form action="{{ url('/maininformationview') }}" method="get">
            @csrf 
            <button type="submit" class="btn btn-primary btn-block">New Resuscitation Event</button>
        </form>
@endsection

@section('content')
@include('includes.flash')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="datatable-buttons" class="table table-hover table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        
                            <thead class="thead-dark">
                                    <tr>
                                        <th data-priority="1">#</th>
                                        <th data-priority="2">Date</th>
                                        <th data-priority="2">Location</th>
                                        <th data-priority="3">Patient Name</th>
                                        <th data-priority="4">Resuscitation Event Time Started</th>
                                        <th data-priority="5">Resuscitation Event Time Ended</th>
                                        <th data-priority="6">Code Leader</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                 
                                </tbody>
								
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div> 

@endsection


@section('script')
    <!-- Responsive-table-->
    <script src="{{ URL::asset('plugins/RWD-Table-Patterns/dist/js/rwd-table.min.js') }}"></script>
@endsection

@section('script')
    <script>
        $(function() {
            $('.table-responsive').responsiveTable({
                addDisplayAllBtn: 'btn btn-secondary'
            });
        });
    </script>
@endsection
