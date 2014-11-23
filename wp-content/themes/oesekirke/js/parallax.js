/*
    Vertical Parallax Scrolling
    By Patrick Gillespie
    Website: http://patorjk.com/
    Code License (for this file): http://creativecommons.org/licenses/by/3.0/
    
    This is an example of one way to do vertical parallax scrolling in JavaScript.
    The CSS and HTM files contain the other pieces to how this works.
*/

var PX = {} || PX; // namespace for this file

// -----------------------------------------------------------------------------
// Global Variables
// -----------------------------------------------------------------------------

PX.focalLength = 100;
PX.scaleMultiplier = 50;
PX.zDepth = 1000;
PX.movementSensitivity = 60; // get divided by pageYOffset, the lower the more sensitive
PX.elements = [];

// -----------------------------------------------------------------------------
// Image Container - This is where you add/remove images
// -----------------------------------------------------------------------------

/*
    About:
        To add more image choices in your work, simply add additional properties to the PX.elementTypes
        object.
*/


PX.elementTypes = {

    "cloud1": {
        image: ( "pageYOffset" in window ) ? "http://oesekirke.dk/wp-content/themes/oesekirke/images/cloud-1.png" : "http://oesekirke.dk/wp-content/themes/oesekirke/images/cloud-1.png",  /* one way of using different images between IE and other browser - here we use the same image for both */
        width: 669,
        height: 494,
        index: (function() {
            PX.elementTypeList = PX.elementTypeList || [];
            PX.elementTypeList.push( "cloud1" );
            return PX.elementTypeList.length;
        })()
    },

	"cloud2": {
        image: ( "pageYOffset" in window ) ? "http://oesekirke.dk/wp-content/themes/oesekirke/images/cloud-2.png" : "http://oesekirke.dk/wp-content/themes/oesekirke/images/cloud-2.png",  /* one way of using different images between IE and other browser - here we use the same image for both */
        width: 689,
        height: 285,
        index: (function() {
            PX.elementTypeList = PX.elementTypeList || [];
            PX.elementTypeList.push( "cloud2" );
            return PX.elementTypeList.length;
        })()
    },

	"cloud3": {
        image: ( "pageYOffset" in window ) ? "http://oesekirke.dk/wp-content/themes/oesekirke/images/cloud-3.png" : "http://oesekirke.dk/wp-content/themes/oesekirke/images/cloud-3.png",  /* one way of using different images between IE and other browser - here we use the same image for both */
        width: 348,
        height: 288,
        index: (function() {
            PX.elementTypeList = PX.elementTypeList || [];
            PX.elementTypeList.push( "cloud3" );
            return PX.elementTypeList.length;
        })()
    }

	
};

// -----------------------------------------------------------------------------
// Utilitiy Functions
// -----------------------------------------------------------------------------

PX.randomNum = function(min, max) {
    var range = max - min;
    return Math.round( Math.random()*range ) + min;
};

PX.getUniqueZIndex = function() {
    var num,
        validZIndex = false,
        ii;
    
    do {
        num = PX.randomNum( 0, PX.zDepth);
        validZIndex = true;
        for (ii = 0; ii < PX.elements.length; ii++) {
            if (PX.elements[ii].z === num) {
                validZIndex = false;
                break;
            }
        }
    } while(!validZIndex);
    
    return num;
}
    
// -----------------------------------------------------------------------------
// Functions Related to Creating and Moving the Objects
// -----------------------------------------------------------------------------

PX.createElementByType = function(type) {

    if (typeof type === "number") {
        type = PX.elementTypeList[type];
    }

    var typeObj = PX.elementTypes[type];
    
    var img = document.createElement("img");
    img.className = "px-div-img";
    img.src = typeObj.image;
    
    var elm = {};
    elm.div = document.createElement("div");
    elm.div.className = "px-div";
    elm.div.appendChild( img );
    elm.style = elm.div.style;
    elm.width = typeObj.width;
    elm.height = typeObj.height;
    
    $('#overflow').append( elm.div );
    return elm;
}

PX.createElements = function(config) {
    
    config = config || {};
    
    var ii,
        count = config.count || 100;
    
    PX.elements = [];
    for (ii = 0; ii < count; ii++) {
        PX.elements.push( PX.createElementByType( Math.floor(Math.random()*PX.elementTypeList.length) ) );
        
        PX.elements[ii].z = PX.getUniqueZIndex();
        PX.elements[ii].style.zIndex = PX.zDepth - PX.elements[ii].z;
        var scale = PX.focalLength / (PX.focalLength + PX.elements[ii].z);

        var newWidth = Math.round(PX.elements[ii].width * scale);
        var newHeight = Math.round(PX.elements[ii].height * scale);
        
        PX.elements[ii].style.width = newWidth + "px";
        PX.elements[ii].style.height = newHeight + "px";
        
        PX.elements[ii].x = PX.randomNum( -1*(newWidth/2), $(document).width() - (newWidth/2) );
        
        var myYDepth = $(window).height() + (($(document).height() - $(window).height())/PX.movementSensitivity) * PX.scaleMultiplier * scale; 
        
        PX.elements[ii].y = PX.randomNum( -1*(newHeight/2), myYDepth - (newHeight/2));
        
        PX.elements[ii].style.left = PX.elements[ii].x + "px";
        PX.elements[ii].style.top = PX.elements[ii].y  + "px";
    }
    
    PX.positionElements();
};

PX.positionElements = function() {

    var myPageYOffset = window.pageYOffset || document.documentElement.scrollTop,
        yOffset = (myPageYOffset / PX.movementSensitivity),
        ii = PX.elements.length || 0,
        elm;
    
    while (ii--) {

        elm = PX.elements[ii];

        if ( !elm.scaleMultipler ) {
            elm.scaleMultipler = ( PX.focalLength / (PX.focalLength + elm.z) ) * PX.scaleMultiplier;
        }

        elm.style.top = Math.round(elm.y  - ( yOffset * elm.scaleMultipler) ) + "px";
    }

};

// -----------------------------------------------------------------------------
// Events
// -----------------------------------------------------------------------------

$(window).bind("scroll", function(evt) {
    PX.positionElements();
});

$(window).bind("load", function(evt) {

    PX.createElements();
    
    for (var ii = 0; ii < PX.elements.length; ii++) {
        if ( "pageYOffset" in window ) {
            $(PX.elements[ii].div).fadeIn(2000);
        } else {
            $(PX.elements[ii].div).show();
        }
    }
});