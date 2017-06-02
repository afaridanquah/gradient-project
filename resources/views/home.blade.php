@extends('layouts.app')
@section('styles')
    {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css') !!}
    {!! Html::style('css/sweetalert.css') !!}
@endsection

@section('content')
<div class="container">
    <gradient-panel title="File upload">
      {{Form::open(['action'=>'HomeController@addImage','class'=>'dropzone','id'=>'my-awesome-dropzone'])}}
      <gradient-form></gradient-form> 
      {{Form::close()}}
    </gradient-panel> 

    <!-- list of uploaded images  -->
    <gradient-panel title="List of Uploaded images">
      <table class="table">
           <tbody>
                @foreach($uploads->chunk(3) as $chunk)
                    <div class="row">
                        @foreach ($chunk as $upload)
                            <div class="col-xs-4" style="margin-bottom: 30px;">
                            <img class="img-responsive" style="height: 200px;" src="{{ asset("photos/$upload->file") }}">
                            </div>
                        @endforeach
                    </div>
               @endforeach
           </tbody>
       </table>
    </gradient-panel>  
    <center>{{ $uploads->links() }}</center>

    </div>
</div>
@endsection

@section('scripts')
 <!--    {!! Html::script('https://code.jquery.com/jquery-2.1.4.min.js') !!} -->
    {!! Html::script('js/sweetalert.js') !!}
    @include('Alerts::show')
    {!! Html::script('js/packages/dropzone.js') !!}
    {!! Html::script('js/packages/dropzone-custom.js') !!}
    <!-- {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.7.2/parsley.js') !!} -->

    <!-- {!! Html::script('/assets/js/dropzone-config.js') !!} -->
     <!--  <script type="text/javascript">
        window.ParsleyConfig = {
            errorsWrapper: '<div></div>',
            errorTemplate: '<span class="error-text" style="color:red"></span>',
            classHandler: function (el) {
                return el.$element.closest('input');
            },
            successClass: 'valid',
            errorClass: 'invalid'
        };
    </script> -->
    
    
@endsection
