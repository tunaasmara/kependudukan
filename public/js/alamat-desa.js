  var desaTable = $('#data-desa').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/admin/fetchDesa',
        columns: [
            { data: 'DT_Row_Index', name: 'DT_Row_Index',orderable: false, searchable: false },
            { data: 'nama_desa', name: 'nama_desa' },
            { data: 'kepala_desa', name: 'kepala_desa' },
            { data: 'kecamatan.nama_kecamatan', name: 'kecamatan.nama_kecamatan' },
            { data: 'kecamatan.kabupaten.nama_kabupaten', name: 'kecamatan.kabupaten.nama_kabupaten' },
            { data: 'kecamatan.kabupaten.provinsi.nama_provinsi', name: 'kecamatan.kabupaten.provinsi.nama_provinsi' },
            { data: 'action', name: 'action',orderable: false, searchable: false }

        ]
    });

    $("#data-desa").css("width","100%");

    $( "#form-desa-input" ).submit(function( event ) {
    event.preventDefault();
    $(this).find(".inputan-error-desa").html('');
    var form = $(this);
    var data = new FormData($(this)[0]);
    var url = form.attr("action");
    $.ajax({
        type: form.attr('method'),
        url: url,
        data: data,
        cache: false,
        dataType: 'JSON',
        contentType: false,
        processData: false,
        success: function (data) {
            $('.is-invalid').removeClass('is-invalid');
            if (data.fail) {
                for (control in data.errors) {
                    $('input[name=' + control + ']').addClass('is-invalid');
                    $('#error-desa-' + control).html(data.errors[control]);
                }
            } else {
                $('#modal-desa').modal('hide');
                desaTable.draw();
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            alert("Error: " + errorThrown);
        }
    });
    return false;
});

  $('#modal-desa').on('hidden.bs.modal', function () {
      $('select.inputan-desa').empty();
      $(this).find(".inputan-desa").val([]);
      $(this).find(".inputan-error-desa").html('');
  });

  function ajaxDesaDelete(filename, token, content) {
    content = typeof content !== 'undefined' ? content : 'content';
    desaTable.draw();
    $.ajax({
        type: 'POST',
        data: {_method: 'DELETE', _token: token},
        url: filename,
        success: function (data) {
            $('#modalDelete-desa').modal('hide');
            $("#" + content).html(data);
            desaTable.draw();
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}

  $('#modalDelete-desa').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      $('#desa_delete_id').val(button.data('id'));
      $('#desa_delete_token').val(button.data('token'));
  });

  $(document).on('click', '.desa-edit', function(){
        var id = $(this).data('id');
        $.ajax({
            url:"/admin/fetchDataDesa/"+id,
            method:'get',
            dataType:'json',
            success:function(data)
            {
                $('#edit-desa-nama_desa').val(data[0].nama_desa);
                $('#edit-desa-kepala_desa').val(data[0].kepala_desa);
                $('#form-edit-desa').attr('action', "/admin/desa/"+id);
                desaProvinsiEdit(data[0].kecamatan.id,data[0].kecamatan.kabupaten.id,data[0].kecamatan.kabupaten.provinsi.id);
                $('#modal-edit-desa').modal('show');
            }
        });
    });

  function desaKecamatanEdit(id,kabupaten)
  {
    if(!kabupaten){
        $('#edit-desa-kecamatan').empty();
    }else{
        $.get('/admin/fetchDesaKecamatan/'+kabupaten,function(data) {
          $('#edit-desa-kecamatan').empty();
            $('#edit-desa-kecamatan').append('<option value="">Pilih Kecamatan</option>');
              $.each(data, function(index, kecamatan){
                if(id == kecamatan.id)
                    $('#edit-desa-kecamatan').append('<option value="'+ kecamatan.id +'" selected>'+ kecamatan.nama_kecamatan +'</option>');
                else
                    $('#edit-desa-kecamatan').append('<option value="'+ kecamatan.id +'">'+ kecamatan.nama_kecamatan +'</option>');                    
              });          
        });
    }
  }

  function desaKabupatenEdit(kecamatan,id)
  {
    var provinsi = $('#edit-desa-provinsi').val();
    if(!provinsi){
        $('#edit-desa-kabupaten').empty();
        $('#edit-desa-kecamatan').empty();
    }else{
        $.get('/admin/kecamatan-fetchKabupaten/'+provinsi,function(data) {
          $('#edit-desa-kabupaten').empty();
          $('#edit-desa-kecamatan').empty();
            $('#edit-desa-kabupaten').append('<option value="">Pilih kabupaten</option>');
              $.each(data, function(index, kabupaten){
                if(id == kabupaten.id)
                    $('#edit-desa-kabupaten').append('<option value="'+ kabupaten.id +'" selected>'+ kabupaten.nama_kabupaten +'</option>');
                else
                    $('#edit-desa-kabupaten').append('<option value="'+ kabupaten.id +'">'+ kabupaten.nama_kabupaten +'</option>');                    
              });          
        });
        console.log(kecamatan);
        console.log(id);
        desaKecamatanEdit(kecamatan);
    }
  }

  function desaProvinsiEdit(kecamatan,kabupaten,provinsi)
  {
    $.get('/admin/kabupaten-fetchProvinsi',function(data) {
                      $('#edit-desa-provinsi').empty();
                      $.each(data, function(index, prov){
                        if(provinsi == prov.id)
                        $('#edit-desa-provinsi').append('<option value="'+ prov.id +'" selected>'+ prov.nama_provinsi +'</option>');
                        else
                        $('#edit-desa-provinsi').append('<option value="'+ prov.id +'">'+ prov.nama_provinsi +'</option>');
                      });
                      desaKabupatenEdit(kecamatan,kabupaten);
                      desaKecamatanEdit(kecamatan,kabupaten);
                    });
  }

  $(document).on('submit', 'form#form-edit-desa', function (event) {
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
                    $('#edit-desa-' + control).addClass('is-invalid');
                    $('#errors-edit-desa-' + control).html(data.errors[control]);
                }
            } else {
                $('#modal-edit-desa').modal('hide');
                desaTable.draw();
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            alert("Error: " + errorThrown);
        }
    });
    return false;
});

