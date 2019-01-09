@extends('errors::layout')

@section('title', 'Service Unavailable')

@section('message', env('MAINTENANCE_MESSAGE', 'System updates in process.'))
