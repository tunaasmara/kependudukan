@extends('layouts.admin')


@section('header')


<link rel="shortcut icon" href="{{asset('assets/ico/favicon.png')}}">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('assets/ico/apple-touch-icon-144-precomposed.png')}}">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('assets/ico/apple-touch-icon-114-precomposed.png')}}">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('assets/ico/apple-touch-icon-72-precomposed.png')}}">
<link rel="apple-touch-icon-precomposed" href="{{asset('assets/ico/apple-touch-icon-57-precomposed.png')}}">

<style>
          .example-modal .modal {
            position: relative;
            top: auto;
            bottom: auto;
            right: auto;
            left: auto;
            display: block;
            z-index: 1;
          }

          .example-modal .modal {
            background: transparent !important;
          }
</style>

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

  <link rel="stylesheet" href="{{ asset('/dist/css/skins/_all-skins.min.css') }}">

<!-- page script -->

@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      {{ $title or '' }}
      <small>{{ $title or '' }}</small>
    </h1>
  </section>

  <!-- Main content -->
<section class="content container-fluid">
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">{{ $title or '' }}</h3>
          <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-pekerjaan">
            Tambah Data
          </button>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="data-pekerjaan" class="table table-bordered table-hover">
            <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Action</th>
                </tr>
                </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
</section>
<div class="modal fade" id="modal-pekerjaan">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="col-md-10">
          <h2>Data Pekerjaan</h2>
        </div>
        <div class="col-md-2">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        </div>
      </div>
      <div class="modal-body">
       {!! Form::open(['id'=>'form-pekerjaan','route' => 'pekerjaan.store']) !!}
       {{Form::token()}}
                  <div class="form-group row required">
                      {!! Form::label("nama","Nama",["class"=>"col-form-label col-md-2"]) !!}
                      <div class="col-md-10">
                          {!! Form::text("nama",null,["class"=>"form-control inputan".($errors->has('nama')?" is-invalid":""),'placeholder'=>'nama','id'=>'focus']) !!}
                          <span id="error-nama" class="invalid-feedback inputan-error"></span>
                      </div>
                  </div>
      </div>
      <div class="modal-footer">
        {!! Form::submit("Save",["class"=>"btn btn-primary pull-right"])!!}
        <a href="#" class="btn btn-danger pull-left" data-dismiss="modal">Close</a>
      </div>
       {!! Form::close() !!}
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-pekerjaan-edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="col-md-10">
          <h2>Data User</h2>
        </div>
        <div class="col-md-2">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        </div>
      </div>
      <div class="modal-body">
      <form method="POST" id="pekerjaan-edit">
      <input type="hidden" name="_method" value="PUT">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                  <div class="form-group row required">
                      <label for="nama" class="col-form-label col-md-2">Nama</label>
                      <div class="col-md-10">
                          <input class="form-control" placeholder="Name" id="edit-nama" name="nama" type="text">
                          <span id="errors-nama" class="invalid-feedback"></span>
                      </div>
                  </div>
      </div>
      <div class="modal-footer">
        <input type="submit" value="Save" class="btn btn-primary pull-right" name="submit">
        <a href="#" class="btn btn-danger pull-left" data-dismiss="modal">Close</a>
      </div>
       </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="modalDelete-pekerjaan" tabindex="-1" role="dialog" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete?</p>
                    <input type="hidden" id="pekerjaan_delete_token"/>
                    <input type="hidden" id="pekerjaan_delete_id"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger"
                            onclick="ajaxPekerjaanDelete('{{url('admin/pekerjaan/')}}/'+$('#pekerjaan_delete_id').val(),$('#pekerjaan_delete_token').val())">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
<!-- /.content -->
</div>
@endsection

@section('footer')

<script src="{{ asset('assets/js/jquery.backstretch.min.js')}}"></script>
<script src="{{ asset('assets/js/retina-1.1.0.min.js')}}"></script>
<!-- page script -->

<script>
    var pekerjaanTable = $('#data-pekerjaan').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/admin/fetchPekerjaan',
        columns: [
            { data: 'DT_Row_Index', name: 'DT_Row_Index',orderable: false, searchable: false },
            { data: 'nama', name: 'nama' },
            { data: 'action', name: 'action',orderable: false, searchable: false }

        ]
    });
</script>

<script type="text/javascript">
  $(document).on('submit', 'form#form-pekerjaan', function (event) {
    event.preventDefault();
    var form = $(this);
    var data = new FormData($(this)[0]);
    var url = form.attr("action");
    $.ajax({
        type: form.attr('method'),
        url: url,
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            $('.is-invalid').removeClass('is-invalid');
            if (data.fail) {
                for (control in data.errors) {
                    $('input[name=' + control + ']').addClass('is-invalid');
                    $('#error-' + control).html(data.errors[control]);
                }
            } else {
                $('#modal-pekerjaan').modal('hide');
                pekerjaanTable.draw();
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            alert("Error: " + errorThrown);
        }
    });
    return false;
});

function ajaxPekerjaanDelete(filename, token, content) {
    content = typeof content !== 'undefined' ? content : 'content';
    pekerjaanTable.draw();
    $.ajax({
        type: 'POST',
        data: {_method: 'DELETE', _token: token},
        url: filename,
        success: function (data) {
            $('#modalDelete-pekerjaan').modal('hide');
            $("#" + content).html(data);
            pekerjaanTable.draw();
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}

$('#modalDelete-pekerjaan').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    $('#pekerjaan_delete_id').val(button.data('id'));
    $('#pekerjaan_delete_token').val(button.data('token'));
});


$(document).on('click', '.pekerjaan-edit', function(){
        var id = $(this).data('id');
        var roleId;

        $.ajax({
            url:"{{ url('admin/fetchDataPekerjaan/') }}/"+id,
            method:'get',
            dataType:'json',
            success:function(data)
            {
                $('#edit-nama').val(data.nama);
                $('#pekerjaan-edit').attr('action', "{{ url('admin/pekerjaan/') }}/"+id);
                $('#modal-pekerjaan-edit').modal('show');
            }
        });
    });


$('#modal-pekerjaan').on('hidden.bs.modal', function () {
    $(this).find(".inputan").val([]);
    $(this).find(".inputan-error").html('');
});

$(document).on('submit', 'form#pekerjaan-edit', function (event) {
    event.preventDefault();
    var form = $(this);
    var data = new FormData($(this)[0]);
    var url = form.attr("action");
    $.ajax({
        type: form.attr('method'),
        url: url,
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            $('.is-invalid').removeClass('is-invalid');
            if (data.fail) {
                for (control in data.errors) {
                    $('#edit-' + control).addClass('is-invalid');
                    $('#errors-' + control).html(data.errors[control]);
                }
            } else {
                $('#modal-pekerjaan-edit').modal('hide');
                pekerjaanTable.draw();
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            alert("Error: " + errorThrown);
        }
    });
    return false;
});



</script>

<script type="text/javascript">



</script>
@endsection
