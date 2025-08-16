@extends('layouts.app')

@section('page_title', 'Edit Klien')

@section('content')
@include('master.klien.create', ['klien' => $klien])
@endsection
