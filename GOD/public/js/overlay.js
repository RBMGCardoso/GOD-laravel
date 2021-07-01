function overlayCard(tipo, titulo, mensagem)
{  
    console.log('coq');
    $('#overlay').css('display', 'flex');

    //Animação onde o card sobe
    document.getElementById('cardConfirm').style.animation = "cardAppear 0.4s linear 1";

    $('#headerCard').html(titulo);
    $('#mensagem').html(mensagem);

    if(tipo == 'Confirm')
    {
        $('#buttonSim').removeAttr('hidden');
    }
    else if(tipo == 'Aviso')
    {
        $('#buttonSim').attr('hidden','hidden');
    }
}

function closeOverlayCard()
{  
  //Animação onde o card desce
  document.getElementById('cardConfirm').style.animation = "cardDisappear 0.3s linear 1";

  //Volta a esconder o overlay
  setTimeout(() => {
    document.getElementById('overlay').style.display = "none";
  }, 200);
}