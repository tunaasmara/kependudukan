  var dusunTable = $('#data-dusun').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/admin/fetchDusun',
        columns: [
            { data: 'DT_Row_Index', name: 'DT_Row_Index',orderable: false, searchable: false },
            { data: 'nama_dusun', name: 'nama_dusun' },
            { data: 'kepala_dusun', name: 'kepala_dusun' },
            { data: 'desa.nama', name: 'desa.nama' },
            { data: 'desa.kecamatan.nama', name: 'desa.kecamatan.nama' },
            { data: 'desa.kecamatan.kabupaten.nama', name: 'desa.kecamatan.kabupaten.nama' },
            { data: 'desa.kecamatan.kabupaten.provinsi.nama', name: 'desa.kecamatan.kabupaten.provinsi.nama' },
            { data: 'action', name: 'action',orderable: false, searchable: false }

        ]
    });

    $("#data-dusun").css("width","100%");

    $( "#form-dusun-input" ).submit(function( event ) {
    event.preventDefault();
    $(this).find(".inputan-error-dusun").html('');
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
                    $('#error-dusun-' + control).html(data.errors[control]);
                }
            } else {
                $('#modal-dusun').modal('hide');
                dusunTable.draw();
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            alert("Error: " + errorThrown);
        }
    });
    return false;
});

  $('#modal-dusun').on('hidden.bs.modal', function () {
      $('select.inputan-dusun').empty();
      $('select.inputan-dusun').selectpicker('refresh');
      $(this).find(".inputan-dusun").val([]);
      $(this).find(".inputan-error-dusun").html('');
  });

  $('#modal-edit-dusun').on('hidden.bs.modal', function () {
      $(this).find(".errors-edit-dusun").html('');
  });

  function ajaxDusunDelete(filename, token, content) {
    content = typeof content !== 'undefined' ? content : 'content';
    dusunTable.draw();
    $.ajax({
        type: 'POST',
        data: {_method: 'DELETE', _token: token},
        url: filename,
        success: function (data) {
            $('#modalDelete-dusun').modal('hide');
            $("#" + content).html(data);
            dusunTable.draw();
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}

  $('#modalDelete-dusun').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      $('#dusun_delete_id').val(button.data('id'));
      $('#dusun_delete_token').val(button.data('token'));
  });

  $(document).on('click', '.dusun-edit', function(){
        var id = $(this).data('id');
        $.ajax({
            url:"/admin/fetchDataDusun/"+id,
            method:'get',
            dataType:'json',
            success:function(data)
            {
                $('#edit-dusun-nama_dusun').val(data[0].nama_dusun);
                $('#edit-dusun-kepala_dusun').val(data[0].kepala_dusun);
                $('#form-edit-dusun').attr('action', "/admin/dusun/"+id);
                loadEditDusun(data[0].desa.kecamatan.kabupaten.provinsi.id_prov,data[0].desa.kecamatan.kabupaten.id_kab,data[0].desa.kecamatan.id_kec,data[0].desa.id_kel);
                // desaProvinsiEdit(data[0].kecamatan.id,data[0].kecamatan.kabupaten.id,data[0].kecamatan.kabupaten.provinsi.id);
                $('#modal-edit-dusun').modal('show');
            }
        });
    });



  $(document).on('submit', 'form#form-edit-dusun', function (event) {
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
                    $('#edit-dusun-' + control).addClass('is-invalid');
                    $('#errors-edit-dusun-' + control).html(data.errors[control]);
                }
            } else {
                $('#modal-edit-dusun').modal('hide');
                dusunTable.draw();
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            alert("Error: " + errorThrown);
        }
    });
    return false;
});

function DusunProvinsiLoads()
  {
    $.get('/admin/fetchProvinsi',function(data) {
          $('#dusun-provinsi').empty();
          $('#dusun-provinsi').append('<option value="">Pilih Provinsi</option>');
          $.each(data, function(index, provinsi){
            $('#dusun-provinsi').append('<option data-tokens="'+ provinsi.nama +'" value="'+ provinsi.id_prov +'">'+ provinsi.nama +'</option>');
          });
          $('#dusun-provinsi').selectpicker('refresh');
        });
  }

