@extends('layouts.master')

@section('css')
    <!-- Table css -->
    <link href="{{ URL::asset('plugins/RWD-Table-Patterns/dist/css/rwd-table.min.css') }}" rel="stylesheet" type="text/css" media="screen">
</section>

@section('button')
    @php
        $lastCodeNumber = DB::table('code_blue_activations')->orderBy('code_number', 'desc')->first();

        if ($lastCodeNumber) {
            $nextCodeNumber = $lastCodeNumber->code_number + 1;
        } else {
            $nextCodeNumber = 1;
        }
    @endphp

    <form method="GET" action="{{ route('maininformation', ['code_number' => $nextCodeNumber]) }}">
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($resuscitationEvents as $event)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $event->created_at }}</td>
                                    <td>{{ $event->location }}</td>
                                    <td>{{ $event->first_name }} {{ $event->last_name }}</td>
                                    <td>{{ $event->code_start_dt }}</td>
                                    <td>{{ $event->code_end_dt }}</td>
                                    <td>Code Leader</td>
                                </tr>
                                @endforeach
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
    <script>
        $(function() {
            $('.table-responsive').responsiveTable({
                addDisplayAllBtn: 'btn btn-secondary'
            });
        });
    </script>
</section>
