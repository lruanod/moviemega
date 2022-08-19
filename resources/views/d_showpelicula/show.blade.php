@extends('layouts.app')
@section('title', 'detalle')
@section('content')
   @livewire('showpelicula-component',['pel_id' => $pel_id])
@endsection
