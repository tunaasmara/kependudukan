  var rtTable = $('#data-rt').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/admin/fetchRt',
        columns: [
            { data: 'DT_Row_Index', name: 'DT_Row_Index',orderable: false, searchable: false },
            { data: 'nama_rt', name: 'nama_rt' },
            { data: 'kepala_rt', name: 'kepala_rt' },
            { data: 'rw.nama_rw', name: 'rw.nama_rw' },
            { data: 'rw.dusun.nama_dusun', name: 'rw.dusun.nama_dusun' },
            { data: 'rw.dusun.desa.nama', name: 'rw.dusun.desa.nama' },
            { data: 'rw.dusun.desa.kecamatan.nama', name: 'rw.dusun.desa.kecamatan.nama' },
            { data: 'rw.dusun.desa.kecamatan.kabupaten.nama', name: 'rw.dusun.desa.kecamatan.kabupaten.nama' },
            { data: 'rw.dusun.desa.kecamatan.kabupaten.provinsi.nama', name: 'rw.dusun.desa.kecamatan.kabupaten.provinsi.nama' },
            { data: 'action', name: 'action',orderable: false, searchable: false }

        ]
    });

    $("#data-rt").css("width","100%");

    $( "#form-rt-input" ).submit(function( event ) {
    event.preventDefault();
    $(this).find(".inputan-error-rt").html('');
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
                    $('#error-rt-' + control).html(data.errors[control]);
                }
            } else {
                $('#modal-rt').modal('hide');
                rtTable.draw();
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            alert("Error: " + errorThrown);
        }
    });
    return false;
});

  $('#modal-rt').on('hidden.bs.modal', function () {
      $('select.inputan-rt').empty();
      $('select.inputan-rt').selectpicker('refresh');
      $(this).find(".inputan-rt").val([]);
      $(this).find(".inputan-error-rt").html('');
  });

  $('#modal-edit-rt').on('hidden.bs.modal', function () {
      $(this).find(".errors-edit-rt").html('');
  });

  function ajaxRtDelete(filename, token, content) {
    content = typeof content !== 'undefined' ? content : 'content';
    rtTable.draw();
    $.ajax({
        type: 'POST',
        data: {_method: 'DELETE', _token: token},
        url: filename,
        success: function (data) {
            $('#modalDelete-rt').modal('hide');
            $("#" + content).html(data);
            rtTable.draw();
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}

  $('#modalDelete-rt').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      $('#rt_delete_id').val(button.data('id'));
      $('#rt_delete_token').val(button.data('token'));
  });

  $(document).on('click', '.rt-edit', function(){
        var id = $(this).data('id');
        $.ajax({
            url:"/admin/fetchDataRt/"+id,
            method:'get',
            dataType:'json',
            success:function(data)
            {
                $('#edit-rt-nama_rt').val(data[0].nama_rt);
                $('#edit-rt-kepala_rt').val(data[0].kepala_rt);
                $('#form-edit-rt').attr('action', "/admin/rt/"+id);
                loadEditRt(data[0].rw.dusun.desa.kecamatan.kabupaten.provinsi.id_prov,data[0].rw.dusun.desa.kecamatan.kabupaten.id_kab,data[0].rw.dusun.desa.kecamatan.id_kec,data[0].rw.dusun.desa.id_kel,data[0].rw.dusun.id,data[0].rw.id);
                $('#modal-edit-rt').modal('show');
            }
        });
    });



  $(document).on('submit', 'form#form-edit-rt', function (event) {
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
                    $('#edit-rt-' + control).addClass('is-invalid');
                    $('#errors-edit-rt-' + control).html(data.errors[control]);
                }
            } else {
                $('#modal-edit-rt').modal('hide');
                rtTable.draw();
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            alert("Error: " + errorThrown);
        }
    });
    return false;
});

