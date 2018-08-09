  var kkTable = $('#data-kk').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/admin/fetchKk',
        columns: [
            { data: 'DT_Row_Index', name: 'DT_Row_Index',orderable: false, searchable: false },
            { data: 'nomor_kk', name: 'nomor_kk' },
            { data: 'action', name: 'action',orderable: false, searchable: false }

        ]
    });

      var anggotaTable = $('#anggota').DataTable({
                dom: 'lBfrtip',
                processing: true,
                serverSide: true,
                lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
                ajax: {
                    url: '/admin/fetchAnggotaKk',
                        data: function(d) {
                            d.nomer_kk = $('#kk').val();
                        }
                    },
                columns: [
                  { data: 'DT_Row_Index', name: 'DT_Row_Index',orderable: false, searchable: false },
                  { data: 'kk.nomor_kk', name: 'kk.nomor_kk' },
                  { data: 'penduduk.nama', name: 'penduduk.nama' },
                  { data: 'no_paspor', name: 'no_paspor' },
                  { data: 'status', name: 'status' },
                  { data: 'action', name: 'action',orderable: false, searchable: false }
                ],
    });

    // fetch selectpicker rt
        $("#kk").on("changed.bs.select",
        function(e, clickedIndex, newValue, oldValue) {
            anggotaTable.draw();
        });

    $("#data-kk").css("width","100%");
    $("#anggota").css("width","100%");

    $( "#form-kk-input" ).submit(function( event ) {
    event.preventDefault();
    $(this).find(".inputan-error-kk").html('');
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
                    $('#error-kk-' + control).html(data.errors[control]);
                }
            } else {
                $('#modal-kk').modal('hide');
                kkTable.draw();
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            alert("Error: " + errorThrown);
        }
    });
    return false;
});

  $('#modal-kk').on('hidden.bs.modal', function () {
      $('select.inputan-kk').empty();
      $('select.inputan-kk').selectpicker('refresh');
      $(this).find(".inputan-kk").val([]);
      $(this).find(".inputan-error-kk").html('');
  });

  function ajaxDesaDelete(filename, token, content) {
    content = typeof content !== 'undefined' ? content : 'content';
    kkTable.draw();
    $.ajax({
        type: 'POST',
        data: {_method: 'DELETE', _token: token},
        url: filename,
        success: function (data) {
            $('#modalDelete-desa').modal('hide');
            $("#" + content).html(data);
            kkTable.draw();
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
                kkTable.draw();
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            alert("Error: " + errorThrown);
        }
    });
    return false;
});

function kkProvinsiLoads()
  {
    $.get('/admin/fetchProvinsi',function(data) {
          $('#kk-provinsi').empty();
          $('#kk-provinsi').append('<option value="">Pilih Provinsi</option>');
          $.each(data, function(index, provinsi){
            $('#kk-provinsi').append('<option data-id="'+provinsi.id_prov+'" data-tokens="'+ provinsi.nama +'" value="'+ provinsi.nama +'">'+ provinsi.nama +'</option>');
          });
          $('#kk-provinsi').selectpicker('refresh');
        });
  }

  $(document).ready()
  {
    kkProvinsiLoads();
    fetchKkAll();
  }