// Load Data Edit Form
function loadEditDusun(id_prov,id_kab,id_kec,id_kel)
  {
    $.get('/admin/fetchProvinsi',function(data) {
          $('#edit-dusun-provinsi').empty();
          $('#edit-dusun-provinsi').append('<option value="">Pilih Provinsi</option>');
          $.each(data, function(index, provinsi){
            if(id_prov == provinsi.id_prov)
              $('#edit-dusun-provinsi').append('<option data-tokens="'+ provinsi.nama +'" value="'+ provinsi.id_prov +'" selected>'+ provinsi.nama +'</option>');
            else
              $('#edit-dusun-provinsi').append('<option data-tokens="'+ provinsi.nama +'" value="'+ provinsi.id_prov +'">'+ provinsi.nama +'</option>');
          });
          $('#edit-dusun-provinsi').selectpicker('refresh');
        });

    $.get('/admin/fetchKabupaten/'+id_prov,function(data) {
          $('#edit-dusun-kabupaten').empty();
          $('#edit-dusun-kabupaten').append('<option value="">Pilih Kabupaten</option>');
          $.each(data, function(index, kabupaten){
            if(id_kab == kabupaten.id_kab)
              $('#edit-dusun-kabupaten').append('<option data-tokens="'+ kabupaten.nama +'" value="'+ kabupaten.id_kab +'" selected>'+ kabupaten.nama +'</option>');
            else
              $('#edit-dusun-kabupaten').append('<option data-tokens="'+ kabupaten.nama +'" value="'+ kabupaten.id_kab +'">'+ kabupaten.nama +'</option>');
          });
          $('#edit-dusun-kabupaten').selectpicker('refresh');
        });

    $.get('/admin/fetchKecamatan/'+id_kab,function(data) {
          $('#edit-dusun-kecamatan').empty();
          $('#edit-dusun-kecamatan').append('<option value="">Pilih Kecamatan</option>');
          $.each(data, function(index, kecamatan){
            if(id_kec == kecamatan.id_kec)
              $('#edit-dusun-kecamatan').append('<option data-tokens="'+ kecamatan.nama +'" value="'+ kecamatan.id_kec +'" selected>'+ kecamatan.nama +'</option>');
            else
              $('#edit-dusun-kecamatan').append('<option data-tokens="'+ kecamatan.nama +'" value="'+ kecamatan.id_kec +'">'+ kecamatan.nama +'</option>');
          });
          $('#edit-dusun-kecamatan').selectpicker('refresh');
        });

    $.get('/admin/fetchDesa/'+id_kec,function(data) {
          $('#edit-dusun-desa').empty();
          $('#edit-dusun-desa').append('<option value="">Pilih desa</option>');
          $.each(data, function(index, desa){
            if(id_kel == desa.id_kel)
              $('#edit-dusun-desa').append('<option data-tokens="'+ desa.nama +'" value="'+ desa.id_kel +'" selected>'+ desa.nama +'</option>');
            else
              $('#edit-dusun-desa').append('<option data-tokens="'+ desa.nama +'" value="'+ desa.id_kel +'">'+ desa.nama +'</option>');
          });
          $('#edit-dusun-desa').selectpicker('refresh');
        });
  }


  $(document).ready()
  {
    DusunProvinsiLoads();
  }

$(function() {

  // fetch selectpicker kabupaten
  $("#dusun-provinsi").on("changed.bs.select", 
        function(e, clickedIndex, newValue, oldValue) {
      var provinsi = this.value;
      if(!provinsi){
        $('#dusun-kabupaten').empty();
        $('#dusun-kecamatan').empty();
        $('#dusun-desa').empty();
        $('#dusun-kabupaten').selectpicker('refresh');
        $('#dusun-kecamatan').selectpicker('refresh');
        $('#dusun-desa').selectpicker('refresh');
    }else{
        $.get('/admin/fetchKabupaten/'+provinsi,function(data) {
          $('#dusun-kabupaten').empty();
          $('#dusun-kecamatan').empty();
          $('#dusun-desa').empty();
          $('#dusun-kabupaten').selectpicker('refresh');
          $('#dusun-kecamatan').selectpicker('refresh');
          $('#dusun-desa').selectpicker('refresh');
            $('#dusun-kabupaten').append('<option value="">Pilih kabupaten</option>');
              $.each(data, function(index, kabupaten){
                $('#dusun-kabupaten').append('<option data-tokens="'+ kabupaten.nama +'" value="'+ kabupaten.id_kab +'">'+ kabupaten.nama +'</option>');
              });  
            $('#dusun-kabupaten').selectpicker('refresh');        
        });
    }
  });


  // fetch selectpicker kecamatan
  $("#dusun-kabupaten").on("changed.bs.select", 
        function(e, clickedIndex, newValue, oldValue) {
      var kabupaten = this.value;
      if(!kabupaten){
        $('#dusun-kecamatan').empty();
        $('#dusun-desa').empty();
        $('#dusun-kecamatan').selectpicker('refresh');
        $('#dusun-desa').selectpicker('refresh');
    }else{
        $.get('/admin/fetchKecamatan/'+kabupaten,function(data) {
          $('#dusun-kecamatan').empty();
          $('#dusun-desa').empty();
          $('#dusun-kecamatan').selectpicker('refresh');
          $('#dusun-desa').selectpicker('refresh');
            $('#dusun-kecamatan').append('<option value="">Pilih Kecamatan</option>');
              $.each(data, function(index, kecamatan){
                $('#dusun-kecamatan').append('<option data-tokens="'+ kecamatan.nama +'" value="'+ kecamatan.id_kec +'">'+ kecamatan.nama +'</option>');
              });  
            $('#dusun-kecamatan').selectpicker('refresh');        
        });
    }
  });


  // fetch selectpicker Desa
  $("#dusun-kecamatan").on("changed.bs.select", 
        function(e, clickedIndex, newValue, oldValue) {
      var kecamatan = this.value;
      if(!kecamatan){
        $('#dusun-desa').empty();
        $('#dusun-desa').selectpicker('refresh');
    }else{
        $.get('/admin/fetchDesa/'+kecamatan,function(data) {
          $('#dusun-desa').empty();
          $('#dusun-desa').selectpicker('refresh');
            $('#dusun-desa').append('<option value="">Pilih Desa</option>');
              $.each(data, function(index, desa){
                $('#dusun-desa').append('<option data-tokens="'+ desa.nama +'" value="'+ desa.id_kel +'">'+ desa.nama +'</option>');
              });  
            $('#dusun-desa').selectpicker('refresh');        
        });
    }
  });

});


