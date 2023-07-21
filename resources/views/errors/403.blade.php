@extends('errors::illustrated-layout')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', ' لف وأرجع تاني ' . __($exception->getMessage() ?: 'Forbidden'))