function RtProvinsiLoads()
  {
    $.get('/admin/fetchProvinsi',function(data) {
          $('#rt-provinsi').empty();
          $('#rt-provinsi').append('<option value="">Pilih Provinsi</option>');
          $.each(data, function(index, provinsi){
            $('#rt-provinsi').append('<option value="'+ provinsi.id_prov +'">'+ provinsi.nama +'</option>');
          });
          $('#rt-provinsi').selectpicker('refresh');
        });
  }

// Load Data Edit Form
function loadEditRt(id_prov,id_kab,id_kec,id_kel,id_dusun,id_rw)
  {
    $.get('/admin/fetchProvinsi',function(data) {
          $('#edit-rt-provinsi').empty();
          $('#edit-rt-provinsi').append('<option value="">Pilih Provinsi</option>');
          $.each(data, function(index, provinsi){
            if(id_prov == provinsi.id_prov)
              $('#edit-rt-provinsi').append('<option value="'+ provinsi.id_prov +'" selected>'+ provinsi.nama +'</option>');
            else
              $('#edit-rt-provinsi').append('<option value="'+ provinsi.id_prov +'">'+ provinsi.nama +'</option>');
          });
          $('#edit-rt-provinsi').selectpicker('refresh');
        });

    $.get('/admin/fetchKabupaten/'+id_prov,function(data) {
          $('#edit-rt-kabupaten').empty();
          $('#edit-rt-kabupaten').append('<option value="">Pilih Kabupaten</option>');
          $.each(data, function(index, kabupaten){
            if(id_kab == kabupaten.id_kab)
              $('#edit-rt-kabupaten').append('<option value="'+ kabupaten.id_kab +'" selected>'+ kabupaten.nama +'</option>');
            else
              $('#edit-rt-kabupaten').append('<option value="'+ kabupaten.id_kab +'">'+ kabupaten.nama +'</option>');
          });
          $('#edit-rt-kabupaten').selectpicker('refresh');
        });

    $.get('/admin/fetchKecamatan/'+id_kab,function(data) {
          $('#edit-rt-kecamatan').empty();
          $('#edit-rt-kecamatan').append('<option value="">Pilih Kecamatan</option>');
          $.each(data, function(index, kecamatan){
            if(id_kec == kecamatan.id_kec)
              $('#edit-rt-kecamatan').append('<option value="'+ kecamatan.id_kec +'" selected>'+ kecamatan.nama +'</option>');
            else
              $('#edit-rt-kecamatan').append('<option value="'+ kecamatan.id_kec +'">'+ kecamatan.nama +'</option>');
          });
          $('#edit-rt-kecamatan').selectpicker('refresh');
        });

    $.get('/admin/fetchDesa/'+id_kec,function(data) {
          $('#edit-rt-desa').empty();
          $('#edit-rt-desa').append('<option value="">Pilih desa</option>');
          $.each(data, function(index, desa){
            if(id_kel == desa.id_kel)
              $('#edit-rt-desa').append('<option value="'+ desa.id_kel +'" selected>'+ desa.nama +'</option>');
            else
              $('#edit-rt-desa').append('<option value="'+ desa.id_kel +'">'+ desa.nama +'</option>');
          });
          $('#edit-rt-desa').selectpicker('refresh');
        });

    $.get('/admin/formFetchDusun/'+id_kel,function(data) {
          $('#edit-rt-dusun').empty();
          $('#edit-rt-dusun').append('<option value="">Pilih Dusun</option>');
          $.each(data, function(index, dusun){
            if(id_dusun == dusun.id)
              $('#edit-rt-dusun').append('<option value="'+ dusun.id +'" selected>'+ dusun.nama_dusun +'</option>');
            else
              $('#edit-rt-dusun').append('<option value="'+ dusun.id +'">'+ dusun.nama_dusun +'</option>');
          });
          $('#edit-rt-dusun').selectpicker('refresh');
        });

    $.get('/admin/formFetchRw/'+id_dusun,function(data) {
          $('#edit-rt-rw').empty();
          $('#edit-rt-rw').append('<option value="">Pilih Rw</option>');
          $.each(data, function(index, rw){
            if(id_rw == rw.id)
              $('#edit-rt-rw').append('<option value="'+ rw.id +'" selected>'+ rw.nama_rw +'</option>');
            else
              $('#edit-rt-rw').append('<option value="'+ rw.id +'">'+ rw.nama_rw +'</option>');
          });
          $('#edit-rt-rw').selectpicker('refresh');
        });
  }


  $(document).ready()
  {
    RtProvinsiLoads();
  }

