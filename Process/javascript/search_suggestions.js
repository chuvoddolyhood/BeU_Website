function ketqua(str) {
  if (str.length==0) {
    document.getElementById("ketquatk").innerHTML="";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("ketquatk").innerHTML=this.responseText;      
    }
  }
  xmlhttp.open("GET","search_suggestions.php?kq="+str,true);
  xmlhttp.send();
}