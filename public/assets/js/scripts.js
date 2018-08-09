
var pendudukTable = $('#data-penduduk').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/admin/fetchPenduduk',
        columns: [
            { data: 'DT_Row_Index', name: 'DT_Row_Index',orderable: false, searchable: false },
            { data: 'nik', name: 'nik' },
            { data: 'nama', name: 'nama' },
            { data: 'alamat', name: 'alamat' },
            { data: 'nomer_telepon', name: 'nomer_telepon' },
            { data: 'status_ktp', name: 'status_ktp' },
            { data: 'action', name: 'action',orderable: false, searchable: false }

        ]
    });

    $("#data-penduduk").css("width","100%");

function scroll_to_class(element_class, removed_height) {
	var scroll_to = $(element_class).offset().top - removed_height;
	if($(window).scrollTop() != scroll_to) {
		$('html, body').stop().animate({scrollTop: scroll_to}, 0);
	}
}

function bar_progress(progress_line_object, direction) {
	var number_of_steps = progress_line_object.data('number-of-steps');
	var now_value = progress_line_object.data('now-value');
	var new_value = 0;
	if(direction == 'right') {
		new_value = now_value + ( 100 / number_of_steps );
	}
	else if(direction == 'left') {
		new_value = now_value - ( 100 / number_of_steps );
	}
	progress_line_object.attr('style', 'width: ' + new_value + '%;').data('now-value', new_value);
}

function PendudukPekerjaanLoads()
    {
      $.get('/admin/fetchFormPekerjaan',function(data) {
            $('#f1-pekerjaan').empty();
            $('#f1-pekerjaan').append('<option value="">Pilih Pekerjaan</option>');
            $.each(data, function(index, pekerjaan){
              $('#f1-pekerjaan').append('<option data-tokens="'+ pekerjaan.nama +'" value="'+ pekerjaan.nama +'">'+ pekerjaan.nama +'</option>');
            });
            $('#f1-pekerjaan').selectpicker('refresh');
          });
    }

