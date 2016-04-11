/*
|--------------------------------------------------------------------------
| main
|--------------------------------------------------------------------------
|In this part we are connecting all javascript dependencies to the application using require.js;
|
|
|
|
*/

requirejs.config({
    baseUrl:"public",
    paths:{
        'jquery' : '../bower/jquery/dist/jquery.min',
    }
});
define(['jquery','bootstrap'],function(){


});


