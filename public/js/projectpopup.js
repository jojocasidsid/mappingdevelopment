
var mangrove = L.markerClusterGroup();

var renewableEnergy = L.markerClusterGroup();

var microHydroPowerplant  = L.markerClusterGroup();

var reforestation = L.markerClusterGroup();

var sustainableAgriculture = L.markerClusterGroup();

var urbanAgriculture = L.markerClusterGroup();

var urbanEnvironment = L.markerClusterGroup();


var allmarkers = L.markerClusterGroup();

  var mangroveicon = L.icon({
    iconUrl: '/img/iconsMapSvg/mangroveRehabilitation.svg',
    
    iconSize:     [40, 40], // size of the icon
     // size of the sh
    iconAnchor:   [20, 40], // point of the icon which will correspond to marker's location
    popupAnchor:  [0, -40] // point from which the popup should open relative to the iconAnchor
});

  var islandManagement = L.icon({
    iconUrl: '/img/iconsMapSvg/islandManagement.svg',
    
    iconSize:     [40, 40], // size of the icon
     // size of the sh
    iconAnchor:   [20, 40], // point of the icon which will correspond to marker's location
    popupAnchor:  [0, -40] // point from which the popup should open relative to the iconAnchor
});

  var reforestationicon = L.icon({
    iconUrl: '/img/iconsMapSvg/reforestationProjects.svg',
    
    iconSize:     [40, 40], // size of the icon
     // size of the sh
    iconAnchor:   [20, 40], // point of the icon which will correspond to marker's location
    popupAnchor:  [0, -40] // point from which the popup should open relative to the iconAnchor
});


  var renewableenergyicon = L.icon({
    iconUrl: '/img/iconsMapSvg/renewableEnergy.svg',
    
    iconSize:     [40, 40], // size of the icon
     // size of the sh
    iconAnchor:   [20, 40], // point of the icon which will correspond to marker's location
    popupAnchor:  [0, -40] // point from which the popup should open relative to the iconAnchor
});

  var sustainableagricultureicon = L.icon({
    iconUrl: '/img/iconsMapSvg/sustainableAgriculture.svg',
    
    iconSize:     [40, 40], // size of the icon
    // size of the sh
   iconAnchor:   [20, 40], // point of the icon which will correspond to marker's location
   popupAnchor:  [0, -40] // point from which the popup should open relative to the iconAnchor
});

  var urbanagricultureicon = L.icon({
    iconUrl: '/img/iconsMapSvg/urbanAgriculture.svg',
    
    iconSize:     [40, 40], // size of the icon
     // size of the sh
    iconAnchor:   [20, 40], // point of the icon which will correspond to marker's location
    popupAnchor:  [0, -40] // point from which the popup should open relative to the iconAnchor
});

  var urbanenvironmenticon = L.icon({
    iconUrl: '/img/iconsMapSvg/urbanEnvironment.svg',
    
    iconSize:     [40, 40], // size of the icon
     // size of the sh
    iconAnchor:   [20, 40], // point of the icon which will correspond to marker's location
    popupAnchor:  [0, -40] // point from which the popup should open relative to the iconAnchor
});


