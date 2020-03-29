function show1(){
document.getElementById('div1').style.display ='none';
  document.getElementById("phone").required = false;
  document.getElementById("shop_name").required = false;
  document.getElementById("shop_address").required = false;

}
function show2(){
  document.getElementById('div1').style.display = 'block';
  document.getElementById("phone").required = true;
  document.getElementById("shop_name").required = true;
  document.getElementById("shop_address").required = true;

}
