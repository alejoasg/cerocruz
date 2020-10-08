$(function (){
    $('[data-turno]').on('click',MostrarXoCruz)
});
function MostrarXoCruz() {
   var turno= $(this).data('turno');
   if(turno==1)
   {
       $(this).children().attr("src","");
   }
}