function PendudukProvinsiLoads()
  {
    $.get('/admin/fetchProvinsi',function(data) {
          $('#f1-provinsi').empty();
          $('#f1-provinsi').append('<option value="">Pilih Provinsi</option>');
          $.each(data, function(index, provinsi){
            $('#f1-provinsi').append('<option data-id="'+provinsi.id_prov+'" data-tokens="'+ provinsi.nama +'" value="'+ provinsi.nama +'">'+ provinsi.nama +'</option>');
          });
          $('#f1-provinsi').selectpicker('refresh');
        });
  }

    $(function() {

      // fetch selectpicker kabupaten
      $("#f1-provinsi").on("changed.bs.select", 
            function(e, clickedIndex, newValue, oldValue) {
          var provinsi = $(this).find(':selected').data('id');
          if(!provinsi){
            $('#f1-kabupaten_kota').empty();
            $('#f1-kecamatan').empty();
            $('#f1-desa').empty();
            $('#f1-kabupaten_kota').selectpicker('refresh');
            $('#f1-kecamatan').selectpicker('refresh');
            $('#f1-desa').selectpicker('refresh');
            $('#f1-dusun').empty();
            $('#f1-dusun').selectpicker('refresh');
            $('#f1-rw').empty();
            $('#f1-rw').selectpicker('refresh');
            $('#f1-rt').empty();
            $('#f1-rt').selectpicker('refresh');
        }else{
            $.get('/admin/fetchKabupaten/'+provinsi,function(data) {
              $('#f1-kabupaten_kota').empty();
              $('#f1-kecamatan').empty();
              $('#f1-desa').empty();
              $('#f1-kabupaten_kota').selectpicker('refresh');
              $('#f1-kecamatan').selectpicker('refresh');
              $('#f1-desa').selectpicker('refresh');
              $('#f1-dusun').empty();
              $('#f1-dusun').selectpicker('refresh');
              $('#f1-rw').empty();
              $('#f1-rw').selectpicker('refresh');
              $('#f1-rt').empty();
              $('#f1-rt').selectpicker('refresh');
              $('#f1-kabupaten_kota').append('<option value="">Pilih kabupaten</option>');
                  $.each(data, function(index, kabupaten){
                    $('#f1-kabupaten_kota').append('<option data-id="'+kabupaten.id_kab+'" data-tokens="'+ kabupaten.nama +'" value="'+ kabupaten.nama +'">'+ kabupaten.nama +'</option>');
                  });  
                $('#f1-kabupaten_kota').selectpicker('refresh');        
            });
        }
      });

          // fetch selectpicker kecamatan
      $("#f1-kabupaten_kota").on("changed.bs.select", 
            function(e, clickedIndex, newValue, oldValue) {
          var kabupaten = $(this).find(':selected').data('id');
          if(!kabupaten){
            $('#f1-kecamatan').empty();
            $('#f1-desa').empty();
            $('#f1-kecamatan').selectpicker('refresh');
            $('#f1-desa').selectpicker('refresh');
            $('#f1-dusun').empty();
            $('#f1-dusun').selectpicker('refresh');
            $('#f1-rw').empty();
            $('#f1-rw').selectpicker('refresh');
            $('#f1-rt').empty();
            $('#f1-rt').selectpicker('refresh');
        }else{
            $.get('/admin/fetchKecamatan/'+kabupaten,function(data) {
              $('#f1-kecamatan').empty();
              $('#f1-desa').empty();
              $('#f1-kecamatan').selectpicker('refresh');
              $('#f1-desa').selectpicker('refresh');
              $('#f1-dusun').empty();
              $('#f1-dusun').selectpicker('refresh');
              $('#f1-rw').empty();
              $('#f1-rw').empty();
              $('#f1-rw').selectpicker('refresh');
              $('#f1-rt').empty();
              $('#f1-rt').selectpicker('refresh');
                $('#f1-kecamatan').append('<option value="">Pilih Kecamatan</option>');
                  $.each(data, function(index, kecamatan){
                    $('#f1-kecamatan').append('<option data-id="'+kecamatan.id_kec+'" data-tokens="'+ kecamatan.nama +'" value="'+ kecamatan.nama +'">'+ kecamatan.nama +'</option>');
                  });  
                $('#f1-kecamatan').selectpicker('refresh');        
            });
        }
      });

      // fetch selectpicker Desa
      $("#f1-kecamatan").on("changed.bs.select", 
            function(e, clickedIndex, newValue, oldValue) {
          var kecamatan = $(this).find(':selected').data('id');
          if(!kecamatan){
            $('#f1-desa').empty();
            $('#f1-desa').selectpicker('refresh');
            $('#f1-dusun').empty();
            $('#f1-dusun').selectpicker('refresh');
            $('#f1-rw').empty();
            $('#f1-rw').selectpicker('refresh');
            $('#f1-rt').empty();
            $('#f1-rt').selectpicker('refresh');
        }else{
            $.get('/admin/fetchDesa/'+kecamatan,function(data) {
              $('#f1-desa').empty();
              $('#f1-desa').selectpicker('refresh');
              $('#f1-dusun').empty();
              $('#f1-dusun').selectpicker('refresh');
              $('#f1-rw').empty();
              $('#f1-rw').selectpicker('refresh');
              $('#f1-rt').empty();
              $('#f1-rt').selectpicker('refresh');
                $('#f1-desa').append('<option value="">Pilih Desa</option>');
                  $.each(data, function(index, desa){
                    $('#f1-desa').append('<option data-id="'+desa.id_kel+'" data-tokens="'+ desa.nama +'" value="'+ desa.nama +'">'+ desa.nama +'</option>');
                  });  
                $('#f1-desa').selectpicker('refresh');        
            });
        }
      });

      // fetch selectpicker Dusun
      $("#f1-desa").on("changed.bs.select", 
            function(e, clickedIndex, newValue, oldValue) {
          var desa = $(this).find(':selected').data('id');
          if(!desa){
            $('#f1-dusun').empty();
            $('#f1-dusun').selectpicker('refresh');
            $('#f1-rw').empty();
            $('#f1-rw').selectpicker('refresh');
            $('#f1-rt').empty();
            $('#f1-rt').selectpicker('refresh');
        }else{
            $.get('/admin/formFetchDusun/'+desa,function(data) {
                $('#f1-dusun').empty();
                $('#f1-dusun').selectpicker('refresh');
                $('#f1-rw').empty();
                $('#f1-rw').selectpicker('refresh');
                $('#f1-rt').empty();
                $('#f1-rt').selectpicker('refresh');
                $('#f1-dusun').append('<option value="">Pilih dusun</option>');
                  $.each(data, function(index, dusun){
                    $('#f1-dusun').append('<option data-id="'+dusun.id+'" data-tokens="'+ dusun.nama_dusun +'" value="'+ dusun.nama_dusun +'">'+ dusun.nama_dusun +'</option>');
                  });  
                $('#f1-dusun').selectpicker('refresh');        
            });
        }
      });

      // fetch selectpicker Rw
      $("#f1-dusun").on("changed.bs.select", 
            function(e, clickedIndex, newValue, oldValue) {
          var dusun = $(this).find(':selected').data('id');
          if(!dusun){
            $('#f1-rw').empty();
            $('#f1-rw').selectpicker('refresh');
            $('#f1-rt').empty();
            $('#f1-rt').selectpicker('refresh');
        }else{
            $.get('/admin/formFetchRw/'+dusun,function(data) {
              $('#f1-rw').empty();
              $('#f1-rw').selectpicker('refresh');
              $('#f1-rt').empty();
              $('#f1-rt').selectpicker('refresh');
              $('#f1-rw').append('<option value="">Pilih Rw</option>');
                  $.each(data, function(index, rw){
                    $('#f1-rw').append('<option data-id="'+rw.id+'" data-tokens="'+ rw.nama_rw +'" value="'+ rw.nama_rw +'">'+ rw.nama_rw +'</option>');
                  });  
                $('#f1-rw').selectpicker('refresh');        
            });
        }
      });

      // fetch selectpicker Rw
      $("#f1-rw").on("changed.bs.select", 
            function(e, clickedIndex, newValue, oldValue) {
          var rw = $(this).find(':selected').data('id');
          if(!rw){
            $('#f1-rt').empty();
            $('#f1-rt').selectpicker('refresh');
        }else{
            $.get('/admin/formFetchRt/'+rw,function(data) {
              $('#f1-rt').empty();
              $('#f1-rt').selectpicker('refresh');
              $('#f1-rt').append('<option value="">Pilih Rt</option>');
                  $.each(data, function(index, rt){
                    $('#f1-rt').append('<option data-id="'+rt.id+'" data-tokens="'+ rt.nama_rt +'" value="'+ rt.nama_rt +'">'+ rt.nama_rt +'</option>');
                  });  
                $('#f1-rt').selectpicker('refresh');        
            });
        }
      });



    });

