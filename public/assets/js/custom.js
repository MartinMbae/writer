$(function () {
    var url = window.location;
    $('ul.navbar-nav  li.nav-item a').filter(function () {
        return this.href == url;
    }).addClass('active');
    // for sidebar menu and treeview
    $('ul.navbar-nav  li.nav-item  a').filter(function () {
        return this.href == url;
    }).parentsUntil(".nav-link")
        .removeClass('collapse').prev().attr('aria-expanded','true');
});
// $( document ).ready(function() {
//     console.log("ccccccccccccc");
//     $('input').attr('autocomplete','off');
// });
