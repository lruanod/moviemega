@extends('layouts.app')
@section('title', 'detalle')
@section('content')
   @livewire('showprogramap-component',['pro_id' => $pro_id])
@endsection
