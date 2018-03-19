var StartSlide = 1;


showSlides(StartSlide);


//Naar rechts en naar links scrollen
function PlusSlide(Var) {
  showSlides(StartSlide += Var);
}

function showSlides(Var) {
  var ClassSlide = document.getElementsByClassName("Slides");
  var i;

  //Terug naar 1 als de slides op zijn
  if (Var > ClassSlide.length) {
    StartSlide = 1;
    }    

  //Als de start slide kleiner als 1 is dan moet je terug naar de laatste
  if (Var < 1) {
    StartSlide = ClassSlide.length;
  }

  //Zet de slides op onzichtbaar
  for (i = 0; i < ClassSlide.length; i++) {
     ClassSlide[i].style.display = "none";  
  }

  //de slide die wel moet worden vertoont word hier aangeroepen.
  ClassSlide[StartSlide-1].style.display = "block";  
}