var popup = L.popup();

    var projects = L.geoJSON(projectlist, {

        style : function(feature){
            return{
                color: '#000',
                weight: 0.5
            }
        },
    //    pointToLayer: function(feature, latlng){
    //        switch(feature.properties.category){
    //         case 'Micro Hydro Powerplant': return L.marker(latlng,{
    //            icon: microhydropowerplanticon
    //        }).addTo(microHydroPowerplant);
    //        case 'Mangrove': return L.marker(latlng,{
    //            icon: mangroveicon
    //        }).addTo(mangrove);
    //        case 'Reforestation': return L.marker(latlng,{
    //            icon: reforestationicon
    //        }).addTo(reforestation);
    //        case 'Renewable Energy': return L.marker(latlng,{
    //            icon: renewableenergyicon
    //        }).addTo(renewableEnergy);
    //        case 'Sustainable Agriculture': return L.marker(latlng,{
    //            icon: sustainableagricultureicon
    //        }).addTo(sustainableAgriculture);
    //        case 'Urban Agriculture': return L.marker(latlng,{
    //            icon: urbanagricultureicon
    //        }).addTo(urbanAgriculture);
    //        case 'Urban Environment': return L.marker(latlng,{
    //            icon: urbanenvironmenticon
    //        }).addTo(urbanEnvironment);
    //     }
    //    },

    pointToLayer: function(feature, latlng){
        switch(feature.properties.category){
         case 'Island Management': return L.marker(latlng,{
            icon: islandManagement
        }).addTo(allmarkers);
        case 'Mangrove Rehabilitation': return L.marker(latlng,{
            icon: mangroveicon
        }).addTo(allmarkers);
        case 'Reforestation Projects': return L.marker(latlng,{
            icon: reforestationicon
        }).addTo(allmarkers);
        case 'Renewable Energy': return L.marker(latlng,{
            icon: renewableenergyicon
        }).addTo(allmarkers);
        case 'Sustainable Agriculture': return L.marker(latlng,{
            icon: sustainableagricultureicon
        }).addTo(allmarkers);
        case 'Urban Agriculture': return L.marker(latlng,{
            icon: urbanagricultureicon
        }).addTo(allmarkers);
        case 'Urban Environment': return L.marker(latlng,{
            icon: urbanenvironmenticon
        }).addTo(allmarkers);
     }
    },

       onEachFeature: function(feature, layer){
            if(feature.properties.image===""){
           layer.bindPopup( '<h6><b>'+ feature.properties.name+'</b></h6>'+ feature.properties.category   +'<br><br>'+feature.properties.description +'<br><br>'+ feature.properties.address + '<br>');
            }
            else{

                  layer.bindPopup( '<h6><b>'+ feature.properties.name + '</b></h6><p>Category: '+ feature.properties.category   +'</p><p>'+ feature.properties.address +'</p><img src="/uploads/'+ feature.properties.image +'" width="100%">');

            }
            
           
          
       }

    });










	 var mbAttr = '<h6>Rosa Luxemburg Stiftung Climate Justice</h6>' +
	 		'',
 	mbUrl = 'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';

	 var grayscale   = L.tileLayer(mbUrl, {id: 'mapbox.dark', attribution: mbAttr}),
         streets  = L.tileLayer('', {attribution: mbAttr}) ;




	var map = L.map('map', {
		center: [11.81, 122.17],
		zoom: 6,
        // layers: [streets, mangrove, microHydroPowerplant, reforestation, renewableEnergy, sustainableAgriculture, urbanAgriculture, urbanEnvironment]
         layers: [streets, allmarkers]
	});



// 	var baseLayers = {
// 		'<p style="font-size:15px;">Dark</p>': grayscale,
//         '<p style="font-size:15px;">Grayscale</p>': streets,
       
