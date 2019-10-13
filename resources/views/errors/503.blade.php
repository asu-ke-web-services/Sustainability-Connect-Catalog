@extends('errors::layout')

@section('title', 'Service Unavailable')

@section('message', env('MAINTENANCE_MESSAGE', 'Please standby. Sustainability Connect is receiving updated software.'))
