window.onload = function() {
	galeriiSisu=document.getElementById('galerii');
	if (galeriiSisu != null) {
		pildid=galeriiSisu.getElementsByTagName("img");
		for (i=0; i<pildid.length; i++){
			pildid[i].onclick=function(){
				showDetails(this);
				return false;
			}
		}		
	}
}

function showDetails(el){
	hoidja=document.getElementById('hoidja');
	if (hoidja !=null) {
		suurpilt=document.getElementById("suurpilt");
		suurpilt.src=el.parentNode.href;
		suurpilt.onload=function(){
			suurus(this);
		}
		document.getElementById("inf").innerHTML=el.alt;
		hoidja.style.display="initial";
	}		
}

function hideDetails(el){
	hoidja=document.getElementById('hoidja');
	hoidja.style.display="none";	
}

window.onresize=function() {
	suurpilt=document.getElementById("suurpilt");
	suurus(suurpilt);
}

function suurus(el){
  el.removeAttribute("height"); // eemaldab suuruse
  el.removeAttribute("width");
  if (el.width>window.innerWidth || el.height>window.innerHeight){  // ainult liiga suure pildi korral
    if (window.innerWidth >= window.innerHeight){ // lai aken
      el.height=window.innerHeight*0.9; // 90% kõrgune
      if (el.width>window.innerWidth){ // kas element läheb ikka üle piiri?
        el.removeAttribute("height");
        el.width=window.innerWidth*0.9;
      }
    } else { // kitsas aken
      el.width=window.innerWidth*0.9;   // 90% laiune
      if (el.height>window.innerHeight){ // kas element läheb ikka üle piiri?
        el.removeAttribute("width");
        el.height=window.innerHeight*0.9;
      }
    }
  }
}