//   };
  
  

	var overlays = {
    // '<p><img src="img/webicon/mangrovewebicon.svg" width="30px;">Mangrove</p>': mangrove,
    // '<p><img src="img/webicon/mhpwebicon.svg" width="30px;">Micro Hydro Powerplant</p>': microHydroPowerplant,
    // '<p><img src="img/webicon/reforestationwebicon.svg" width="30px;">Reforestation</p>': reforestation,
    // '<p><img src="img/webicon/renewableenergywebicon.svg" width="30px;">Renewable Energy</p>': renewableEnergy,
    // '<p><img src="img/webicon/sustainableagriculturewebicon.svg" width="30px;">Sustainable Agriculture</p>': sustainableAgriculture,
    // '<p><img src="img/webicon/urbanagriculturewebicon.svg" width="30px;">Urban Agriculture</p>': urbanAgriculture,
    // '<p><img src="img/webicon/urbanenvironmentwebicon.svg" width="30px;">Urban Environment</p>': urbanEnvironment
  };
  

  var rightSidebar = L.control.sidebar('sidebar-right', {
    closeButton: true,
            position: 'right'
            
        });
        map.addControl(rightSidebar);


        


            var popupoverlay;
    projects.on('click', function(e) {
        
        if($(window).width() <= 450) {
        
        $("#sidebar-content").empty();
        rightSidebar.show();    
        popupoverlaybody = e.layer.feature.properties.body
        popupoverlayname = e.layer.feature.properties.name
        popupoverlaydescription = e.layer.feature.properties.description
        popupoverlayaddress=e.layer.feature.properties.address
        popupoverlayimage = e.layer.feature.properties.image
        if(popupoverlayimage!=null){
            $("#sidebar-content").append('<h5>'+popupoverlayname+'</h5><img src="/uploads/'+popupoverlayimage+'" width="100%"><p>'+popupoverlayaddress+'</p><p>'+popupoverlaydescription+'</p>'+popupoverlaybody);
        }
        else{
            $("#sidebar-content").append('<h5>'+popupoverlayname+'</h5><p>'+popupoverlayaddress+'</p><p>'+popupoverlaydescription+'</p>'+popupoverlaybody);
        }
        } 
        else{
        if(e.layer.feature.properties.body != "&nbsp;"){ 
        $("#sidebar-content").empty();
        rightSidebar.show();    
        popupoverlay = e.layer.feature.properties.body
        popupoverlayname = e.layer.feature.properties.name
        popupoverlaydescription = e.layer.feature.properties.description
        popupoverlayaddress=e.layer.feature.properties.address
        $("#sidebar-content").append('<h5>'+popupoverlayname+'</h5><p>'+popupoverlayaddress+'</p><p>'+popupoverlaydescription+'</p>'+popupoverlay);
           
        }
        else{
            rightSidebar.hide();
        }
        }
    });



      map.on('click', function () {
            rightSidebar.hide();
        })

        $('.close').on('click', function(){
            rightSidebar.hide();
        });

    
            // Bind the swiperightHandler callback function to the swipe event on div.box
          $( "#sidebar-right" ).on( "swiperight", function(){
            
            rightSidebar.hide();
          });
         
         

    


//   L.control.layers(baseLayers, overlays,{position: 'topright'}).addTo(map);



 

  
// var GeoSearchControl = window.GeoSearch.GeoSearchControl;
// var EsriProvider = window.GeoSearch.EsriProvider;

// // remaining is the same as in the docs, accept for the var instead of const declarations
// var provider = new EsriProvider();

// var searchControl = new GeoSearchControl({
//   provider: provider,
//   autoComplete: true,             // optional: true|false  - default true
//   autoCompleteDelay: 250, 
//   showMarker: true,                                   // optional: true|false  - default true
//   showPopup: true,                                   // optional: true|false  - default false
//   marker: {                                           // optional: L.Marker    - default L.Icon.Default
//     icon: new L.Icon.Default(),
//     draggable: true,
//   },
//   popupFormat: ({ query, result }) => result.label,   // optional: function    - default returns result label
//   maxMarkers: 1,                                      // optional: number      - default 1
//   retainZoomLevel: false,                             // optional: true|false  - default false
//   animateZoom: true,                                  // optional: true|false  - default true
//   autoClose: false,                                   // optional: true|false  - default false
//   searchLabel: 'Enter Location',                       // optional: string      - default 'Enter address'
//   keepResult: false                                   // optional: true|false  - default false
// });

// map.addControl(searchControl, {position:'topleft'});
  

	// control that shows state info on hover

    var imageUrl = '/img/MAP.svg',
    imageBounds = [[21.05, 114.80593750000001], [4.340957270326323, 128.67]];
L.imageOverlay(imageUrl, imageBounds).addTo(map);
	


map.on('click', function(ev){
    var latlng = map.mouseEventToLatLng(ev.originalEvent);
    console.log(latlng.lat + ', ' + latlng.lng);
  });





