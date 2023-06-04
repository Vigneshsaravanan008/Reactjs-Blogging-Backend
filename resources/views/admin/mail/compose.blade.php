@extends('admin.layouts.master')
@section('meta_details')
    <title>GmailFileManager | Inbox</title>
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Inbox</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Inbox</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            @include('admin.mail.sidebar')
            <div class="col-md-9">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Compose New Message</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input class="form-control" placeholder="To:" name="to_mail">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Subject:" name="subject">
                        </div>
                        <div class="form-group">
                            <textarea id="compose-textarea" class="form-control" name="content"></textarea>
                        </div>
                        {{-- <div class="form-group">
                            <div class="btn btn-default btn-file">
                                <i class="fas fa-paperclip"></i> Attachment
                                <input type="file" name="attachment">
                            </div>
                            <p class="help-block">Max. 32MB</p>
                        </div> --}}
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i> Draft</button>
                            <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                        </div>
                        <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
