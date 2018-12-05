document.getElementById('login').addEventListener('click',Login)

function Login(){
	var xhtr = new XMLHttpRequest();
	xhr.open("GET", "Dashboard.html", true);
	 xhr.onload=function(){
		 if(this.status==200){
		document.getElementById("form").innerHTML = this.responseText;
		 }
    }
  }
  
  xhr.send();

}