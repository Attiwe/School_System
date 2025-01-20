@extends('layouts.master')
@section('css')

@livewireStyles
@endsection
@section('page-header')
<!-- breadcrumb -->
 

  @livewire('add-parent')

          

<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">

</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
@livewireScripts
@endsection