jQuery(document).ready(function() {

	
    /*
        Fullscreen background
    */
    $.backstretch("assets/img/backgrounds/1.jpg");
    
    $('#top-navbar-1').on('shown.bs.collapse', function(){
    	$.backstretch("resize");
    });
    $('#top-navbar-1').on('hidden.bs.collapse', function(){
    	$.backstretch("resize");
    });
    
    /*
        Form
    */
    $('.f1 fieldset:first').fadeIn('slow');
    
    $('.f1 input[type="text"], .f1 input[type="password"], .f1 input[type="date"], .f1 input[type="radio"], .f1 textarea, .f1 select').on('focus', function() {
    	$(this).removeClass('input-error');
    });
    
    PendudukPekerjaanLoads();
    PendudukProvinsiLoads();

    // next step
    $('.f1 .btn-next').on('click', function() {
    	var parent_fieldset = $(this).parents('fieldset');
    	var next_step = true;
    	// navigation steps / progress steps
    	var current_active_step = $(this).parents('.f1').find('.f1-step.active');
    	var progress_line = $(this).parents('.f1').find('.f1-progress-line');
    	
    	// fields validation
    	parent_fieldset.find('.inputan-wizard').each(function() {
            console.log($(this).val());
    		if( $(this).val() == "" ) {
    			$(this).addClass('input-error');
    			next_step = false;
    		}
    		else {
    			$(this).removeClass('input-error');
    		}
    	});
    	// fields validation
    	
    	if( next_step ) {
    		parent_fieldset.fadeOut(400, function() {
    			// change icons
    			current_active_step.removeClass('active').addClass('activated').next().addClass('active');
    			// progress bar
    			bar_progress(progress_line, 'right');
    			// show next step
	    		$(this).next().fadeIn();
	    		// scroll window to beginning of the form
    			scroll_to_class( $('.f1'), 20 );
	    	});
    	}
    	
    });
    
    // previous step
    $('.f1 .btn-previous').on('click', function() {
    	// navigation steps / progress steps
    	var current_active_step = $(this).parents('.f1').find('.f1-step.active');
    	var progress_line = $(this).parents('.f1').find('.f1-progress-line');
    	
    	$(this).parents('fieldset').fadeOut(400, function() {
    		// change icons
    		current_active_step.removeClass('active').prev().removeClass('activated').addClass('active');
    		// progress bar
    		bar_progress(progress_line, 'left');
    		// show previous step
    		$(this).prev().fadeIn();
    		// scroll window to beginning of the form
			scroll_to_class( $('.f1'), 20 );
    	});
    });
    
    // submit
    $('.f1').on('submit', function(e) {
    	
    	// fields validation
    	$(this).find('input[type="text"], input[type="password"], textarea').each(function() {
    		if( $(this).val() == "" ) {
    			e.preventDefault();
    			$(this).addClass('input-error');
    		}
    		else {
    			$(this).removeClass('input-error');
    		}
    	});
    	// fields validation

        $(this).find(".input-error").html('');
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
                     status = "<div class='alert alert-danger'><ul>";
                    for (control in data.errors) {
                        status += "<li>"+data.errors[control]+"</li>";
                    }
                    status += "</ul></div>";
                    $("#status").html(status);
                } else {
                    $('#modal-penduduk').modal('hide');
                    pendudukTable.draw();
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                alert("Error: " + errorThrown);
            }
        });
        return false;
    	
    });
    
    
});