function DesaProvinsiLoads()
  {
    $.get('/admin/kabupaten-fetchProvinsi',function(data) {
          $('#desa-provinsi').empty();
          $('#desa-provinsi').append('<option value="">Pilih provinsi</option>');
          $.each(data, function(index, provinsi){
            $('#desa-provinsi').append('<option value="'+ provinsi.id +'">'+ provinsi.nama_provinsi +'</option>');
          })
        });
  }

function DesaKabupatenLoads()
  {
    var provinsi = $('#desa-provinsi').val();
    if(!provinsi){
        $('#desa-kabupaten').empty();
        $('#desa-kecamatan').empty();
    }else{
        $.get('/admin/kecamatan-fetchKabupaten/'+provinsi,function(data) {
          $('#desa-kabupaten').empty();
          $('#desa-kecamatan').empty();
            $('#desa-kabupaten').append('<option value="">Pilih kabupaten</option>');
              $.each(data, function(index, kabupaten){
                $('#desa-kabupaten').append('<option value="'+ kabupaten.id +'">'+ kabupaten.nama_kabupaten +'</option>');
              });          
        });
    }
  }

  function DesaKecamatanLoads()
  {
    var kabupaten = $('#desa-kabupaten').val();
    if(!kabupaten){
        $('#desa-kecamatan').empty();
    }else{
        $.get('/admin/fetchDesaKecamatan/'+kabupaten,function(data) {
          $('#desa-kecamatan').empty();
            $('#desa-kecamatan').append('<option value="">Pilih Kecamatan</option>');
              $.each(data, function(index, kecamatan){
                $('#desa-kecamatan').append('<option value="'+ kecamatan.id +'">'+ kecamatan.nama_kecamatan +'</option>');
              });          
        });
    }
  }

  function desaEditKabupatenLoads()
  {
    var provinsi = $('#edit-desa-provinsi').val();
    if(!provinsi){
        $('#edit-desa-kabupaten').empty();
        $('#edit-desa-kecamatan').empty();
    }else{
        $.get('/admin/kecamatan-fetchKabupaten/'+provinsi,function(data) {
          $('#edit-desa-kabupaten').empty();
          $('#edit-desa-kecamatan').empty();
            $('#edit-desa-kabupaten').append('<option value="">Pilih kabupaten</option>');
              $.each(data, function(index, kabupaten){
                $('#edit-desa-kabupaten').append('<option value="'+ kabupaten.id +'">'+ kabupaten.nama_kabupaten +'</option>');
              });          
        });
    }
  }

    function desaEditKecamatanLoads()
  {
    var kabupaten = $('#edit-desa-kabupaten').val();
    if(!kabupaten){
        $('#edit-desa-kecamatan').empty();
    }else{
        $.get('/admin/fetchDesaKecamatan/'+kabupaten,function(data) {
          $('#edit-desa-kecamatan').empty();
            $('#edit-desa-kecamatan').append('<option value="">Pilih Kecamatan</option>');
              $.each(data, function(index, kecamatan){
                $('#edit-desa-kecamatan').append('<option value="'+ kecamatan.id +'">'+ kecamatan.nama_kecamatan +'</option>');
              });          
        });
    }
  }