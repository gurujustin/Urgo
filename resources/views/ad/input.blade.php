@extends('layouts.master')

@section('title','Test')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="/ad-content">
                    @csrf
                    <div class="form-group">
                        <input name="adurl" type="text" class="form-control" placeholder="input ad url here"><br />
                        <input type="submit" value="Get Content From URL" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->

@endsection
