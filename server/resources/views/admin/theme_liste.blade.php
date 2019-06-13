@extends('layouts.admin')
@section('content')
    <h1>THEMES</h1>
<hr>
<table class="table">
    <thead class="thead-inverse">
    <tr>
    <th>NUM</th>
       <th>Theme</th>
       <th>Nombre de question </th>
       <th class="text-center" width="300px">
         <a href="#" class="create-modal btn btn-success btn-sm">
          <i class="glyphicon glyphicon-plus"></i>
         </a>
         <a href="#" class="public-modal btn btn-primary btn-sm">
          PUBLIER THEME
         </a>
       </th>
    </tr>
    </thead>
    <tbody>
      {{csrf_field()}}
      <?php $n=1; ?>
      @if($theme_en_ligne)
      <tr class="success theme{{$theme_en_ligne->id}}">
         <th> {{$n++}}
         </th>
         <th> 
         {{$theme_en_ligne->titre}}
         </th>
         <th>
          10
         </th>
         <th>
          <a href="#" class="show-modal btn btn-info btn-sm" data-id="{{$theme_en_ligne->id}}" data-titre="{{$theme_en_ligne->titre}}" data-resume="{{$theme_en_ligne->resume}}" data-date="{{$theme_en_ligne->date_publication}}">
          <i class='fa fa-eye'></i>
          </a>
          <a href="#" class="edit-modal btn btn-warning btn-sms" data-id="{{$theme_en_ligne->id}}" data-titre="{{$theme_en_ligne->titre}}" data-resume="{{$theme_en_ligne->resume}}" data-date="{{$theme_en_ligne->date_publication}}" >
            <i class="glyphicon glyphicon-pencil"></i>
          </a>
          <a href="#" class="archive-modal btn btn-success btn-sms" data-id="{{$theme_en_ligne->id}}" data-titre="{{$theme_en_ligne->titre}}" >
            <!--<i class="glyphicon glyphicon-trash"></i> -->
            <i class="fa fa-archive" aria-hidden="true"></i>
          </a>
         </th>
            </tr>
            @endif
      @foreach($theme as $key => $value)
     <tr class=" theme{{$value->id}}">
         <th> {{$n++}}
         </th>
         <th> 
         {{$value->titre}}
         </th>
         <th>
          10
         </th>
         <th>
          <a href="#" class="show-modal btn btn-info btn-sm" data-id="{{$value->id}}" data-titre="{{$value->titre}}" data-resume="{{$value->resume}}" data-date="{{$value->date_publication}}">
          <i class='fa fa-eye'></i>
          </a>
          <a href="#" class="edit-modal btn btn-warning btn-sms" data-id="{{$value->id}}" data-titre="{{$value->titre}}" data-resume="{{$value->resume}}" data-date="{{$value->date_publication}}" >
            <i class="glyphicon glyphicon-pencil"></i>
          </a>
          <a href="#" class="delete-modal btn btn-danger btn-sms" data-id="{{$value->id}}" data-titre="{{$value->titre}}" >
            <i class="glyphicon glyphicon-trash"></i>
          </a>
         </th>
            </tr>
            @endforeach
    </tbody>
</table>
   @include('include/modaltheme_add')
   @include('include/showtheme')
   <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <div class="loader hidden">
    </div>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 claas="modal-title"></h4>
            </div>
            <div class="modal-body">
            <!--formulaire utiliser pour la mise a jour d'un theme et sa supression -->
            <form class="form-horizontal" method="POST" role="form" id="myform">
                        {{ csrf_field() }}
                    
                      <p class=" text-center alert alert-danger hidden" id="error2"></p>
                        <div class="form-group{{ $errors->has('theme_titre') ? ' has-error' : '' }} row add">
                            <label for="name" class="control-label col-sm-2">ID theme</label>
                            <div class="col-sm-10">
<input id="fid" type="text" class="form-control" disabled >
               
                <p class="error text-center alert alert-danger hidden" ></p>                               
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('theme_titre') ? ' has-error' : '' }} row add">
                            <label for="name" class="control-label col-sm-2">Titre theme</label>
                            <div class="col-sm-10">
<input id="ti" type="name" class="form-control" name="theme_titre">
                <p class="error text-center alert alert-danger hidden" ></p>                               
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('theme_date') ? ' has-error' : '' }}">
                            <label for="theme_titre"class="control-label col-sm-2">Date de publication</label>

                            <div class="col-sm-10">
                                <input id="datepicker2" type="text" class="form-control"  value="{{ old('theme_date') }}" name='date' required>

                                <p class="error text-center alert alert-danger hidden"></p>
                                                           </div>
                        </div>
                        <div class="form-group">
                            <label for="resume" class="control-label col-sm-2">Resume du theme</label>

                            <div class="col-sm-10">
                                <textarea name="resume" id="fre" class="form-control" rows="5" value="{{ old('resume') }}" required></textarea>
                                <p class="error text-center alert alert-danger hidden" ></p>
                            </div>
                        </div>
                    </form>
                    {!! success_validate("modification reussi") !!}
                    <div class="deletecontent">
                        Est voua sure de suprimer <span class="titre"></span>
                        <span class="hidden id"></span>
                    </div>
                <div class="modal-footer">
                    <button type="buttton" class="btn actionBtn">
                        <span id="footer_action_button" class="glyphicon"></span>
                    </button>
                    <button type="buttton" id="closeupdate" class="btn btn-warning" data-dismiss="modal">
                        <span class="glyphicon glyphicon"></span>fermer
                    </button>
                </div>
        </div>
    </div>
