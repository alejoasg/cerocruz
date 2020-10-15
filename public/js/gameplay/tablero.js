$(function (){
    $('[data-turno]').on('click',MostrarXoCero)
});
function MostrarXoCero() {
   var turno= $(this).data('turno');
   if(turno==1)
   {
       $(this).val('X');
   }else
   {
       $(this).val('O');
   }
}
