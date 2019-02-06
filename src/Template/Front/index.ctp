
<div class="" style="margin-top: 0">
    <div class="container-fluid" >
        <div class="">

            <div style="" >


                <div class="row">
                    <div class="col-lg-6 col-sm-12 col-md-6">
                        <P>Ici nous pouvons:</P>
                        <ul>
                            <li>

                                <p>
                                    Consulter les programmes de voyages en fonction de :
                                </p>
                                <ul>
                                    <li>des trajets</li>
                                    <li>des jours</li>
                                    <li>des compagnies</li>
                                </ul>

                            </li>

                            <li>Reserver une place dans un voyage</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-md-6">
                        <div id="map" style="position: static;">

                        </div>
                    </div>
                </div>


            </div>


        </div>
    </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=
AIzaSyCeIyax39S5O--tJXzXnDv-fpSbTIaXtMA
&callback=initMap" async defer></script>
<script>

    var map; function initMap() {
        map = new google.maps.Map(document.getElementById('map'), { center: {lat: 6.556056 , lng: 13.112482}, zoom: 7 }); }
</script>
<style>
   #map { height: 500px ;}
   /* Optional: Makes the sample page fill the window. */

</style>