@extends('layouts.master')

@section('css')
        <!-- Table css -->
        <link href="{{ URL::asset('plugins/RWD-Table-Patterns/dist/css/rwd-table.min.css') }}" rel="stylesheet" type="text/css" media="screen">
        <!-- Font Awesome css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
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

@section('content')
@include('includes.flash')
    <div class="row">
  <div class="col-12">
            <div class="card">
                <div class="card-body">
                <h1 class="card-title">Archived Records</h1>
                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="datatable-buttons" class="table table-hover table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Location</th>
                                    <th>Patient Name</th>
                                    <th>Resuscitation Event Time Started</th>
                                    <th>Resuscitation Event Time Ended</th>
                                    <th>Code Leader</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($archivedEvents as $archivedEvent)
                                
                            
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $archivedEvent->created_at }}</td>
                                        <td>{{ $archivedEvent->location }}</td>
                                        <td>{{ $archivedEvent->first_name }} {{ $archivedEvent->last_name }}</td>
                                        <td>{{ $archivedEvent->code_start_dt }}</td>
                                        <td>{{ $archivedEvent->code_end_dt }}</td>
                                        <td>{{ $archivedEvent->code_team_leader }}</td>
                                        <td>
                                        <form action="{{ route('unarchive_codeblueforms', ['code_number' => $archivedEvent->code_number]) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure you want to unarchive this record?')">Unarchive</button>
                                        </form>
                                        </td>    
                                    </tr>
                              
                               
                                @endforeach
                            </tbody>
                        </table>
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