function numeros(caracter){
      var nTecla = 0;
      if (document.all) {
          nTecla = caracter.keyCode;
      } else {
          nTecla = caracter.which;
      }
      if ((nTecla> 47 && nTecla <58)
      || nTecla == 8 || nTecla == 127
      || nTecla == 0 || nTecla == 9  // 0 == Tab
      || nTecla == 13) { // 13 == Enter
          return true;
      } else {
          return false;
      }
}
