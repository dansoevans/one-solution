function goBack(){
    window.history.back();

}

function promptHandler(){
    var prompter = confirm( "      " + " DELETE ITEM \n  Do you want to delete item ? \n Deleting item is permanent and irrevisible ");
if(prompter == false){
  event.preventDefault();
}
  return prompter;
}
// swal({
//   title: "Are you sure?",
//   text: "Once deleted, you will not be able to recover this imaginary file!",
//   icon: "warning",
//   buttons: true,
//   dangerMode: true,
// })
// .then((willDelete) => {
//   if (willDelete) {
//     swal("Poof! Your imaginary file has been deleted!", {
//       icon: "success",
//     });
//   } else {
//     swal("Your imaginary file is safe!");
//   }
// });

var rr = document.getElementById('hider');
let a;
function doIt(){
  if(a==1){
    rr.style.display = "inline";
    return a=0;
  }else{
    rr.style.display = "none";
    return a =1;

  }
}


$(".color").on("change", function () {
  $(".color").not(this).prop("checked", false);
});
$(document).ready(function(){
/* by default hide all radio_content div elements except first element */
$(".content .radio_content").hide();
$(".content .radio_content:first-child").show();

/* when any radio element is clicked, Get the attribute value of that clicked radio element and show the radio_content div element which matches the attribute value and hide the remaining tab content div elements */
$(".radio_wrap").click(function(){
  var current_raido = $(this).attr("data-radio");
  $(".content .radio_content").hide();
  $("."+current_raido).show();
})
});
 
