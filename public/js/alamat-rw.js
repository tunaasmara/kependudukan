  var rwTable = $('#data-rw').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/admin/fetchRw',
        columns: [
            { data: 'DT_Row_Index', name: 'DT_Row_Index',orderable: false, searchable: false },
            { data: 'nama_rw', name: 'nama_rw' },
            { data: 'kepala_rw', name: 'kepala_rw' },
            { data: 'dusun.nama_dusun', name: 'dusun.nama_dusun' },
            { data: 'dusun.desa.nama', name: 'dusun.desa.nama' },
            { data: 'dusun.desa.kecamatan.nama', name: 'dusun.desa.kecamatan.nama' },
            { data: 'dusun.desa.kecamatan.kabupaten.nama', name: 'dusun.desa.kecamatan.kabupaten.nama' },
            { data: 'dusun.desa.kecamatan.kabupaten.provinsi.nama', name: 'dusun.desa.kecamatan.kabupaten.provinsi.nama' },
            { data: 'action', name: 'action',orderable: false, searchable: false }

        ]
    });

    $("#data-rw").css("width","100%");

    $( "#form-rw-input" ).submit(function( event ) {
    event.preventDefault();
    $(this).find(".inputan-error-rw").html('');
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
                    $('#error-rw-' + control).html(data.errors[control]);
                }
            } else {
                $('#modal-rw').modal('hide');
                rwTable.draw();
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            alert("Error: " + errorThrown);
        }
    });
    return false;
});

  $('#modal-rw').on('hidden.bs.modal', function () {
      $('select.inputan-rw').empty();
      $('select.inputan-rw').selectpicker('refresh');
      $(this).find(".inputan-rw").val([]);
      $(this).find(".inputan-error-rw").html('');
  });

  $('#modal-edit-rw').on('hidden.bs.modal', function () {
      $(this).find(".errors-edit-rw").html('');
  });

  function ajaxRwDelete(filename, token, content) {
    content = typeof content !== 'undefined' ? content : 'content';
    rwTable.draw();
    $.ajax({
        type: 'POST',
        data: {_method: 'DELETE', _token: token},
        url: filename,
        success: function (data) {
            $('#modalDelete-rw').modal('hide');
            $("#" + content).html(data);
            rwTable.draw();
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}

  $('#modalDelete-rw').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      $('#rw_delete_id').val(button.data('id'));
      $('#rw_delete_token').val(button.data('token'));
  });

  $(document).on('click', '.rw-edit', function(){
        var id = $(this).data('id');
        $.ajax({
            url:"/admin/fetchDataRw/"+id,
            method:'get',
            dataType:'json',
            success:function(data)
            {
                $('#edit-rw-nama_rw').val(data[0].nama_rw);
                $('#edit-rw-kepala_rw').val(data[0].kepala_rw);
                $('#form-edit-rw').attr('action', "/admin/rw/"+id);
                loadEditRw(data[0].dusun.desa.kecamatan.kabupaten.provinsi.id_prov,data[0].dusun.desa.kecamatan.kabupaten.id_kab,data[0].dusun.desa.kecamatan.id_kec,data[0].dusun.desa.id_kel,data[0].dusun.id);
                $('#modal-edit-rw').modal('show');
            }
        });
    });



  $(document).on('submit', 'form#form-edit-rw', function (event) {
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
                    $('#edit-rw-' + control).addClass('is-invalid');
                    $('#errors-edit-rw-' + control).html(data.errors[control]);
                }
            } else {
                $('#modal-edit-rw').modal('hide');
                rwTable.draw();
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            alert("Error: " + errorThrown);
        }
    });
    return false;
});

function RwProvinsiLoads()
  {
    $.get('/admin/fetchProvinsi',function(data) {
          $('#rw-provinsi').empty();
          $('#rw-provinsi').append('<option value="">Pilih Provinsi</option>');
          $.each(data, function(index, provinsi){
            $('#rw-provinsi').append('<option data-tokens="'+ provinsi.nama +'" value="'+ provinsi.id_prov +'">'+ provinsi.nama +'</option>');
          });
          $('#rw-provinsi').selectpicker('refresh');
        });
  }

