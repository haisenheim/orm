


<div class="" style="margin-top: 3%">
    <div class="container" >
        <div class="">

            <div style="max-width: 35%; margin-left: auto; margin-right: auto; border: solid lightblue 1px; border-radius: 5px; box-shadow: 0 8px 15px darkslategrey; padding: 30px; padding-top: 25px;" >


                <h3 class="page-header">Authentification</h3>

                <form name="login" role="form" class="form-horizontal" method="post" accept-charset="utf-8" >
                    <input name="_csrfToken" type="hidden" value="<?= $token?$token:'' ?>"/>
                    <label for="username">ADRESSE EMAIL :</label>
                    <input style="border: 1px solid #ccc; border-radius: 4px;" name="email"  id="username" class="form-control" placeholder="ex: clementessomba@ormsys.com"/>
                    <hr/>
                    <label for="password">MOT DE PASSE :</label>
                    <input style="border: 1px solid #ccc; border-radius: 4px;" name="password"  id="password" type="password"  class="form-control" placeholder="Mot de passe"/>
                    <hr/>
                    <div class="text-center" style="font-weight: bold">
                        <button class="btn btn-success btn-sm" type="submit">ENTRER &nbsp;<i class="glyphicon glyphicon-open"></i> </button>
                    </div>
                </form>

            </div>


        </div>
    </div>
</div>