$(function() {

  // fetch selectpicker kabupaten
  $("#kk-provinsi").on("changed.bs.select",
        function(e, clickedIndex, newValue, oldValue) {
      var provinsi = $(this).find(':selected').data('id');
      if(!provinsi){
        $('#kk-kabupaten_kota').empty();
        $('#kk-kecamatan').empty();
        $('#kk-desa').empty();
        $('#kk-kabupaten_kota').selectpicker('refresh');
        $('#kk-kecamatan').selectpicker('refresh');
        $('#kk-desa').selectpicker('refresh');
        $('#kk-dusun').empty();
        $('#kk-dusun').selectpicker('refresh');
        $('#kk-rw').empty();
        $('#kk-rw').selectpicker('refresh');
        $('#kk-rt').empty();
        $('#kk-rt').selectpicker('refresh');
    }else{
        $.get('/admin/fetchKabupaten/'+provinsi,function(data) {
          $('#kk-kabupaten_kota').empty();
          $('#kk-kecamatan').empty();
          $('#kk-desa').empty();
          $('#kk-kabupaten_kota').selectpicker('refresh');
          $('#kk-kecamatan').selectpicker('refresh');
          $('#kk-desa').selectpicker('refresh');
          $('#kk-dusun').empty();
          $('#kk-dusun').selectpicker('refresh');
          $('#kk-rw').empty();
          $('#kk-rw').selectpicker('refresh');
          $('#kk-rt').empty();
          $('#kk-rt').selectpicker('refresh');
            $('#kk-kabupaten_kota').append('<option value="">Pilih kabupaten</option>');
              $.each(data, function(index, kabupaten){
                $('#kk-kabupaten_kota').append('<option data-id="'+kabupaten.id_kab+'" data-tokens="'+ kabupaten.nama +'" value="'+ kabupaten.nama +'">'+ kabupaten.nama +'</option>');
              });
            $('#kk-kabupaten_kota').selectpicker('refresh');
        });
    }
  });


  // fetch selectpicker kecamatan
  $("#kk-kabupaten_kota").on("changed.bs.select",
        function(e, clickedIndex, newValue, oldValue) {
      var kabupaten = $(this).find(':selected').data('id');
      if(!kabupaten){
        $('#kk-kecamatan').empty();
        $('#kk-desa').empty();
        $('#kk-kecamatan').selectpicker('refresh');
        $('#kk-desa').selectpicker('refresh');
        $('#kk-dusun').empty();
        $('#kk-dusun').selectpicker('refresh');
        $('#kk-rw').empty();
        $('#kk-rw').selectpicker('refresh');
        $('#kk-rt').empty();
        $('#kk-rt').selectpicker('refresh');
    }else{
        $.get('/admin/fetchKecamatan/'+kabupaten,function(data) {
          $('#kk-kecamatan').empty();
          $('#kk-desa').empty();
          $('#kk-kecamatan').selectpicker('refresh');
          $('#kk-desa').selectpicker('refresh');
          $('#kk-dusun').empty();
          $('#kk-dusun').selectpicker('refresh');
          $('#kk-rw').empty();
          $('#kk-rw').selectpicker('refresh');
          $('#kk-rt').empty();
          $('#kk-rt').selectpicker('refresh');
            $('#kk-kecamatan').append('<option value="">Pilih Kecamatan</option>');
              $.each(data, function(index, kecamatan){
                $('#kk-kecamatan').append('<option data-id="'+kecamatan.id_kec+'" data-tokens="'+ kecamatan.nama +'" value="'+ kecamatan.nama +'">'+ kecamatan.nama +'</option>');
              });
            $('#kk-kecamatan').selectpicker('refresh');
        });
    }
  });


  // fetch selectpicker Desa
  $("#kk-kecamatan").on("changed.bs.select",
        function(e, clickedIndex, newValue, oldValue) {
      var kecamatan = $(this).find(':selected').data('id');
      if(!kecamatan){
        $('#kk-desa').empty();
        $('#kk-desa').selectpicker('refresh');
        $('#kk-dusun').empty();
        $('#kk-dusun').selectpicker('refresh');
        $('#kk-rw').empty();
        $('#kk-rw').selectpicker('refresh');
        $('#kk-rt').empty();
        $('#kk-rt').selectpicker('refresh');
    }else{
        $.get('/admin/fetchDesa/'+kecamatan,function(data) {
          $('#kk-desa').empty();
          $('#kk-desa').selectpicker('refresh');
          $('#kk-dusun').empty();
          $('#kk-dusun').selectpicker('refresh');
          $('#kk-rw').empty();
          $('#kk-rw').selectpicker('refresh');
          $('#kk-rt').empty();
          $('#kk-rt').selectpicker('refresh');
            $('#kk-desa').append('<option value="">Pilih Desa</option>');
              $.each(data, function(index, desa){
                $('#kk-desa').append('<option data-id="'+desa.id_kel+'" data-tokens="'+ desa.nama +'" value="'+ desa.nama +'">'+ desa.nama +'</option>');
              });
            $('#kk-desa').selectpicker('refresh');
        });
    }
  });

  // fetch selectpicker Dusun
  $("#kk-desa").on("changed.bs.select",
        function(e, clickedIndex, newValue, oldValue) {
      var desa = $(this).find(':selected').data('id');
      if(!desa){
        $('#kk-dusun').empty();
        $('#kk-dusun').selectpicker('refresh');
        $('#kk-rw').empty();
        $('#kk-rw').selectpicker('refresh');
        $('#kk-rt').empty();
        $('#kk-rt').selectpicker('refresh');
    }else{
        $.get('/admin/formFetchDusun/'+desa,function(data) {
          $('#kk-dusun').empty();
          $('#kk-dusun').selectpicker('refresh');
          $('#kk-rw').empty();
          $('#kk-rw').selectpicker('refresh');
          $('#kk-rt').empty();
          $('#kk-rt').selectpicker('refresh');
            $('#kk-dusun').append('<option value="">Pilih dusun</option>');
              $.each(data, function(index, dusun){
                $('#kk-dusun').append('<option data-id="'+dusun.id+'" data-tokens="'+ dusun.nama_dusun +'" value="'+ dusun.nama_dusun +'">'+ dusun.nama_dusun +'</option>');
              });
            $('#kk-dusun').selectpicker('refresh');
        });
    }
  });

  // fetch selectpicker Rw
  $("#kk-dusun").on("changed.bs.select",
        function(e, clickedIndex, newValue, oldValue) {
      var dusun = $(this).find(':selected').data('id');
      if(!dusun){
        $('#kk-rw').empty();
        $('#kk-rw').selectpicker('refresh');
        $('#kk-rt').empty();
        $('#kk-rt').selectpicker('refresh');
    }else{
        $.get('/admin/formFetchRw/'+dusun,function(data) {
          $('#kk-rw').empty();
          $('#kk-rw').selectpicker('refresh');
          $('#kk-rt').empty();
          $('#kk-rt').selectpicker('refresh');
            $('#kk-rw').append('<option value="">Pilih Rw</option>');
              $.each(data, function(index, rw){
                $('#kk-rw').append('<option data-id="'+rw.id+'" data-tokens="'+ rw.nama_rw +'" value="'+ rw.nama_rw +'">'+ rw.nama_rw +'</option>');
              });
            $('#kk-rw').selectpicker('refresh');
        });
    }
  });

  // fetch selectpicker rt
      $("#kk-rw").on("changed.bs.select",
            function(e, clickedIndex, newValue, oldValue) {
          var rw = $(this).find(':selected').data('id');
          if(!rw){
            $('#kk-rt').empty();
            $('#kk-rt').selectpicker('refresh');
        }else{
            $.get('/admin/formFetchRt/'+rw,function(data) {
              $('#kk-rt').empty();
              $('#kk-rt').selectpicker('refresh');
              $('#kk-rt').append('<option value="">Pilih Rt</option>');
                  $.each(data, function(index, rt){
                    $('#kk-rt').append('<option data-id="'+rt.id+'" data-tokens="'+ rt.nama_rt +'" value="'+ rt.nama_rt +'">'+ rt.nama_rt +'</option>');
                  });
                $('#kk-rt').selectpicker('refresh');
            });
        }
      });

});

function fetchKkAll()
  {
    $.get('/admin/fetchKkAll',function(data) {
          $('#kk').empty();
          $('#kk').append('<option value="">Pilih KK</option>');
          $.each(data, function(index, kk){
            $('#kk').append('<option data-tokens="'+ kk.nomor_kk +'"  value="'+ kk.id +'">'+ kk.nomor_kk +'</option>');
          });
          $('#kk').selectpicker('refresh');
        });
  }

function FetchPendudukAll()
{
  $.get('/admin/fetchPendudukAll',function(data) {
        $('#anggota_penduduk').empty();
        $('#anggota_penduduk').append('<option value="">Pilih Anggota</option>');
        $.each(data, function(index, penduduk){
          $('#anggota_penduduk').append('<option data-tokens="'+ penduduk.nik +'" value="'+ penduduk.id +'">'+ penduduk.nik +'</option>');
        });
        $('#anggota_penduduk').selectpicker('refresh');
      });
}

  $(document).on('click', '#modal-anggota-kk', function(){
    $('#anggota-nomor_kk').val($('#kk').find(':selected').data('tokens'));
    FetchPendudukAll()
  });
