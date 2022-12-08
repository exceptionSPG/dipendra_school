@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<dev class="page-content">
    <div class="container-fluid">
        <br><br><br>
        <div class="row p-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Reply Mail</h4>
                        <form method="POST" action="{{ route('mails.to.reply') }}">
                            @csrf

                            <!-- name	designation	photo	email	phone	address	profession	 -->
                            <input type="hidden" name="id" value="{{ $mail->id }}">


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Received Message:</label>
                                <div class="col-sm-10">
                                    <span class="text-danger">You can't edit this.</span>
                                    <textarea id="editor3" readonly required name="message">
                                    {{ $mail->message }}

                                    </textarea>

                                </div>
                            </div>
                            <!-- end row -->






                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Reply Mail:</label>
                                <div class="col-sm-10">
                                    <textarea id="editor1" required name="reply_message">
                                    {{ $mail->reply_message }}
                                    </textarea>
                                    @error('reply_message')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->







                            <input type="submit" value="Send Reply" class="btn btn-info waves-effect waves-light">
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>


    </div>
</dev>






@endsection