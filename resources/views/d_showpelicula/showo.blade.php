@extends('layouts.app2')
@section('title', 'online')
@section('content')
   @livewire('showonline-component',['des_id' => $des_id])
@endsection
