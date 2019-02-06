
<div class="" style="max-width: 70%; margin: 10px auto;">
    <div style="margin: 30px auto" class="text-center"><i class="fa fa-user-alt" style="text-shadow: 3px 5px 8px;  font-size: 70px; color: #1b351d; padding: 30px; background-color: #FFFFFF; border-radius: 70px"></i></div>
    <h3 class="page-header text-center" style="background-color: #FFFFFF; padding: 15px; margin: 10px 0; font-weight: 900; text-shadow:1px 2px 3px;  color: #1b351d;">AUTHENTIFICATION</h3>
    <form  style="margin: 20px auto; max-width: 99.9%; padding: 20px" method="post">
        <input type="hidden" name="_csrfToken" value="<?= $token ?>"/>
        <div style="background-color: #FFFFFF" class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label class="control-label" style="color:#1b351d; text-shadow: 1px 0 1px; font-weight: 700" for="phone">EMAIL :</label>
                    <input type="email" class="form-control"  name="email" />
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label class="control-label" style="color:#1b351d; text-shadow: 1px 0 1px; font-weight: 700" for="password">MOT DE PASSE :</label>
                    <input type="password" class="form-control" id="password" name="password" />
                </div>
            </div>

        </div>
        <div class="div-btn">
            <button type="submit" class="btn btn-success btn-block"> <i class="fa fa-door-open"></i> SE CONNECTER</button>
        </div>


    </form>
</div>
