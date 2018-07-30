  var kecamatanTable = $('#data-kecamatan').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/admin/fetchKecamatan',
        columns: [
            { data: 'DT_Row_Index', name: 'DT_Row_Index',orderable: false, searchable: false },
            { data: 'nama_kecamatan', name: 'nama_kecamatan' },
            { data: 'kode_pos', name: 'kode_pos' },
            { data: 'kabupaten.nama_kabupaten', name: 'kabupaten.nama_kabupaten' },
            { data: 'kabupaten.provinsi.nama_provinsi', name: 'kabupaten.provinsi.nama_provinsi' },
            { data: 'action', name: 'action',orderable: false, searchable: false }

        ]
    });

    $("#data-kecamatan").css("width","100%");

    $( "#form-kecamatan-input" ).submit(function( event ) {
    event.preventDefault();
    $(this).find(".inputan-error-kecamatan").html('');
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
                    $('#error-kecamatan-' + control).html(data.errors[control]);
                }
            } else {
                $('#modal-kecamatan').modal('hide');
                kecamatanTable.draw();
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            alert("Error: " + errorThrown);
        }
    });
    return false;
});

  $('#modal-kecamatan').on('hidden.bs.modal', function () {
      $('select.inputan-kecamatan').empty();
      $(this).find(".inputan-kecamatan").val([]);
      $(this).find(".inputan-error-kecamatan").html('');
  });

  function ajaxKecamatanDelete(filename, token, content) {
    content = typeof content !== 'undefined' ? content : 'content';
    kecamatanTable.draw();
    $.ajax({
        type: 'POST',
        data: {_method: 'DELETE', _token: token},
        url: filename,
        success: function (data) {
            $('#modalDelete-kecamatan').modal('hide');
            $("#" + content).html(data);
            kecamatanTable.draw();
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}

  $('#modalDelete-kecamatan').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      $('#kecamatan_delete_id').val(button.data('id'));
      $('#kecamatan_delete_token').val(button.data('token'));
  });

  $(document).on('click', '.kecamatan-edit', function(){
        var id = $(this).data('id');
        $.ajax({
            url:"/admin/fetchDataKecamatan/"+id,
            method:'get',
            dataType:'json',
            success:function(data)
            {
                $('#edit-kecamatan-nama_kecamatan').val(data[0].nama_kecamatan);
                $('#edit-kecamatan-kode_pos').val(data[0].kode_pos);
                $('#form-edit-kecamatan').attr('action', "/admin/kecamatan/"+id);
                kecamatanProvinsiEdit(data[0].kabupaten.id,data[0].kabupaten.provinsi.id);
                $('#modal-edit-kecamatan').modal('show');
            }
        });
    });

  function kecamatanKabupatenEdit(id)
  {
    var provinsi = $('#edit-kecamatan-provinsi').val();
    if(!provinsi){
        $('#edit-kecamatan-kabupaten').empty();
    }else{
        $.get('/admin/kecamatan-fetchKabupaten/'+provinsi,function(data) {
          $('#edit-kecamatan-kabupaten').empty();
            $('#edit-kecamatan-kabupaten').append('<option value="">Pilih kabupaten</option>');
              $.each(data, function(index, kabupaten){
                if(id == kabupaten.id)
                    $('#edit-kecamatan-kabupaten').append('<option value="'+ kabupaten.id +'" selected>'+ kabupaten.nama_kabupaten +'</option>');
                else
                    $('#edit-kecamatan-kabupaten').append('<option value="'+ kabupaten.id +'">'+ kabupaten.nama_kabupaten +'</option>');                    
              });          
        });
    }
  }

  function kecamatanProvinsiEdit(kabupaten,provinsi)
  {
    $.get('/admin/kabupaten-fetchProvinsi',function(data) {
                      $('#edit-kecamatan-provinsi').empty();
                      $.each(data, function(index, prov){
                        if(provinsi == prov.id)
                        $('#edit-kecamatan-provinsi').append('<option value="'+ prov.id +'" selected>'+ prov.nama_provinsi +'</option>');
                        else
                        $('#edit-kecamatan-provinsi').append('<option value="'+ prov.id +'">'+ prov.nama_provinsi +'</option>');
                      });
                      kecamatanKabupatenEdit(kabupaten);
                    });
  }

  $(document).on('submit', 'form#form-edit-kecamatan', function (event) {
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
                    $('#edit-kecamatan-' + control).addClass('is-invalid');
                    $('#errors-edit-kecamatan-' + control).html(data.errors[control]);
                }
            } else {
                $('#modal-edit-kecamatan').modal('hide');
                kecamatanTable.draw();
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            alert("Error: " + errorThrown);
        }
    });
    return false;
});

function KecamatanProvinsiLoads()
  {
    $.get('/admin/kabupaten-fetchProvinsi',function(data) {
          $('#kecamatan-provinsi').empty();
          $('#kecamatan-provinsi').append('<option value="">Pilih provinsi</option>');
          $.each(data, function(index, provinsi){
            $('#kecamatan-provinsi').append('<option value="'+ provinsi.id +'">'+ provinsi.nama_provinsi +'</option>');
          })
        });
  }

function KecamatanKabupatenLoads()
  {
    var provinsi = $('#kecamatan-provinsi').val();
    if(!provinsi){
        $('#kecamatan-kabupaten').empty();
    }else{
        $.get('/admin/kecamatan-fetchKabupaten/'+provinsi,function(data) {
          $('#kecamatan-kabupaten').empty();
            $('#kecamatan-kabupaten').append('<option value="">Pilih kabupaten</option>');
              $.each(data, function(index, kabupaten){
                $('#kecamatan-kabupaten').append('<option value="'+ kabupaten.id +'">'+ kabupaten.nama_kabupaten +'</option>');
              });          
        });
    }
  }

  function KecamatanEditKabupatenLoads()
  {
    var provinsi = $('#edit-kecamatan-provinsi').val();
    if(!provinsi){
        $('#edit-kecamatan-kabupaten').empty();
    }else{
        $.get('/admin/kecamatan-fetchKabupaten/'+provinsi,function(data) {
          $('#edit-kecamatan-kabupaten').empty();
            $('#edit-kecamatan-kabupaten').append('<option value="">Pilih kabupaten</option>');
              $.each(data, function(index, kabupaten){
                $('#edit-kecamatan-kabupaten').append('<option value="'+ kabupaten.id +'">'+ kabupaten.nama_kabupaten +'</option>');
              });          
        });
    }
  }