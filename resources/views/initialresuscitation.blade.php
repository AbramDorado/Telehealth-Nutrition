@extends('layouts.master')

@section('content')
    <div>
        <select name="breathing-upon-ca" class="form-control">
            <option value="spontaneous">Spontaneous</option>
            <option value="apneic">Apneic</option>
            <option value="agonal">Agonal</option>
            <option value="assisted">Assisted</option>
        </select>

        <form action="{{ url('/first-ventilation-dt') }}" method="post">
            @csrf 
            <button type="submit">1st Assisted Ventilation Date/Time</button>
        </form>

        <select name="ventilation" class="form-control">
            <option value="spontaneous">Bag-Valve Mask</option>
            <option value="tracheostomy">Tracheostomy</option>
            <option value="endotracheal-tube">Endotracheal Tube</option>
            <option value="others">Others</option>
        </select>

        <form action="{{ url('/intubation-dt') }}" method="post">
            @csrf 
            <button type="submit">Intubated Date/Time</button>
        </form>

        <select name="et-tube-information" multiple class="form-control">
            <option value="auscultation">Auscultation</option>
            <option value="exhaled-co2">Exhaled CO2</option>
        </select>

        <form action="{{ url('/first-pulseless-rhythm-dt') }}" method="post">
            @csrf 
            <button type="submit">1st Pulseless Rhythm Detected Date/Time</button>
        </form>

        <form action="{{ url('/compressions-dt') }}" method="post">
            @csrf 
            <button type="submit">Compressions Started Date/Time</button>
        </form>

        <form action="{{ url('/aed-applied-dt') }}" method="post">
            @csrf 
            <button type="submit">AED Applied Date/Time</button>
        </form>

        <form action="{{ url('/pacemaker-on-dt') }}" method="post">
            @csrf 
            <button type="submit">Pacemaker on Date/Time</button>
        </form>
    </div>


@endsection
