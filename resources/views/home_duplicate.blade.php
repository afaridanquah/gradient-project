@extends('layouts.app')
@section('styles')
    {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css') !!}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-white">
                <div class="panel-heading">File Uploads</div>
                <div class="panel-body">
                    {{Form::open(['action'=>'HomeController@addImage','class'=>'dropzone','id'=>'my-awesome-dropzone'])}}
                        <div class="form-group">
                            <label for="filename">File name</label>
                            <input type="text" class="form-control" name="filename" autofocus>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                        <hr>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
           <div class="panel panel-white">
               <div class="panel-heading">List of Uploaded images</div>
                   <div class="panel-body">
                       <table class="table">
                           <thead>
                                
                           </thead>
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
                   </div>

               </div>
           </div> 
        </div>
    </div>
</div>
@endsection

@section('scripts')
 <!--    {!! Html::script('https://code.jquery.com/jquery-2.1.4.min.js') !!} -->
    {!! Html::script('js/packages/dropzone.js') !!}
    {!! Html::script('js/packages/dropzone-custom.js') !!}
    <!-- {!! Html::script('/assets/js/dropzone-config.js') !!} -->
    
@endsection
