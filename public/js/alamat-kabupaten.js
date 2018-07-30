  var kabupatenTable = $('#data-kabupaten').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/admin/fetchKabupaten',
        columns: [
            { data: 'DT_Row_Index', name: 'DT_Row_Index',orderable: false, searchable: false },
            { data: 'nama_kabupaten', name: 'nama_kabupaten' },
            { data: 'provinsi.nama_provinsi', name: 'provinsi.nama_provinsi' },
            { data: 'action', name: 'action',orderable: false, searchable: false }

        ]
    });

    $("#data-kabupaten").css("width","100%");

    $(document).on('submit', 'form#form-kabupaten', function (event) {
    event.preventDefault();
    $(this).find(".inputan-error-kabupaten").html('');
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
                    $('#error-kabupaten-' + control).html(data.errors[control]);
                }
            } else {
                $('#modal-kabupaten').modal('hide');
                kabupatenTable.draw();
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            alert("Error: " + errorThrown);
        }
    });
    return false;
});

  $('#modal-kabupaten').on('hidden.bs.modal', function () {
      $(this).find(".inputan-kabupaten").val([]);
      $(this).find(".inputan-error-kabupaten").html('');
  });

  function ajaxKabupatenDelete(filename, token, content) {
    content = typeof content !== 'undefined' ? content : 'content';
    kabupatenTable.draw();
    $.ajax({
        type: 'POST',
        data: {_method: 'DELETE', _token: token},
        url: filename,
        success: function (data) {
            $('#modalDelete-kabupaten').modal('hide');
            $("#" + content).html(data);
            kabupatenTable.draw();
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}

  $('#modalDelete-kabupaten').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      $('#kabupaten_delete_id').val(button.data('id'));
      $('#kabupaten_delete_token').val(button.data('token'));
  });

  $(document).on('click', '.kabupaten-edit', function(){
        var id = $(this).data('id');
        $.ajax({
            url:"/admin/fetchDataKabupaten/"+id,
            method:'get',
            dataType:'json',
            success:function(data)
            {
                $('#edit-kabupaten-nama_kabupaten').val(data[0].nama_kabupaten);
                $('#form-edit-kabupaten').attr('action', "/admin/kabupaten/"+id);
                provinsiEdit(data[0].provinsi.id);
                $('#modal-edit-kabupaten').modal('show');
            }
        });
    });

  function provinsiEdit(id)
  {
    $.get('/admin/kabupaten-fetchProvinsi',function(data) {
                      $('#edit-kabupaten-provinsi').empty();
                      $.each(data, function(index, provinsi){
                        if(id == provinsi.id)
                        $('#edit-kabupaten-provinsi').append('<option value="'+ provinsi.id +'" selected>'+ provinsi.nama_provinsi +'</option>');
                        else
                        $('#edit-kabupaten-provinsi').append('<option value="'+ provinsi.id +'">'+ provinsi.nama_provinsi +'</option>');
                      })
                    });
  }

  $(document).on('submit', 'form#form-edit-kabupaten', function (event) {
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
                    $('#edit-kabupaten-' + control).addClass('is-invalid');
                    $('#errors-edit-kabupaten-' + control).html(data.errors[control]);
                }
            } else {
                $('#modal-edit-kabupaten').modal('hide');
                kabupatenTable.draw();
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            alert("Error: " + errorThrown);
        }
    });
    return false;
});

function provinsiLoads()
  {
    $.get('/admin/kabupaten-fetchProvinsi',function(data) {
          $('#kabupaten-provinsi').empty();
          $.each(data, function(index, provinsi){
            $('#kabupaten-provinsi').append('<option value="'+ provinsi.id +'">'+ provinsi.nama_provinsi +'</option>');
          })
        });
  }