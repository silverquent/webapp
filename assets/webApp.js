/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (adminBase.html.twig).
 */


// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css'

// Bootstrap //
import 'bootstrap/dist/css/bootstrap.css'


//  Font Awesome //
import './fontawesome-free/css/all.css';






var map;
document.addEventListener("DOMContentLoaded", function(event) {
  // Markers
  map = new GMaps({
    div: '#gmaps-markers',
    lat: -12.043333,
    lng: -77.028333
  });
  map.addMarker({
    lat: -12.043333,
    lng: -77.03,
    title: 'Lima',
    details: {
      database_id: 42,
      author: 'HPNeo'
    },
    click: function(e){
      if(console.log)
        console.log(e);
      alert('You clicked in this marker');
    }
  });
});
