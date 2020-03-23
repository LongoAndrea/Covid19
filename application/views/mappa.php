        <main>
            <div>
                <div id="mapid" class="siimple--ml-3"></div>
            </div>

            <script>
                var json = <?php echo $data ?>;
                var data = JSON.parse(json);  
                var Cerchi = [];          
                var da = new Date();
                var str = da.toISOString().substring(0, 10);
                var ieri = new Date((da.setDate(da.getDate()-1)));
                var strieri = ieri.toISOString().substring(0, 10);
                

                var mymap = L.map('mapid').setView([42, 13], 6.4);
                L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiYmVwaTA5IiwiYSI6ImNrODMwM2wwazAxODUzb281bmF1aGVmazgifQ.GBZxcndmmhgJCGHANBKRmg', {
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                    maxZoom: 18,
                    id: 'mapbox/streets-v11',
                    tileSize: 512,
                    zoomOffset: -1,
                    accessToken: 'pk.eyJ1IjoiYmVwaTA5IiwiYSI6ImNrODMwM2wwazAxODUzb281bmF1aGVmazgifQ.GBZxcndmmhgJCGHANBKRmg'
                }).addTo(mymap);

                function loadData() {
                    Cerchi.forEach(circle => map.removeLayer(circle));
                    data.forEach(d => {
                        if (d.data.substring(0, 10) == str || d.data.substring(0, 10) == strieri ) { 
                            Cerchi.push(L.circle([d.lat, d.long], { radius: (5 * d.totale_casi), color: "#ff0000" }).addTo(mymap));
                        }

                    });
                }
            </script>
        </main>
    </body>
</html>