// Load Data Edit Form
function loadEditRw(id_prov,id_kab,id_kec,id_kel,id_dusun)
  {
    $.get('/admin/fetchProvinsi',function(data) {
          $('#edit-rw-provinsi').empty();
          $('#edit-rw-provinsi').append('<option value="">Pilih Provinsi</option>');
          $.each(data, function(index, provinsi){
            if(id_prov == provinsi.id_prov)
              $('#edit-rw-provinsi').append('<option data-tokens="'+ provinsi.nama +'" value="'+ provinsi.id_prov +'" selected>'+ provinsi.nama +'</option>');
            else
              $('#edit-rw-provinsi').append('<option data-tokens="'+ provinsi.nama +'" value="'+ provinsi.id_prov +'">'+ provinsi.nama +'</option>');
          });
          $('#edit-rw-provinsi').selectpicker('refresh');
        });

    $.get('/admin/fetchKabupaten/'+id_prov,function(data) {
          $('#edit-rw-kabupaten').empty();
          $('#edit-rw-kabupaten').append('<option value="">Pilih Kabupaten</option>');
          $.each(data, function(index, kabupaten){
            if(id_kab == kabupaten.id_kab)
              $('#edit-rw-kabupaten').append('<option data-tokens="'+ kabupaten.nama +'" value="'+ kabupaten.id_kab +'" selected>'+ kabupaten.nama +'</option>');
            else
              $('#edit-rw-kabupaten').append('<option data-tokens="'+ kabupaten.nama +'" value="'+ kabupaten.id_kab +'">'+ kabupaten.nama +'</option>');
          });
          $('#edit-rw-kabupaten').selectpicker('refresh');
        });

    $.get('/admin/fetchKecamatan/'+id_kab,function(data) {
          $('#edit-rw-kecamatan').empty();
          $('#edit-rw-kecamatan').append('<option value="">Pilih Kecamatan</option>');
          $.each(data, function(index, kecamatan){
            if(id_kec == kecamatan.id_kec)
              $('#edit-rw-kecamatan').append('<option data-tokens="'+ kecamatan.nama +'" value="'+ kecamatan.id_kec +'" selected>'+ kecamatan.nama +'</option>');
            else
              $('#edit-rw-kecamatan').append('<option data-tokens="'+ kecamatan.nama +'" value="'+ kecamatan.id_kec +'">'+ kecamatan.nama +'</option>');
          });
          $('#edit-rw-kecamatan').selectpicker('refresh');
        });

    $.get('/admin/fetchDesa/'+id_kec,function(data) {
          $('#edit-rw-desa').empty();
          $('#edit-rw-desa').append('<option value="">Pilih desa</option>');
          $.each(data, function(index, desa){
            if(id_kel == desa.id_kel)
              $('#edit-rw-desa').append('<option data-tokens="'+ desa.nama +'" value="'+ desa.id_kel +'" selected>'+ desa.nama +'</option>');
            else
              $('#edit-rw-desa').append('<option data-tokens="'+ desa.nama +'" value="'+ desa.id_kel +'">'+ desa.nama +'</option>');
          });
          $('#edit-rw-desa').selectpicker('refresh');
        });

    $.get('/admin/formFetchDusun/'+id_kel,function(data) {
          $('#edit-rw-dusun').empty();
          $('#edit-rw-dusun').append('<option value="">Pilih dusun</option>');
          $.each(data, function(index, dusun){
            if(id_dusun == dusun.id)
              $('#edit-rw-dusun').append('<option data-tokens="'+ dusun.nama_dusun +'" value="'+ dusun.id +'" selected>'+ dusun.nama_dusun +'</option>');
            else
              $('#edit-rw-dusun').append('<option data-tokens="'+ dusun.nama_dusun +'" value="'+ dusun.id +'">'+ dusun.nama_dusun +'</option>');
          });
          $('#edit-rw-dusun').selectpicker('refresh');
        });
  }


  $(document).ready()
  {
    RwProvinsiLoads();
  }

