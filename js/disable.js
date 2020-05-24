// This file disable all not usable elements for admin role

const role = document.querySelector("#role");

function loadjscssfile(filename){
        var fileref=document.createElement("link")
        fileref.setAttribute("rel", "stylesheet")
        fileref.setAttribute("type", "text/css")
        fileref.setAttribute("href", filename)

    if (typeof fileref!="undefined")
        document.getElementsByTagName("head")[0].appendChild(fileref)
}

if (role.dataset.role == "admin")
{
    loadjscssfile("./css/disable.css")
}