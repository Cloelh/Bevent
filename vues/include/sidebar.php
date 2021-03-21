<div class="right col-4 border-start border-1">
    <div class="newsletter p-5 d-flex flex-column justify-content-center">
        <p>s'inscrire à notre newlette</p>
        <form action="?action=addMail" method="POST" class="d-flex">
            <input placeholder="votre mail ici" type="mail" id="mail" name="mail" class="rounded-pill border-1 p-1">
            <button type="submit"><img src="images/send.svg" width="30px" alt=""></button>
        </form>
    </div>
    <a href="https://labo.fnac.com/actualite/rocket-lake-s-intel-officialise-11e-generation-processeurs-core-pc-bureau/" 
        target="_BLANK" class="pub pub1 m-2 border border-1 d-flex align-items-center justify-content-center"></a>
    <a href="https://images.unsplash.com/photo-1491933382434-500287f9b54b?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" 
        target="_BLANK" class="pub pub2 m-2 border border-1 d-flex align-items-center justify-content-center"></a>
    <a href="https://images.unsplash.com/photo-1598368518818-f7c79b6d982f?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1653&q=80" 
        target="_BLANK" class="pub pub3 m-2 border border-1 d-flex align-items-center justify-content-center"></a>
    <a href="https://labo.fnac.com/actualite/rocket-lake-s-intel-officialise-11e-generation-processeurs-core-pc-bureau/" 
        target="_BLANK" class="pub pub4 m-2 border border-1 d-flex align-items-center justify-content-center"></a>
</div>

<a href="#" data-bs-toggle="modal" data-bs-target="#proposition" class="link plus d-flex align-items-center"><img class="me-3" width="50px" src="images/plus.svg"> <p class=" bg-light p-1 rounded-pill">Tu as une question? une proposition?</p> </a>

<!-- Modal -->
<div class="modal fade" id="proposition" tabindex="-1" aria-labelledby="propositionLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="propositionLabel">Ecris-nous! :)</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="?action=sendMessage" method="POST">
            
            <div class="form-group">
            <label for="message">Votre message : </label>
              <textarea class="form-control" name="message" id="message" rows="3"></textarea>
            </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="button">Envoyer</button>
      </div>
      </form>
    </div>
  </div>
</div>