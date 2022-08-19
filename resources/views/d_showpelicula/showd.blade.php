@extends('layouts.app2')
@section('title', 'descargas')
@section('content')
   @livewire('showdescarga-component',['des_id' => $des_id])
@endsection
