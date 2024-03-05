$(document).ready(function(){
// menghilangkan tomcol cari
  $('#cari').hide();
// event ketika keyword ditulis
  $('#keyword').on('keyup',function(){

    // munculkan icon 
    $('.loader').show();

  //   $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());
  // });

    // $GET
    $.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(),function(data){

      $('#container').html(data);
      $('.loader').hide();

    });
  });

});

