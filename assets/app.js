/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (adminBase.html.twig).
 */


// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';
import './styles/adminlte.css';

// Bootstrap //
import 'bootstrap/dist/css/bootstrap.css'


//  Font Awesome //
import './fontawesome-free/css/all.css';

//  css USERS  //
import './styles/users.css';


// any CSS you import will output into a single css file (a pp.css in this case)

//  Font Awesome //


/*

//  Ionicons  //

//href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"

//  Tempusdominus Bbootstrap 4   //

import 'admin-lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css';

//  iCheck   //

import 'admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css';

//  JQVMap   //

import 'admin-lte/plugins/jqvmap/jqvmap.min.css';

// Table ccs 

import 'admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css';
import 'admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css';


//  Theme style   //

import 'admin-lte/dist/css/adminlte.min.css';

//  overlayScrollbars  //

import 'admin-lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css';

//  Daterange picker  //

import 'admin-lte/plugins/daterangepicker/daterangepicker.css';

//  summernote  //

import 'admin-lte/plugins/summernote/summernote-bs4.css';

// Google Font: Source Sans Pro  //

//href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700"

import tippy from 'tippy.js';
import 'tippy.js/dist/tippy.css';

//   jQuery   //

import 'admin-lte/plugins/jquery/jquery.min.js';

//   jQuery UI 1.11.4   //

import 'admin-lte/plugins/jquery-ui/jquery-ui.min.js';

//   css dropzone   //



//    Bootstrap 4    //

import 'admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js';

//    ChartJS   //

import 'admin-lte/plugins/chart.js/Chart.min.js';

//    Sparkline   //

import 'admin-lte/plugins/sparklines/sparkline.js';

//   JQVMap    //

import 'admin-lte/plugins/jqvmap/jquery.vmap.min.js';
import 'admin-lte/plugins/jqvmap/maps/jquery.vmap.france';

//  jQuery Knob Chart    //

import 'admin-lte/plugins/jquery-knob/jquery.knob.min.js';

//  daterangepicker   //


//import 'admin-lte/plugins/moment/moment.min.js';
//import 'admin-lte/plugins/daterangepicker/daterangepicker.js';


//   Tempusdominus Bootstrap 4 -  //

//import 'admin-lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js';

//   Summernote  //

import 'admin-lte/plugins/summernote/summernote-bs4.min.js';

//    overlayScrollbars  //

import 'admin-lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js';

// Table 
*/



// jQuery //

import './js/jquery';
import $ from 'jquery';
global.$ = global.jQuery = $;

import './js/adminlte.js';

// start the Stimulus application
import './bootstrap';

import "./js/bootstrap/bootstrap.bundle";


// <!-- DataTables  & Plugins -->

import 'jszip/dist/jszip';
import 'pdfmake/build/pdfmake';
import 'datatables.net-bs5/js/dataTables.bootstrap5';
import 'datatables.net-buttons-bs5/js/buttons.bootstrap5';
import 'datatables.net-buttons/js/buttons.colVis';
import 'datatables.net-buttons/js/buttons.html5';
import 'datatables.net-searchpanes/js/dataTables.searchPanes';
import 'datatables.net-select-bs5/js/select.bootstrap5';
import 'datatables.net-responsive-bs5/js/responsive.bootstrap5';


import 'datatables.net-bs5/js/dataTables.bootstrap5'


import 'datatables.net-bs5/css/dataTables.bootstrap5.css'



$(function () {
    $("#table").DataTable({
      "responsive": true,
       "lengthChange": false,
       "language": {
        "sProcessing": "Traitement en cours...",
        "sSearch": "Rechercher&nbsp;:",
        "sLengthMenu": "Afficher _MENU_ &eacute;l&eacute;ments",
        "sInfo": "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
        "sInfoEmpty": "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
        "sInfoFiltered": "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
        "sInfoPostFix": "",
        "sLoadingRecords": "Chargement en cours...",
        "sZeroRecords": "Aucun &eacute;l&eacute;ment &agrave; afficher",
        "sEmptyTable": "Aucune donn&eacute;e disponible dans le tableau",
        "oPaginate": {
          "sFirst": "Premier",
          "sPrevious": "Pr&eacute;c&eacute;dent",
          "sNext": "Suivant",
          "sLast": "Dernier"
        },
        "oAria": {
          "sSortAscending": ": activer pour trier la colonne par ordre croissant",
          "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
        }
      },
        "autoWidth": false,        
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#table .col-md-6:eq(0)');          
  });