function ajaxPendudukDelete(filename, token, content) {
    content = typeof content !== 'undefined' ? content : 'content';
    pendudukTable.draw();
    $.ajax({
        type: 'POST',
        data: {_method: 'DELETE', _token: token},
        url: filename,
        success: function (data) {
            $('#modalDelete-penduduk').modal('hide');
            $("#" + content).html(data);
            pendudukTable.draw();
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}

 $('#modalDelete-penduduk').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      $('#penduduk_delete_id').val(button.data('id'));
      $('#penduduk_delete_token').val(button.data('token'));
  });

 $('#modalAktifKtp-penduduk').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      $('#penduduk_aktif_id').val(button.data('id'));
      $('#penduduk_aktif_token').val(button.data('token'));
      $.ajax({
            url:"/admin/fetchDataPenduduk/"+button.data('id'),
            method:'get',
            dataType:'json',
            success:function(data)
            {
                $('#aktif-ktp-nik').val(data[0].nik);
                $('#aktif-ktp-nama').val(data[0].nama);
                $('#aktif-ktp-nomer_telepon').val(data[0].nomer_telepon);
            }
      });
  });

 function ajaxPendudukAktifKtp(filename, token, content)
 {
  content = typeof content !== 'undefined' ? content : 'content';
    pendudukTable.draw();
    $.ajax({
        type: 'POST',
        data: {_method: 'POST', _token: token},
        url: filename,
        success: function (data) {
            $('#modalAktifKtp-penduduk').modal('hide');
            pendudukTable.draw();
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });
 }