$(function() {

  // fetch selectpicker kabupaten
  $("#rw-provinsi").on("changed.bs.select", 
        function(e, clickedIndex, newValue, oldValue) {
      var provinsi = this.value;
      if(!provinsi){
        $('#rw-kabupaten').empty();
        $('#rw-kecamatan').empty();
        $('#rw-desa').empty();
        $('#rw-kabupaten').selectpicker('refresh');
        $('#rw-kecamatan').selectpicker('refresh');
        $('#rw-desa').selectpicker('refresh');
        $('#rw-dusun').empty();
        $('#rw-dusun').selectpicker('refresh');
    }else{
        $.get('/admin/fetchKabupaten/'+provinsi,function(data) {
          $('#rw-kabupaten').empty();
          $('#rw-kecamatan').empty();
          $('#rw-desa').empty();
          $('#rw-kabupaten').selectpicker('refresh');
          $('#rw-kecamatan').selectpicker('refresh');
          $('#rw-desa').selectpicker('refresh');
          $('#rw-dusun').empty();
          $('#rw-dusun').selectpicker('refresh');
            $('#rw-kabupaten').append('<option value="">Pilih kabupaten</option>');
              $.each(data, function(index, kabupaten){
                $('#rw-kabupaten').append('<option data-tokens="'+ kabupaten.nama +'" value="'+ kabupaten.id_kab +'">'+ kabupaten.nama +'</option>');
              });  
            $('#rw-kabupaten').selectpicker('refresh');        
        });
    }
  });


  // fetch selectpicker kecamatan
  $("#rw-kabupaten").on("changed.bs.select", 
        function(e, clickedIndex, newValue, oldValue) {
      var kabupaten = this.value;
      if(!kabupaten){
        $('#rw-kecamatan').empty();
        $('#rw-desa').empty();
        $('#rw-kecamatan').selectpicker('refresh');
        $('#rw-desa').selectpicker('refresh');
        $('#rw-dusun').empty();
        $('#rw-dusun').selectpicker('refresh');
    }else{
        $.get('/admin/fetchKecamatan/'+kabupaten,function(data) {
          $('#rw-kecamatan').empty();
          $('#rw-desa').empty();
          $('#rw-kecamatan').selectpicker('refresh');
          $('#rw-desa').selectpicker('refresh');
          $('#rw-dusun').empty();
          $('#rw-dusun').selectpicker('refresh');
            $('#rw-kecamatan').append('<option value="">Pilih Kecamatan</option>');
              $.each(data, function(index, kecamatan){
                $('#rw-kecamatan').append('<option data-tokens="'+ kecamatan.nama +'" value="'+ kecamatan.id_kec +'">'+ kecamatan.nama +'</option>');
              });  
            $('#rw-kecamatan').selectpicker('refresh');        
        });
    }
  });


  // fetch selectpicker Desa
  $("#rw-kecamatan").on("changed.bs.select", 
        function(e, clickedIndex, newValue, oldValue) {
      var kecamatan = this.value;
      if(!kecamatan){
        $('#rw-desa').empty();
        $('#rw-desa').selectpicker('refresh');
        $('#rw-dusun').empty();
        $('#rw-dusun').selectpicker('refresh');
    }else{
        $.get('/admin/fetchDesa/'+kecamatan,function(data) {
          $('#rw-desa').empty();
          $('#rw-desa').selectpicker('refresh');
          $('#rw-dusun').empty();
          $('#rw-dusun').selectpicker('refresh');
            $('#rw-desa').append('<option value="">Pilih Desa</option>');
              $.each(data, function(index, desa){
                $('#rw-desa').append('<option data-tokens="'+ desa.nama +'" value="'+ desa.id_kel +'">'+ desa.nama +'</option>');
              });  
            $('#rw-desa').selectpicker('refresh');        
        });
    }
  });

  // fetch selectpicker Dusun
  $("#rw-desa").on("changed.bs.select", 
        function(e, clickedIndex, newValue, oldValue) {
      var desa = this.value;
      if(!desa){
        $('#rw-dusun').empty();
        $('#rw-dusun').selectpicker('refresh');
    }else{
        $.get('/admin/formFetchDusun/'+desa,function(data) {
          $('#rw-dusun').empty();
          $('#rw-dusun').selectpicker('refresh');
            $('#rw-dusun').append('<option value="">Pilih dusun</option>');
              $.each(data, function(index, dusun){
                $('#rw-dusun').append('<option data-tokens="'+ dusun.nama_dusun +'" value="'+ dusun.id +'">'+ dusun.nama_dusun +'</option>');
              });  
            $('#rw-dusun').selectpicker('refresh');        
        });
    }
  });

});



