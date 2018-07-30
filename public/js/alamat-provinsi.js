  var provinsiTable = $('#data-provinsi').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/admin/fetchProvinsi',
        columns: [
            { data: 'DT_Row_Index', name: 'DT_Row_Index',orderable: false, searchable: false },
            { data: 'nama_provinsi', name: 'nama_provinsi' },
            { data: 'action', name: 'action',orderable: false, searchable: false }

        ]
    });

    $("#data-provinsi").css("width","100%");

    $(document).on('submit', 'form#form-provinsi', function (event) {
    event.preventDefault();
    $(this).find(".inputan-error-provinsi").html('');
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
                $('#modal-provinsi').modal('hide');
                provinsiTable.draw();
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            alert("Error: " + errorThrown);
        }
    });
    return false;
});

  $('#modal-provinsi').on('hidden.bs.modal', function () {
      $(this).find(".inputan-provinsi").val([]);
      $(this).find(".inputan-error-provinsi").html('');
  });

  function ajaxProvinsiDelete(filename, token, content) {
    content = typeof content !== 'undefined' ? content : 'content';
    provinsiTable.draw();
    $.ajax({
        type: 'POST',
        data: {_method: 'DELETE', _token: token},
        url: filename,
        success: function (data) {
            $('#modalDelete-provinsi').modal('hide');
            $("#" + content).html(data);
            provinsiTable.draw();
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}

  $('#modalDelete-provinsi').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      $('#provinsi_delete_id').val(button.data('id'));
      $('#provinsi_delete_token').val(button.data('token'));
  });

  $(document).on('click', '.provinsi-edit', function(){
        var id = $(this).data('id');
        $.ajax({
            url:"/admin/fetchDataProvinsi/"+id,
            method:'get',
            dataType:'json',
            success:function(data)
            {
                $('#edit-provinsi-nama_provinsi').val(data[0].nama_provinsi);
                $('#form-edit-provinsi').attr('action', "/admin/provinsi/"+id);
                $('#modal-edit-provinsi').modal('show');
            }
        });
    });

  $(document).on('submit', 'form#form-edit-provinsi', function (event) {
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
                    $('#edit-provinsi-' + control).addClass('is-invalid');
                    $('#errors-edit-provinsi-' + control).html(data.errors[control]);
                }
            } else {
                $('#modal-edit-provinsi').modal('hide');
                provinsiTable.draw();
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            alert("Error: " + errorThrown);
        }
    });
    return false;
});