
      var drawingManager;
      var selectedShape;
      var colors = ['#1E90FF', '#FF1493', '#32CD32', '#FF8C00', '#4B0082'];
	  //var colors = ['#1E90FF'];
      var selectedColor;
      var colorButtons = {};
      var markersDisplay = [];
      var map;

  


      function loadXMLDoc(filename)
      {
          if (window.XMLHttpRequest)
            {
            xhttp=new XMLHttpRequest();
            }
          else // code for IE5 and IE6
            {
            xhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
          xhttp.open("GET",filename,false);
          xhttp.send();
          return xhttp.responseXML;
      }

      function setAdvanceMarker(map,markers){

        var bounds = new google.maps.LatLngBounds();
            var mapOptions = {
                mapTypeId: 'roadmap'
            };
        var infoWindow = new google.maps.InfoWindow(), marker, i;
        for( i = 0; i < markers.length; i++ ) {


                var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
                bounds.extend(position);
                marker = new google.maps.Marker({
                    position: position,
                    map: map,
                    title: markers[i][0]
                });
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
              return function() {
                         infoWindow.setContent("<div class='info_content'>"+markers[i][0]+"</div><div><img src='"+markers[i][3]+"'></div>");
                        infoWindow.open(map, marker);
                    }
                })(marker, i));
             map.fitBounds(bounds);
             markersDisplay.push(marker);
           }

           var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
                this.setZoom(14);
                google.maps.event.removeListener(boundsListener);
            });

        }

      function getTempMarker(){
      var locations = [];
      xmlDoc=loadXMLDoc("queryMarker.xml");

      if(xmlDoc!=null)
        {
          var places=xmlDoc.getElementsByTagName("place");
          for (i=0;i<places.length;i++) 
              {
                    x=xmlDoc.getElementsByTagName("title")[i];
                    title=x.childNodes[0];
                    x=xmlDoc.getElementsByTagName("lat")[i];
                    lat=x.childNodes[0];
                    x=xmlDoc.getElementsByTagName("lng")[i];
                    lng=x.childNodes[0];
                    x=xmlDoc.getElementsByTagName("picture")[i];
                    picture=x.childNodes[0];

                    locations[i]=[];
                    locations[i][0]=title.nodeValue;
                    locations[i][1]=lat.nodeValue;
                    locations[i][2]=lng.nodeValue;
                    locations[i][3]=picture.nodeValue;
              }
          }
          return locations;

      }



      function clearSelection() {
        if (selectedShape) {
          selectedShape.setEditable(false);
          selectedShape = null;
        }
      }

      function setSelection(shape) {
        clearSelection();
        selectedShape = shape;
        shape.setEditable(true);
        selectColor(shape.get('fillColor') || shape.get('strokeColor'));
      }

      function clearOverlaysMarker() 
      {
          for (var i = 0; i < markersDisplay.length; i++ ) 
          {
            markersDisplay[i].setMap(null);
          }
      markersDisplay.length = 0;
      }

    function addMarker(location) {
      var marker = new google.maps.Marker({
        position: location,
        map: map
      });
      markersDisplay.push(marker);
    }


      function deleteSelectedShape() {
        
        clearOverlaysMarker();
        if (selectedShape) {
          selectedShape.setMap(null);
        }
      }

      function selectColor(color) {
        selectedColor = color;
        for (var i = 0; i < colors.length; ++i) {
          var currColor = colors[i];
          //colorButtons[currColor].style.border = currColor == color ? '2px solid #789' : '2px solid #fff';
        }

        // Retrieves the current options from the drawing manager and replaces the
        // stroke or fill color as appropriate.
        var polylineOptions = drawingManager.get('polylineOptions');
        polylineOptions.strokeColor = color;
        drawingManager.set('polylineOptions', polylineOptions);

        var rectangleOptions = drawingManager.get('rectangleOptions');
        rectangleOptions.fillColor=color;
        drawingManager.set('rectangleOptions', rectangleOptions);

        var circleOptions = drawingManager.get('circleOptions');
        circleOptions.fillColor = color;
        //circleOptions.fillColor("#1E90FF");
        drawingManager.set('circleOptions', circleOptions);

        var polygonOptions = drawingManager.get('polygonOptions');
        polygonOptions.fillColor=color;
        drawingManager.set('polygonOptions', polygonOptions);
      }

      function setSelectedShapeColor(color) {
        if (selectedShape) {
          if (selectedShape.type == google.maps.drawing.OverlayType.POLYLINE) {
            selectedShape.set('strokeColor', color);
          } else {
            selectedShape.set('fillColor', color);
          }
        }
      }

      function makeColorButton(color) {
        var button = document.createElement('span');
        button.className = 'color-button';
        button.style.backgroundColor = color;
        google.maps.event.addDomListener(button, 'click', function() {
          selectColor(color);
          setSelectedShapeColor(color);
        });

        return button;
      }

       function buildColorPalette() {
       //  var colorPalette = document.getElementById('color-palette');
         for (var i = 0; i < colors.length; ++i) {
           var currColor = colors[i];
           var colorButton = makeColorButton(currColor);
           //colorPalette.appendChild(colorButton);
           //colorButtons[currColor] = colorButton;
         }
         selectColor(colors[0]);
		 //selectColor(colors[0]);
       }

       function isContainCircle(clat,clng,lat,lng,radius){
        r=getRadius(clat,clng,lat,lng);
        if(r<=radius)
          return true;
        else
          return false;
      }

        function getRadius(clat,clng,lat,lng)
        {
          dx=Math.pow((lat-clat),2);
          dy=Math.pow((lng-clng),2);
          r=Math.sqrt(dx+dy)*Math.pow(10,5);
          return r;
        }

      function initialize() {
         var latt = 13.6738888;
         var longg = 100.38989111;
         var locations=getTempMarker();
         map = new google.maps.Map(document.getElementById('mapSearch'), {
          zoom: 14,
          center: new google.maps.LatLng(latt, longg),
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          disableDefaultUI: true,
          zoomControl: true
        });

        var polyOptions = {
          strokeWeight: 0,
          fillOpacity: 0.45,
          editable: true,
          draggable: true
          //geodesic: true,
        };
        // Creates a drawing manager attached to the map that allows the user to draw
        // markers, lines, and shapes.
        drawingManager = new google.maps.drawing.DrawingManager({
          drawingMode: google.maps.drawing.OverlayType.POLYGON,
          markerOptions: {
            draggable: true
          },
          polylineOptions: {
            editable: true
          },
          rectangleOptions: polyOptions,
          circleOptions: polyOptions,
          polygonOptions: polyOptions,
          map: map
        });


        function setCircleMarker(circle){
              var markers = [];
              var radius = circle.getRadius();
              var clatt=circle.getCenter().lat();
              var clngg=circle.getCenter().lng();
              var index=0;
              for(var i=0;i<locations.length;++i)
              {
                lat=locations[i][1];
                lng=locations[i][2];
                 if(isContainCircle(clatt,clngg,lat,lng,radius))
                 {
                    markers[index]=locations[i];
                    var position= new google.maps.LatLng(lat, lng);
                    index++;
                 }
              }

              
              setAdvanceMarker(map,markers);  
        }

        google.maps.event.addListener(drawingManager, 'circlecomplete', function(circle) {

               google.maps.event.addListener(circle, 'radius_changed', function () 
               {
                 clearOverlaysMarker(); 
                 setCircleMarker(circle);
                }); 

              google.maps.event.addListener(circle, 'center_changed', function () 
               {
                 clearOverlaysMarker(); 
                 setCircleMarker(circle);
                }); 

               setCircleMarker(circle);
             
          })


       function setPolygonMarker(polygons){

          var markers = [];
          var index=0;
          for(var i=0;i<locations.length;++i)
          {
            var coordinate = new google.maps.LatLng(locations[i][1],locations[i][2]); 
            if(google.maps.geometry.poly.containsLocation(coordinate,polygons))
            {
              markers[index]=locations[i];
              var position= new google.maps.LatLng(locations[i][1], locations[i][2]);
              index++;
            }
          }
          setAdvanceMarker(map,markers); 

       }

        google.maps.event.addListener(drawingManager, 'polygoncomplete', function(polygons) 
        {
            google.maps.event.addListener(polygons.getPath(), 'set_at', function(index, obj)
            {
              clearOverlaysMarker(); 
              setPolygonMarker(polygons);
            });

            google.maps.event.addListener(polygons.getPath(), 'insert_at', function(index, obj)
            {
              clearOverlaysMarker(); 
              setPolygonMarker(polygons);
            });

            google.maps.event.addListener(polygons.getPath(), 'remove_at', function(index, obj)
            {
              clearOverlaysMarker(); 
              setPolygonMarker(polygons);
            });

             setPolygonMarker(polygons);
        });

        function setRectangleMarker(rectangle){
            var ne = rectangle.getBounds().getNorthEast();
            var sw = rectangle.getBounds().getSouthWest();
            var markers = [];
            var index=0;
            for(var i=0;i<locations.length;++i)
            {
                lat=locations[i][1];
                lng=locations[i][2];

                if((lng >=sw.lng())&&(lng <=ne.lng())&&(lat>=sw.lat()&&lat<=ne.lat()))
                {
                    markers[index]=locations[i];
                    var position= new google.maps.LatLng(lat, lng);
                    index++;
                }
            }
            setAdvanceMarker(map,markers);

        }

         google.maps.event.addDomListener(drawingManager, 'rectanglecomplete', function(rectangle) 
           {
              
              google.maps.event.addListener(rectangle, 'bounds_changed', function () 
               {
                clearOverlaysMarker(); 
                setRectangleMarker(rectangle);
                }); 
              setRectangleMarker(rectangle);
           }
         );


        google.maps.event.addListener(drawingManager, 'overlaycomplete', function(e) {
            if (e.type != google.maps.drawing.OverlayType.MARKER) 
            {
            // Switch back to non-drawing mode after drawing a shape.
            drawingManager.setDrawingMode(null);
            // Add an event listener that selects the newly-drawn shape when the user
            // mouses down on it.
            var newShape = e.overlay;
            newShape.type = e.type;
            google.maps.event.addListener(newShape, 'click', function() {
              setSelection(newShape);
            });
            setSelection(newShape);
          }
        }
        );

       
        google.maps.event.addListener(drawingManager, 'drawingmode_changed', deleteSelectedShape);
        google.maps.event.addListener(map, 'click', clearSelection);
       // google.maps.event.addDomListener(document.getElementById('delete-button'), 'click', deleteSelectedShape);

        //buildColorPalette();
      }
      google.maps.event.addDomListener(window, 'load', initialize);
