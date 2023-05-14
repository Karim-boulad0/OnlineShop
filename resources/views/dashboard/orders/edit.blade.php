@extends('dashboard.layout.layout')

@section('body')
    <style>
        img {
            border: 1px solid #ddd;
            border-radius: 20px;
            padding: 5px;
        }
    </style>
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
<div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3> {{ __('words.EditOrder') }}
                        </h3>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row product-adding">
            <div class="col-xl-12">
                <div class="card">

                    <div class="card-body">
                        <div class="digital-add needs-validation">
                            <form action="{{route('orderss.update',$order->id)}}" method="post"
                               >
                                @csrf
                                @method('put')
                                <div class="col-12">

                                    @if ($errors->any())
                                        {!! implode('', $errors->all('<div>:message</div>')) !!}
                                    @endif
                                    <div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0">
                                            {{ __('words.Is_Approve') }}</label>
                                        <input class="form-control" id="validationCustom01" type="text"
                                            name="is_approve" value="{{ $order->is_approve }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0">
                                            {{ __('words.Note') }}</label>
                                        <input class="form-control" id="validationCustom01" type="text"
                                            name="note" value="{{ $order->note }}" required>
                                    </div>


                                    {{-- <input type="hidden" id="is_approve_hidden" name="is_approve">
                                    <div class="btn-group" role="group" aria-label="Choose Approval Status">
                                        <button type="button" class="btn btn-primary" id="approve-btn">Approve</button>
                                        <button type="button" class="btn btn-danger" id="reject-btn">Reject</button>
                                      </div>

                                      <script>
                                        var isApprove = {{$order->is_approve}};
                                        var hiddenInput = document.getElementById("is_approve_hidden");

                                        if (isApprove) {
                                          document.getElementById("approve-btn").classList.add("active");
                                        } else {
                                          document.getElementById("reject-btn").classList.add("active");
                                        }

                                        document.getElementById("approve-btn").addEventListener("click", function() {
                                          isApprove = 1;
                                          hiddenInput.value = isApprove;
                                          document.getElementById("reject-btn").classList.remove("active");
                                          document.getElementById("approve-btn").classList.add("active");
                                        });

                                        document.getElementById("reject-btn").addEventListener("click", function() {
                                          isApprove = 0;
                                          hiddenInput.value = isApprove;
                                          document.getElementById("approve-btn").classList.remove("active");
                                          document.getElementById("reject-btn").classList.add("active");
                                        });
                                      </script> --}}
                                                <div class="form-group">
                                                    <button class="btn btn-primary" type="submit">{{ __('words.Save') }}</button>
                                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Container-fluid Ends-->

</div>
</div>
@endsection


@section('javascript')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection('javascripts')