</div>
@endsection
@section('monjs')
 <script>
     $('#ulmenu').show();
 </script>
 <script>
     $(document).on('click','.create-modal',function()
     {
         $('#create').modal('show');
         $('.form-horizontal').show();
         $('#themepubli').addClass('hidden')
         $('#divdate').removeClass('hidden')
         $('#add').removeClass('hidden')
         $('.modal-title').text('sauveguarder theme');
             }
     );
     $(document).on('click','.public-modal',function()
     {
        
        $('#create').modal('show');
        $('#divdate').addClass('hidden');
        $('#add').addClass('hidden')
        $('#themepubli').removeClass('hidden')
         $('.modal-title').text('Publication de theme');  
     }
     )
     //ajout de theme et mise en brouillon (theme_publi permet de savoir si c'est une publication ou un enregistrement de theme)
     $('#add').click(function()
          {
            var myForm = document.getElementById('myform1');
            formData = new FormData(myForm);
            formData.append('theme_publi',1)
            $("#error").text(" ")
            $("#error").addClass('hidden')
            $.ajax(
          {
              type: 'POST',
              url: 'addTheme',
             data: formData,
             dataType: 'JSON',
                contentType:false,
                cache:false,
                processData:false,
                beforeSend:function(){
                $(".modal-content").hide()
                $(".loader").removeClass('hidden')
             },
             complete: function(){
              $('.loader').addClass('hidden')
              $(".modal-content").show()
             },
              success: function(data){
                         if((data.errors))
                           {
                        $.each(data.errors, function(key,value){
                            $('#error').removeClass('hidden')
                        $('#error').append(value) 
                        })
                  }
                  else{

                $('.error').remove();
                $('.table').append("<tr class='theme"+ data.id+"'>"+"<th>"+data.id+"</th>"
                +"<th>"+data.titre+"</th>"+"<th>10</th>"+"<th><a href='#' class='show-modal btn btn-info btn-sm' data-id='"+data.id+"' data-titre='"+data.titre+"' >"+"<i class='fa fa-eye'></i></a>"
                +"<a href='#' class='edit-modal btn btn-warning btn-sm' data-id='"+data.id+"' data-titre='"+data.titre+"' >"+"<i class='glyphicon glyphicon-pencil'></i></a>"
                +"<a href='#' class='delete-modal btn btn-danger btn-sm' data-id='"+data.id+"' data-titre='"+data.titre+"' >"+"<i class='glyphicon glyphicon-trash'></i></a>"+
                "</th></tr>");
                  //$('#create').modal('hide');
                 $('.form-horizontal').hide();
                 $("#id_success").removeClass('hidden')
                 $('.modal-footer').hide()
                  }
              },
          }
            );
           $("#titre").val();
           $('#resume').val();
          }); 
          //publication et mise en ligne d'un theme
          $('#themepubli').click(function()
             {
                $('#error').text(' ')
                var myForm = document.getElementById('myform1');
                formData = new FormData(myForm);
                $.ajax(
          {
              type: 'POST',
              url: 'addTheme',
              data:  formData,
              dataType: 'JSON',
              contentType:false,
              cache:false,
              processData:false,
              beforeSend:function(){
                $(".modal-content").hide()
                $(".loader").removeClass('hidden')
             },
             complete: function(){
              $('.loader').addClass('hidden')
              $(".modal-content").show()
             },
              success: function(data){
                         if((data.errors))
                           {
                        $.each(data.errors, function(key,value){
                            $('#error').removeClass('hidden')
                        $('#error').append(value) 
                        })
                           }
            else{
                $('.error').remove();
                $('.table').append("<tr class='theme"+ data.id+"'>"+"<th>"+data.id+"</th>"
                +"<th>"+data.titre+"</th>"+"<th>10</th>"+"<th><a href='#' class='show-modal btn btn-info btn-sm' data-id='"+data.id+"' data-titre='"+data.titre+"' >"+"<i class='fa fa-eye'></i></a>"
                +"<a href='#' class='edit-modal btn btn-warning btn-sm' data-id='"+data.id+"' data-titre='"+data.titre+"' >"+"<i class='glyphicon glyphicon-pencil'></i></a>"
                +"<a href='#' class='delete-modal btn btn-danger btn-sm' data-id='"+data.id+"' data-titre='"+data.titre+"' >"+"<i class='glyphicon glyphicon-trash'></i></a>"+
                "</th></tr>");
                  alert('ENREGISTREMENT TERMINER')
                  $('#create').modal('hide');
         $('.form-horizontal').hide();
            }
              },
          })
              
             })
          //vue modal
          $(document).on('click','.show-modal',function(){
              var titre = $(this).data('titre');
              var date = $(this).data('date');
              var resume = $(this).data('resume');
             $('#show').modal('show');
             $("#myarchive").addClass('hidden');
             $('#archives').addClass('hidden')
             $('.modal-titre').text('show-theme');
             $('#show-modal').append("<div id='contentshow'><p>TITRE: "+titre+"</p><p>RESUME: "+resume+"</p><p>Status du theme:</p></div>");
          });
          $(document).on('click','.edit-modal',function(){
   $("#footer_action_button").text('Mise a jour Theme');
    $("#footer_action_button").addClass('glyphicon-check');
    $("#footer_action_button").removeClass('glyphicon-trash');
    $(".actionBtn").addClass('btn-success');
    $(".actionBtn").removeClass('btn-danger');
    $(".actionBtn").addClass('edit');
    $(".modal-titre").text('Edition theme');
    $(".deletecontent").hide();
    $("#myModal").modal('show');
   $(".form-horizontal").show();
    $("#fid").val($(this).data('id'));
    $("#ti").val($(this).data('titre'));
    $("#fre").val($(this).data('resume'));
    $("#datepicker2").val($(this).data('date'));
          });
        //mise a jour theme
          $('.modal-footer').on('click','.edit',function(){
            $('#error2').text(' ')
              $.ajax({
                  type: 'POST',
                  url: 'themeUpdate',
                  data: {
                '_token' : $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'titre': $("#ti").val(),
                'resume': $("#fre").val(),
                 'date': $("input[name=date]").val(),
                  },
                  beforeSend:function(){
                $(".modal-content").hide()
                $(".loader").removeClass('hidden')
             },
             complete: function(){
              $('.loader').addClass('hidden')
              $(".modal-content").show()},
                  success: function(data){
                      if((data.errors))
                        {
                            $.each(data.errors, function(key,value){
                            $('#error2').removeClass('hidden')
                        $('#error2').append(value) 
                        })
                        }else{
                            $("#myModal").modal('hide');
                            $('.theme'+data.id).replaceWith(" "+
                    "<tr class='theme"+data.id+"' ><th>"+data.id+"</th>"+"<th>"+data.titre+"</th>"+"<th>10</th>"+"<th><a href='#' class='show-modal btn btn-info btn-sm' data-id='"+data.id+"' data-titre='"+data.titre+"' >"+"<i class='fa fa-eye'></i></a>" +"<a href='#' class='edit-modal btn btn-warning btn-sm' data-id='"+data.id+"' data-titre='"+data.titre+"' data-resume='"+data.resume+"' data-date='"+data.date_publication+"' >"+"<i class='glyphicon glyphicon-pencil'></i></a>"
                +"<a href='#' class='delete-modal btn btn-danger btn-sm' data-id='"+data.id+"' data-titre='"+data.titre+"' >"+"<i class='glyphicon glyphicon-trash'></i></a>"+
                "</th></tr>"
                    )
                        }
                  }
              });
          });
           $(document).on('click','.archive-modal',function(){
            $('#show').modal('show');
            $("#myarchive").removeClass('hidden');
            $('#archives').removeClass('hidden')
            var titre = $(this).data('titre')
           // var titre = $(this).data('titre');
            var id = $(this).data('id')
            $('#numarchive').text(id)
            $('#idarchive').append(id);
           })
           $('#archives').click(function()
           {
            var id =$('#numarchive').text()
            $.ajax({
                   type: 'POST',
                   url: 'archivertheme',
                   data: {
                    '_token' : $('input[name=_token]').val(),
                    'id': $('#numarchive').text(),
                   },
                   success: function(data){
                    $('.theme'+$('.id').text()).remove()
                    $('#show').modal('hide')
                    alert('theme archiver')
                   }

               })
           });
           $(document).on('click','.delete-modal',function(){
                           $('#footer_action_button').text("SUPRIMER");
                           $('#footer_action_button').removeClass('glyphicon-check')
                           $('#footer_action_buttton').addClass('glyphicon-trash');
                           $('.actionBtn').removeClass('btn-success')
                           $('.actionBtn').addClass('btn-danger')
                           $('.actionBtn').addClass('delete')
                           $('.modal-title').text('Supression Theme')
                           $('.id').text($(this).data('id'))
                           $('.deletecontent').show()
                           $('.form-horizontal').hide()   
                           $('.titre').html($(this).data('titre'))
                           $("#myModal").modal('show')                
           })
           $('.modal-footer').on('click','.delete',function(){
               $.ajax({
                   type: 'POST',
                   url: 'deleteTheme',
                   data: {
                    '_token' : $('input[name=_token]').val(),
                    'id': $('.id').text(),
                   },
                   success: function(data){
                    $('.theme'+$('.id').text()).remove()
                   }

               })
           })
          $(document).on('click','#closeshow',function(){
            $('#contentshow').remove();
          });
          $(document).on('click','#closeupdate',function(){
              $("#error2").hide()
          })
          $("#cancel_modal").click(function(){
              $('#error').addClass('hidden')
              $("#error").text(' ')
              $("#myform1")[0].reset()
              $("#myform")[0].reset()
          })
  </script>
@endsection