$(function() {

  // fetch selectpicker kabupaten
  $("#rt-provinsi").on("changed.bs.select", 
        function(e, clickedIndex, newValue, oldValue) {
      var provinsi = this.value;
      if(!provinsi){
        $('#rt-kabupaten').empty();
        $('#rt-kecamatan').empty();
        $('#rt-desa').empty();
        $('#rt-kabupaten').selectpicker('refresh');
        $('#rt-kecamatan').selectpicker('refresh');
        $('#rt-desa').selectpicker('refresh');
        $('#rt-dusun').empty();
        $('#rt-dusun').selectpicker('refresh');
    }else{
        $.get('/admin/fetchKabupaten/'+provinsi,function(data) {
          $('#rt-kabupaten').empty();
          $('#rt-kecamatan').empty();
          $('#rt-desa').empty();
          $('#rt-kabupaten').selectpicker('refresh');
          $('#rt-kecamatan').selectpicker('refresh');
          $('#rt-desa').selectpicker('refresh');
          $('#rt-dusun').empty();
          $('#rt-dusun').selectpicker('refresh');
            $('#rt-kabupaten').append('<option value="">Pilih kabupaten</option>');
              $.each(data, function(index, kabupaten){
                $('#rt-kabupaten').append('<option value="'+ kabupaten.id_kab +'">'+ kabupaten.nama +'</option>');
              });  
            $('#rt-kabupaten').selectpicker('refresh');        
        });
    }
  });


  // fetch selectpicker kecamatan
  $("#rt-kabupaten").on("changed.bs.select", 
        function(e, clickedIndex, newValue, oldValue) {
      var kabupaten = this.value;
      if(!kabupaten){
        $('#rt-kecamatan').empty();
        $('#rt-desa').empty();
        $('#rt-kecamatan').selectpicker('refresh');
        $('#rt-desa').selectpicker('refresh');
        $('#rt-dusun').empty();
        $('#rt-dusun').selectpicker('refresh');
    }else{
        $.get('/admin/fetchKecamatan/'+kabupaten,function(data) {
          $('#rt-kecamatan').empty();
          $('#rt-desa').empty();
          $('#rt-kecamatan').selectpicker('refresh');
          $('#rt-desa').selectpicker('refresh');
          $('#rt-dusun').empty();
          $('#rt-dusun').selectpicker('refresh');
            $('#rt-kecamatan').append('<option value="">Pilih Kecamatan</option>');
              $.each(data, function(index, kecamatan){
                $('#rt-kecamatan').append('<option value="'+ kecamatan.id_kec +'">'+ kecamatan.nama +'</option>');
              });  
            $('#rt-kecamatan').selectpicker('refresh');        
        });
    }
  });


  // fetch selectpicker Desa
  $("#rt-kecamatan").on("changed.bs.select", 
        function(e, clickedIndex, newValue, oldValue) {
      var kecamatan = this.value;
      if(!kecamatan){
        $('#rt-desa').empty();
        $('#rt-desa').selectpicker('refresh');
        $('#rt-dusun').empty();
        $('#rt-dusun').selectpicker('refresh');
    }else{
        $.get('/admin/fetchDesa/'+kecamatan,function(data) {
          $('#rt-desa').empty();
          $('#rt-desa').selectpicker('refresh');
          $('#rt-dusun').empty();
          $('#rt-dusun').selectpicker('refresh');
            $('#rt-desa').append('<option value="">Pilih Desa</option>');
              $.each(data, function(index, desa){
                $('#rt-desa').append('<option value="'+ desa.id_kel +'">'+ desa.nama +'</option>');
              });  
            $('#rt-desa').selectpicker('refresh');        
        });
    }
  });

  // fetch selectpicker Dusun
  $("#rt-desa").on("changed.bs.select", 
        function(e, clickedIndex, newValue, oldValue) {
      var desa = this.value;
      if(!desa){
        $('#rt-dusun').empty();
        $('#rt-dusun').selectpicker('refresh');
    }else{
        $.get('/admin/formFetchDusun/'+desa,function(data) {
          $('#rt-dusun').empty();
          $('#rt-dusun').selectpicker('refresh');
            $('#rt-dusun').append('<option value="">Pilih dusun</option>');
              $.each(data, function(index, dusun){
                $('#rt-dusun').append('<option value="'+ dusun.id +'">'+ dusun.nama_dusun +'</option>');
              });  
            $('#rt-dusun').selectpicker('refresh');        
        });
    }
  });

  // fetch selectpicker Rw
  $("#rt-dusun").on("changed.bs.select", 
        function(e, clickedIndex, newValue, oldValue) {
      var dusun = this.value;
      if(!dusun){
        $('#rt-rw').empty();
        $('#rt-rw').selectpicker('refresh');
    }else{
        $.get('/admin/formFetchRw/'+dusun,function(data) {
          $('#rt-rw').empty();
          $('#rt-rw').selectpicker('refresh');
            $('#rt-rw').append('<option value="">Pilih Rw</option>');
              $.each(data, function(index, rw){
                $('#rt-rw').append('<option value="'+ rw.id +'">'+ rw.nama_rw +'</option>');
              });  
            $('#rt-rw').selectpicker('refresh');        
        });
    }
  });

});