$(function() {

  // fetch selectpicker kabupaten
  $("#edit-dusun-provinsi").on("changed.bs.select", 
        function(e, clickedIndex, newValue, oldValue) {
      var provinsi = this.value;
      if(!provinsi){
        $('#edit-dusun-kabupaten').empty();
        $('#edit-dusun-kecamatan').empty();
        $('#edit-dusun-desa').empty();
        $('#edit-dusun-kabupaten').selectpicker('refresh');
        $('#edit-dusun-kecamatan').selectpicker('refresh');
        $('#edit-dusun-desa').selectpicker('refresh');
    }else{
        $.get('/admin/fetchKabupaten/'+provinsi,function(data) {
          $('#edit-dusun-kabupaten').empty();
          $('#edit-dusun-kecamatan').empty();
          $('#edit-dusun-desa').empty();
          $('#edit-dusun-kabupaten').selectpicker('refresh');
          $('#edit-dusun-kecamatan').selectpicker('refresh');
          $('#edit-dusun-desa').selectpicker('refresh');
            $('#edit-dusun-kabupaten').append('<option value="">Pilih kabupaten</option>');
              $.each(data, function(index, kabupaten){
                $('#edit-dusun-kabupaten').append('<option data-tokens="'+ kabupaten.nama +'" value="'+ kabupaten.id_kab +'">'+ kabupaten.nama +'</option>');
              });  
            $('#edit-dusun-kabupaten').selectpicker('refresh');        
        });
    }
  });


  // fetch selectpicker kecamatan
  $("#edit-dusun-kabupaten").on("changed.bs.select", 
        function(e, clickedIndex, newValue, oldValue) {
      var kabupaten = this.value;
      if(!kabupaten){
        $('#edit-dusun-kecamatan').empty();
        $('#edit-dusun-desa').empty();
        $('#edit-dusun-kecamatan').selectpicker('refresh');
        $('#edit-dusun-desa').selectpicker('refresh');
    }else{
        $.get('/admin/fetchKecamatan/'+kabupaten,function(data) {
          $('#edit-dusun-kecamatan').empty();
          $('#edit-dusun-desa').empty();
          $('#edit-dusun-kecamatan').selectpicker('refresh');
          $('#edit-dusun-desa').selectpicker('refresh');
            $('#edit-dusun-kecamatan').append('<option value="">Pilih Kecamatan</option>');
              $.each(data, function(index, kecamatan){
                $('#edit-dusun-kecamatan').append('<option data-tokens="'+ kecamatan.nama +'" value="'+ kecamatan.id_kec +'">'+ kecamatan.nama +'</option>');
              });  
            $('#edit-dusun-kecamatan').selectpicker('refresh');        
        });
    }
  });


  // fetch selectpicker Desa
  $("#edit-dusun-kecamatan").on("changed.bs.select", 
        function(e, clickedIndex, newValue, oldValue) {
      var kecamatan = this.value;
      if(!kecamatan){
        $('#edit-dusun-desa').empty();
        $('#edit-dusun-desa').selectpicker('refresh');
    }else{
        $.get('/admin/fetchDesa/'+kecamatan,function(data) {
          $('#edit-dusun-desa').empty();
          $('#edit-dusun-desa').selectpicker('refresh');
            $('#edit-dusun-desa').append('<option value="">Pilih Desa</option>');
              $.each(data, function(index, desa){
                $('#edit-dusun-desa').append('<option data-tokens="'+ desa.nama +'" value="'+ desa.id_kel +'">'+ desa.nama +'</option>');
              });  
            $('#edit-dusun-desa').selectpicker('refresh');        
        });
    }
  });

});
