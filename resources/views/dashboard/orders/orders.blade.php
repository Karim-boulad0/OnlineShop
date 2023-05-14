@extends('dashboard.layout.layout')

@section('body')
    <style>
        img {
            border: 1px solid #ddd;
            border-radius: 20px;
            padding: 5px;
            width: 20px;
        }
    </style>
    <div class="page-body">
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3>   {{ __('words.Orders') }}
                            </h3>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
        {{-- delete --}}
        <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('orders.delete') }}" method="POST">
                    <div class="modal-content">

                        <div class="modal-body">
                            @csrf
                            @method('DELETE')
                            <div class="form-group">
                                <p>{{ __('words.AreYouSureToDelete') }}</p>
                                @csrf
                                <input type="hidden" name="id" id="id">
                            </div>



                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">{{ __('words.Close') }}</button>
                            <button type="submit" class="btn btn-danger">{{ __('words.Delete') }} </button>
                        </div>
                    </div>
                </form>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        {{-- delete --}}
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="table-responsive table-desi">
                                <table class="table all-package table-category " id="editableTable">
                                    <thead>
                                        <tr>
                                            <th>{{ __('words.Image') }}</th>
                                            <th>{{ __('words.Size') }}</th>
                                            <th>{{ __('words.Color') }}</th>
                                            <th>{{ __('words.Price') }}</th>
                                            <th>{{ __('words.Status') }}</th>
                                            <th>{{ __('words.Qunatity') }}</th>
                                            <th>{{ __('words.User') }}</th>
                                            <th>{{ __('words.Result') }}</th>
                                            <th>{{ __('words.Is_Approve') }}</th>
                                            <th>{{ __('words.Note') }}</th>
                                            <th>{{ __('words.Action') }}</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                    </tbody>
                                </table>
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

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
@endsection
@section('javascript')
    <script src="//cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(function() {
            var table = $('#editableTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ Route('orders.datatable') }}",
                columns: [{
                        data: 'image',
                        name: 'image'
                    },
                    {
                        data: 'size',
                        name: 'size'
                    },
                    {
                        data: 'color',
                        name: 'color'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'quantity',
                        name: 'quantity'
                    },
                    {
                        data: 'user',
                        name: 'user'
                    },
                    {
                        data: 'Result',
                        name: 'Result'
                    },
                    {
                        data: 'is_approve',
                        name: 'is_approve'
                    },
                    {
                        data: 'note',
                        name: 'note'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

        });

        $('#editableTable tbody').on('click', '#deleteBtn', function(argument) {
            var id = $(this).attr("data-id");
            console.log(id);
            $('#deletemodal #id').val(id);
        })
    </script>
@endsection