$(function() {

  // fetch selectpicker kabupaten
  $("#edit-rt-provinsi").on("changed.bs.select", 
        function(e, clickedIndex, newValue, oldValue) {
      var provinsi = this.value;
      if(!provinsi){
        $('#edit-rt-kabupaten').empty();
        $('#edit-rt-kecamatan').empty();
        $('#edit-rt-desa').empty();
        $('#edit-rt-kabupaten').selectpicker('refresh');
        $('#edit-rt-kecamatan').selectpicker('refresh');
        $('#edit-rt-desa').selectpicker('refresh');
        $('#edit-rt-dusun').empty();
        $('#edit-rt-dusun').selectpicker('refresh');
        $('#edit-rt-rw').empty();
        $('#edit-rt-rw').selectpicker('refresh');
    }else{
        $.get('/admin/fetchKabupaten/'+provinsi,function(data) {
          $('#edit-rt-kabupaten').empty();
          $('#edit-rt-kecamatan').empty();
          $('#edit-rt-desa').empty();
          $('#edit-rt-kabupaten').selectpicker('refresh');
          $('#edit-rt-kecamatan').selectpicker('refresh');
          $('#edit-rt-desa').selectpicker('refresh');
          $('#edit-rt-dusun').empty();
          $('#edit-rt-dusun').selectpicker('refresh');
          $('#edit-rt-rw').empty();
          $('#edit-rt-rw').selectpicker('refresh');
            $('#edit-rt-kabupaten').append('<option value="">Pilih kabupaten</option>');
              $.each(data, function(index, kabupaten){
                $('#edit-rt-kabupaten').append('<option value="'+ kabupaten.id_kab +'">'+ kabupaten.nama +'</option>');
              });  
            $('#edit-rt-kabupaten').selectpicker('refresh');        
        });
    }
  });


  // fetch selectpicker kecamatan
  $("#edit-rt-kabupaten").on("changed.bs.select", 
        function(e, clickedIndex, newValue, oldValue) {
      var kabupaten = this.value;
      if(!kabupaten){
        $('#edit-rt-kecamatan').empty();
        $('#edit-rt-desa').empty();
        $('#edit-rt-kecamatan').selectpicker('refresh');
        $('#edit-rt-desa').selectpicker('refresh');
        $('#edit-rt-dusun').empty();
        $('#edit-rt-dusun').selectpicker('refresh');
        $('#edit-rt-rw').empty();
        $('#edit-rt-rw').selectpicker('refresh');
    }else{
        $.get('/admin/fetchKecamatan/'+kabupaten,function(data) {
          $('#edit-rt-kecamatan').empty();
          $('#edit-rt-desa').empty();
          $('#edit-rt-kecamatan').selectpicker('refresh');
          $('#edit-rt-desa').selectpicker('refresh');
          $('#edit-rt-dusun').empty();
          $('#edit-rt-dusun').selectpicker('refresh');
          $('#edit-rt-rw').empty();
          $('#edit-rt-rw').selectpicker('refresh');
            $('#edit-rt-kecamatan').append('<option value="">Pilih Kecamatan</option>');
              $.each(data, function(index, kecamatan){
                $('#edit-rt-kecamatan').append('<option value="'+ kecamatan.id_kec +'">'+ kecamatan.nama +'</option>');
              });  
            $('#edit-rt-kecamatan').selectpicker('refresh');        
        });
    }
  });


  // fetch selectpicker Desa
  $("#edit-rt-kecamatan").on("changed.bs.select", 
        function(e, clickedIndex, newValue, oldValue) {
      var kecamatan = this.value;
      if(!kecamatan){
        $('#edit-rt-desa').empty();
        $('#edit-rt-desa').selectpicker('refresh');
        $('#edit-rt-dusun').empty();
        $('#edit-rt-dusun').selectpicker('refresh');
        $('#edit-rt-rw').empty();
        $('#edit-rt-rw').selectpicker('refresh');
    }else{
        $.get('/admin/fetchDesa/'+kecamatan,function(data) {
          $('#edit-rt-desa').empty();
          $('#edit-rt-desa').selectpicker('refresh');
          $('#edit-rt-dusun').empty();
          $('#edit-rt-dusun').selectpicker('refresh');
          $('#edit-rt-rw').empty();
          $('#edit-rt-rw').selectpicker('refresh');
            $('#edit-rt-desa').append('<option value="">Pilih Desa</option>');
              $.each(data, function(index, desa){
                $('#edit-rt-desa').append('<option value="'+ desa.id_kel +'">'+ desa.nama +'</option>');
              });  
            $('#edit-rt-desa').selectpicker('refresh');        
        });
    }
  });

  // fetch selectpicker Dusun
  $("#edit-rt-desa").on("changed.bs.select", 
        function(e, clickedIndex, newValue, oldValue) {
      var desa = this.value;
      if(!desa){
        $('#edit-rt-dusun').empty();
        $('#edit-rt-dusun').selectpicker('refresh');
        $('#edit-rt-rw').empty();
        $('#edit-rt-rw').selectpicker('refresh');
    }else{
        $.get('/admin/formFetchDusun/'+desa,function(data) {
          $('#edit-rt-dusun').empty();
          $('#edit-rt-dusun').selectpicker('refresh');
          $('#edit-rt-rw').empty();
          $('#edit-rt-rw').selectpicker('refresh');
            $('#edit-rt-dusun').append('<option value="">Pilih dusun</option>');
              $.each(data, function(index, dusun){
                $('#edit-rt-dusun').append('<option value="'+ dusun.id +'">'+ dusun.nama_dusun +'</option>');
              });  
            $('#edit-rt-dusun').selectpicker('refresh');        
        });
    }
  });

  // fetch selectpicker Dusun
  $("#edit-rt-dusun").on("changed.bs.select", 
        function(e, clickedIndex, newValue, oldValue) {
      var dusun = this.value;
      if(!dusun){
        $('#edit-rt-rw').empty();
        $('#edit-rt-rw').selectpicker('refresh');
    }else{
        $.get('/admin/formFetchRw/'+dusun,function(data) {
          $('#edit-rt-rw').empty();
          $('#edit-rt-rw').selectpicker('refresh');
            $('#edit-rt-rw').append('<option value="">Pilih rw</option>');
              $.each(data, function(index, rw){
                $('#edit-rt-rw').append('<option value="'+ rw.id +'">'+ rw.nama_rw +'</option>');
              });  
            $('#edit-rt-rw').selectpicker('refresh');        
        });
    }
  });

});
