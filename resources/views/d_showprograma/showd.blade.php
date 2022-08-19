@extends('layouts.app2')
@section('title', 'descargas')
@section('content')
   @livewire('showpdescarga-component',['des_id' => $des_id])
@endsection
