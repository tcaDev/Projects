//http://www.javascriptkit.com/javatutors/loadjavascriptcss2.shtml
// how to use
//sample
//replacejscssfile("oldscript.js", "newscript.js", "js") //Replace all occurences of "oldscript.js" with "newscript.js"
//replacejscssfile("oldstyle.css", "newstyle", "css") //Replace all occurences "oldstyle.css" with "newstyle.css"


function createjscssfile(filename, filetype){
    if (filetype=="js"){ //if filename is a external JavaScript file
        var fileref=document.createElement('script')
        fileref.setAttribute("type","text/javascript")
        fileref.setAttribute("src", filename)
    }
    else if (filetype=="css"){ //if filename is an external CSS file
        var fileref=document.createElement("link")
        fileref.setAttribute("rel", "stylesheet")
        fileref.setAttribute("type", "text/css")
        fileref.setAttribute("href", filename)
    }
    return fileref
}
 
function replacejscssfile(oldfilename, newfilename, filetype){
    var targetelement=(filetype=="js")? "script" : (filetype=="css")? "link" : "none" //determine element type to create nodelist using
    var targetattr=(filetype=="js")? "src" : (filetype=="css")? "href" : "none" //determine corresponding attribute to test for
    var allsuspects=document.getElementsByTagName(targetelement)
    for (var i=allsuspects.length; i>=0; i--){ //search backwards within nodelist for matching elements to remove
        if (allsuspects[i] && allsuspects[i].getAttribute(targetattr)!=null && allsuspects[i].getAttribute(targetattr).indexOf(oldfilename)!=-1){
            var newelement=createjscssfile(newfilename, filetype)
            allsuspects[i].parentNode.replaceChild(newelement, allsuspects[i])
        }
    }
}