$(function() {

  // fetch selectpicker kabupaten
  $("#edit-rw-provinsi").on("changed.bs.select", 
        function(e, clickedIndex, newValue, oldValue) {
      var provinsi = this.value;
      if(!provinsi){
        $('#edit-rw-kabupaten').empty();
        $('#edit-rw-kecamatan').empty();
        $('#edit-rw-desa').empty();
        $('#edit-rw-kabupaten').selectpicker('refresh');
        $('#edit-rw-kecamatan').selectpicker('refresh');
        $('#edit-rw-desa').selectpicker('refresh');
        $('#edit-rw-dusun').empty();
        $('#edit-rw-dusun').selectpicker('refresh');
    }else{
        $.get('/admin/fetchKabupaten/'+provinsi,function(data) {
          $('#edit-rw-kabupaten').empty();
          $('#edit-rw-kecamatan').empty();
          $('#edit-rw-desa').empty();
          $('#edit-rw-kabupaten').selectpicker('refresh');
          $('#edit-rw-kecamatan').selectpicker('refresh');
          $('#edit-rw-desa').selectpicker('refresh');
          $('#edit-rw-dusun').empty();
          $('#edit-rw-dusun').selectpicker('refresh');
            $('#edit-rw-kabupaten').append('<option value="">Pilih kabupaten</option>');
              $.each(data, function(index, kabupaten){
                $('#edit-rw-kabupaten').append('<option data-tokens="'+ kabupaten.nama +'" value="'+ kabupaten.id_kab +'">'+ kabupaten.nama +'</option>');
              });  
            $('#edit-rw-kabupaten').selectpicker('refresh');        
        });
    }
  });


  // fetch selectpicker kecamatan
  $("#edit-rw-kabupaten").on("changed.bs.select", 
        function(e, clickedIndex, newValue, oldValue) {
      var kabupaten = this.value;
      if(!kabupaten){
        $('#edit-rw-kecamatan').empty();
        $('#edit-rw-desa').empty();
        $('#edit-rw-kecamatan').selectpicker('refresh');
        $('#edit-rw-desa').selectpicker('refresh');
        $('#edit-rw-dusun').empty();
        $('#edit-rw-dusun').selectpicker('refresh');
    }else{
        $.get('/admin/fetchKecamatan/'+kabupaten,function(data) {
          $('#edit-rw-kecamatan').empty();
          $('#edit-rw-desa').empty();
          $('#edit-rw-kecamatan').selectpicker('refresh');
          $('#edit-rw-desa').selectpicker('refresh');
          $('#edit-rw-dusun').empty();
          $('#edit-rw-dusun').selectpicker('refresh');
            $('#edit-rw-kecamatan').append('<option value="">Pilih Kecamatan</option>');
              $.each(data, function(index, kecamatan){
                $('#edit-rw-kecamatan').append('<option data-tokens="'+ kecamatan.nama +'" value="'+ kecamatan.id_kec +'">'+ kecamatan.nama +'</option>');
              });  
            $('#edit-rw-kecamatan').selectpicker('refresh');        
        });
    }
  });


  // fetch selectpicker Desa
  $("#edit-rw-kecamatan").on("changed.bs.select", 
        function(e, clickedIndex, newValue, oldValue) {
      var kecamatan = this.value;
      if(!kecamatan){
        $('#edit-rw-desa').empty();
        $('#edit-rw-desa').selectpicker('refresh');
        $('#edit-rw-dusun').empty();
        $('#edit-rw-dusun').selectpicker('refresh');
    }else{
        $.get('/admin/fetchDesa/'+kecamatan,function(data) {
          $('#edit-rw-desa').empty();
          $('#edit-rw-desa').selectpicker('refresh');
          $('#edit-rw-dusun').empty();
          $('#edit-rw-dusun').selectpicker('refresh');
            $('#edit-rw-desa').append('<option value="">Pilih Desa</option>');
              $.each(data, function(index, desa){
                $('#edit-rw-desa').append('<option data-tokens="'+ desa.nama +'" value="'+ desa.id_kel +'">'+ desa.nama +'</option>');
              });  
            $('#edit-rw-desa').selectpicker('refresh');        
        });
    }
  });

  // fetch selectpicker Dusun
  $("#edit-rw-desa").on("changed.bs.select", 
        function(e, clickedIndex, newValue, oldValue) {
      var desa = this.value;
      if(!desa){
        $('#edit-rw-dusun').empty();
        $('#edit-rw-dusun').selectpicker('refresh');
    }else{
        $.get('/admin/formFetchDusun/'+desa,function(data) {
          $('#edit-rw-dusun').empty();
          $('#edit-rw-dusun').selectpicker('refresh');
            $('#edit-rw-dusun').append('<option value="">Pilih dusun</option>');
              $.each(data, function(index, dusun){
                $('#edit-rw-dusun').append('<option data-tokens="'+ dusun.nama_dusun +'" value="'+ dusun.id +'">'+ dusun.nama_dusun +'</option>');
              });  
            $('#edit-rw-dusun').selectpicker('refresh');        
        });
    }
  });

});
