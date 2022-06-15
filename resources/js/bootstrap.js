window._ = require('lodash');

try {
    require('bootstrap');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });

require( 'jszip' );
require( 'pdfmake' );
require( 'datatables.net-bs4' )();
require( 'datatables.net-autofill-bs4' )();
require( 'datatables.net-buttons-bs4' )();
require( 'datatables.net-buttons/js/buttons.colVis.js' )();
require( 'datatables.net-buttons/js/buttons.html5.js' )();
require( 'datatables.net-buttons/js/buttons.print.js' )();
require( 'datatables.net-colreorder-bs4' )();
require( 'datatables.net-datetime' )();
require( 'datatables.net-fixedcolumns-bs4' )();
require( 'datatables.net-fixedheader-bs4' )();
require( 'datatables.net-keytable-bs4' )();
require( 'datatables.net-responsive-bs4' )();
require( 'datatables.net-rowgroup-bs4' )();
require( 'datatables.net-rowreorder-bs4' )();
require( 'datatables.net-scroller-bs4' )();
require( 'datatables.net-searchbuilder-bs4' )();
require( 'datatables.net-searchpanes-bs4' )();
require( 'datatables.net-select-bs4' )();
require( 'datatables.net-staterestore-bs4' )();
