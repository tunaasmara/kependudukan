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
      KTP Penduduk
      <small>Data KTP Penduduk</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> KTP Penduduk</a></li>
      <li class="active">Data KTP Penduduk</li>
    </ol>
  </section>

  <!-- Main content -->
<section class="content container-fluid">
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Permohonan Surat</h3>
          <button type="button" class="btn btn-primary pull-right" data-toggle="modal" onclick="roleLoads()" data-target="#modal-default">
            Tambah Data
          </button>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="data-tabel" class="table table-bordered table-hover">
            <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
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
<div class="modal fade" id="modal-default">
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
       {!! Form::open(['id'=>'frm','route' => 'users.store']) !!}
       {{Form::token()}}
                  <div class="form-group row required">
                      {!! Form::label("name","Nama",["class"=>"col-form-label col-md-2"]) !!}
                      <div class="col-md-10">
                          {!! Form::text("name",null,["class"=>"form-control inputan".($errors->has('name')?" is-invalid":""),'placeholder'=>'Name','id'=>'focus']) !!}
                          <span id="error-name" class="invalid-feedback inputan-error"></span>
                      </div>
                  </div>
                  <div class="form-group row required">
                      {!! Form::label("email","Email",["class"=>"col-form-label col-md-2"]) !!}
                      <div class="col-md-10">
                          {!! Form::text("email",null,["class"=>"inputan form-control".($errors->has('email')?" is-invalid":""),'placeholder'=>'Email']) !!}
                          <span id="error-email" class="invalid-feedback inputan-error"></span>
                      </div>
                  </div>
                  <div class="form-group row required">
                      {!! Form::label("role","User Role",["class"=>"col-form-label col-md-2"]) !!}
                      <div class="col-md-10">
                          <select class="inputan form-control{{($errors->has('role')?' is-invalid':'')}}" name="role" id="role">
                        </select>
                          <span id="error-role" class="invalid-feedback inputan-error"></span>
                      </div>
                  </div>
                  <div class="form-group row required">
                      {!! Form::label("password","Password",["class"=>"col-form-label col-md-2"]) !!}
                      <div class="col-md-10">
                          {!! Form::password("password",["class"=>"form-control inputan".($errors->has('password')?" is-invalid":""),'placeholder'=>'password']) !!}
                          <span id="error-password" class="invalid-feedback inputan-error"></span>
                      </div>
                  </div>
                  <div class="form-group row required">
                      {!! Form::label("inputanpassword_confirmation","Konfirmasi Password",["class"=>"col-form-label col-md-2"]) !!}
                      <div class="col-md-10">
                          {!! Form::password("password_confirmation",["class"=>"form-control inputan".($errors->has('password_confirmation')?" is-invalid":""),'placeholder'=>'password_confirmation']) !!}
                          <span id="error-password_confirmation" class="invalid-feedback inputan-error"></span>
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

<div class="modal fade" id="modal-edit">
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
      <form method="POST" id="frms">
      <input type="hidden" name="_method" value="PUT">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                  <div class="form-group row required">
                      <label for="name" class="col-form-label col-md-2">Nama</label>
                      <div class="col-md-10">
                          <input class="form-control" placeholder="Name" id="edit-name" name="name" type="text">
                          <span id="errors-name" class="invalid-feedback"></span>
                      </div>
                  </div>
                  <div class="form-group row required">
                      <label for="email" class="col-form-label col-md-2">Email</label>
                      <div class="col-md-10">
                          <input class="form-control" placeholder="Email" name="email" type="text" id="edit-email">
                          <span id="errors-email" class="invalid-feedback"></span>
                      </div>
                  </div>
                  <div class="form-group row required">
                      <label for="role" class="col-form-label col-md-2">User Role</label>
                      <div class="col-md-10">
                          <select class="form-control" name="role" id="edit-role">
                        </select>
                          <span id="errors-role" class="invalid-feedback"></span>
                      </div>
                  </div>
                  <input type="submit" value="Save" class="btn btn-primary pull-right" name="submit">
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-danger pull-left" data-dismiss="modal">Close</a>
      </div>
       </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" data-backdrop="static">
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
                    <input type="hidden" id="delete_token"/>
                    <input type="hidden" id="delete_id"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger"
                            onclick="ajaxDelete('{{url('admin/users/')}}/'+$('#delete_id').val(),$('#delete_token').val())">
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
<script src="{{ asset('assets/js/scripts.js')}}"></script>
<!-- page script -->

<script>
    var oTable = $('#data-tabel').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('fetch.user') !!}',
        columns: [
            { data: 'DT_Row_Index', name: 'DT_Row_Index',orderable: false, searchable: false },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'action', name: 'action',orderable: false, searchable: false }

        ]
    });
</script>

<script type="text/javascript">
  $(document).on('submit', 'form#frm', function (event) {
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
                $('#modal-default').modal('hide');
                oTable.draw();
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            alert("Error: " + errorThrown);
        }
    });
    return false;
});

function ajaxDelete(filename, token, content) {
    content = typeof content !== 'undefined' ? content : 'content';
    oTable.draw();
    $.ajax({
        type: 'POST',
        data: {_method: 'DELETE', _token: token},
        url: filename,
        success: function (data) {
            $('#modalDelete').modal('hide');
            $("#" + content).html(data);
            oTable.draw();
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}

$('#modalDelete').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    $('#delete_id').val(button.data('id'));
    $('#delete_token').val(button.data('token'));
});


$(document).on('click', '.user-edit', function(){
        var id = $(this).data('id');
        var roleId;

        $.ajax({
            url:"{{ url('admin/fetchDataUser/') }}/"+id,
            method:'get',
            dataType:'json',
            success:function(data)
            {
                $('#edit-name').val(data[0].name);
                $('#edit-email').val(data[0].email);
                $('#frms').attr('action', "{{ url('admin/users/') }}/"+id);
                $('#modal-edit').modal('show');
                roleEdit(data[0].roles[0].id);
            }
        });
    });

$(document).on('submit', 'form#frms', function (event) {
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
                $('#modal-edit').modal('hide');
                oTable.draw();
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
  function roleLoads()
  {
    $.get('{{ route('fetch.roles') }}',function(data) {
          $('#role').empty();
          $.each(data, function(index, role){
            $('#role').append('<option value="'+ role.id +'">'+ role.name +'</option>');
          })
        });
  }

  function roleEdit(id)
  {
    $.get('{{ route('fetch.roles') }}',function(data) {
                      $('#edit-role').empty();
                      $.each(data, function(index, role){
                        if(id == role.id)
                        $('#edit-role').append('<option value="'+ role.id +'" selected>'+ role.name +'</option>');
                        else
                        $('#edit-role').append('<option value="'+ role.id +'">'+ role.name +'</option>');
                      })
                    });
  }

$('#modal-default').on('hidden.bs.modal', function () {
    $(this).find(".inputan").val([]);
    $(this).find(".inputan-error").html('');
});


</script>
@endsection
