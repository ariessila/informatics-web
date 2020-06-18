$(document).ready(function(){
	
	$(".nav__mobile").change(function() {
	  window.location = $(this).find("option:selected").val();
	});




	$('.running-text__main__content').marquee({
		duration: 15000,
	});







	$('#slide').slippry({
		controls:false,
	});





	$(".aspiration-list__content__description__block").readmore({
		speed: 75,
  		lessLink: '<a href="#">Read less</a>',
  		moreLink: '<a href="#">Read more</a>',
  		collapsedHeight: 80
	});




	/* ---------------------------------------
    START : Autogrow textarea for comment and all textarea
    -----------------------------------------*/
    $.fn.autogrow = function(options)
    {
        return this.filter('textarea').each(function()
        {
            var self         = this;
            var $self        = $(self);
            var minHeight    = $self.height();
            var noFlickerPad = $self.hasClass('autogrow-short') ? 0 : parseInt($self.css('lineHeight')) || 0;

            var shadow = $('<div></div>').css({
                position:    'absolute',
                top:         -10000,
                left:        -10000,
                width:       $self.width(),
                fontSize:    $self.css('fontSize'),
                fontFamily:  $self.css('fontFamily'),
                fontWeight:  $self.css('fontWeight'),
                lineHeight:  $self.css('lineHeight'),
                resize:      'none',
                            'word-wrap': 'break-word'
            }).appendTo(document.body);

            var update = function(event)
            {
                var times = function(string, number)
                {
                    for (var i=0, r=''; i<number; i++) r += string;
                    return r;
                };

                var val = self.value.replace(/</g, '&lt;')
                                    .replace(/>/g, '&gt;')
                                    .replace(/&/g, '&amp;')
                                    .replace(/\n$/, '<br/>&nbsp;')
                                    .replace(/\n/g, '<br/>')
                                    .replace(/ {2,}/g, function(space){ return times('&nbsp;', space.length - 1) + ' ' });

                                // Did enter get pressed?  Resize in this keydown event so that the flicker doesn't occur.
                                if (event && event.data && event.data.event === 'keydown' && event.keyCode === 13) {
                                        val += '<br />';
                                }

                shadow.css('width', $self.width());
                shadow.html(val + (noFlickerPad === 0 ? '...' : '')); // Append '...' to resize pre-emptively.
                $self.height(Math.max(shadow.height() + noFlickerPad, minHeight));
            }

            $self.change(update).keyup(update).keydown({event:'keydown'},update);
            $(window).resize(update);

            update();
        });
    };
    $('textarea').css('overflow', 'hidden').autogrow();
    /* ---------------------------------------
    END : Autogrow textarea for comment and all textarea
    -----------------------------------------*/



   
   
   $('.aspiration-input__form__title input').focus(function() {
        $(".aspiration-input__form__line").slideDown();
        
    })





	var initPhotoSwipeFromDOM = function(gallerySelector) {

		// parse slide data (url, title, size ...) from DOM elements 
		// (children of gallerySelector)
		var parseThumbnailElements = function(el) {
		    var thumbElements = el.childNodes,
		        numNodes = thumbElements.length,
		        items = [],
		        figureEl,
		        childElements,
		        linkEl,
		        size,
		        item;

		    for(var i = 0; i < numNodes; i++) {


		        figureEl = thumbElements[i]; // <figure> element

		        // include only element nodes 
		        if(figureEl.nodeType !== 1) {
					continue;
		        }

				linkEl = figureEl.children[0]; // <a> element
				
		        size = linkEl.getAttribute('data-size').split('x');

		        // create slide object
		        item = {
					src: linkEl.getAttribute('href'),
					w: parseInt(size[0], 10),
					h: parseInt(size[1], 10)
		        };

		        

		        if(figureEl.children.length > 1) {
		        	// <figcaption> content
		          	item.title = figureEl.children[1].innerHTML; 
		        }
	 
		        if(linkEl.children.length > 0) {
		        	// <img> thumbnail element, retrieving thumbnail url
					item.msrc = linkEl.children[0].getAttribute('src');
		        } 
		       
				item.el = figureEl; // save link to element for getThumbBoundsFn
		        items.push(item);
		    }

		    return items;
		};

		// find nearest parent element
		var closest = function closest(el, fn) {
		    return el && ( fn(el) ? el : closest(el.parentNode, fn) );
		};

		// triggers when user clicks on thumbnail
		var onThumbnailsClick = function(e) {
		    e = e || window.event;
		    e.preventDefault ? e.preventDefault() : e.returnValue = false;

		    var eTarget = e.target || e.srcElement;

		    var clickedListItem = closest(eTarget, function(el) {
		        return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
		    });

		    if(!clickedListItem) {
		        return;
		    }


		    // find index of clicked item
		    var clickedGallery = clickedListItem.parentNode,
		    	childNodes = clickedListItem.parentNode.childNodes,
		        numChildNodes = childNodes.length,
		        nodeIndex = 0,
		        index;

		    for (var i = 0; i < numChildNodes; i++) {
		        if(childNodes[i].nodeType !== 1) { 
		            continue; 
		        }

		        if(childNodes[i] === clickedListItem) {
		            index = nodeIndex;
		            break;
		        }
		        nodeIndex++;
		    }



		    if(index >= 0) {
		        openPhotoSwipe( index, clickedGallery );
		    }
		    return false;
		};

		// parse picture index and gallery index from URL (#&pid=1&gid=2)
		var photoswipeParseHash = function() {
			var hash = window.location.hash.substring(1),
		    params = {};

		    if(hash.length < 5) {
		        return params;
		    }

		    var vars = hash.split('&');
		    for (var i = 0; i < vars.length; i++) {
		        if(!vars[i]) {
		            continue;
		        }
		        var pair = vars[i].split('=');  
		        if(pair.length < 2) {
		            continue;
		        }           
		        params[pair[0]] = pair[1];
		    }

		    if(params.gid) {
		    	params.gid = parseInt(params.gid, 10);
		    }

		    if(!params.hasOwnProperty('pid')) {
		        return params;
		    }
		    params.pid = parseInt(params.pid, 10);
		    return params;
		};

		var openPhotoSwipe = function(index, galleryElement, disableAnimation) {
		    var pswpElement = document.querySelectorAll('.pswp')[0],
		        gallery,
		        options,
		        items;

			items = parseThumbnailElements(galleryElement);

		    // define options (if needed)
		    options = {
		        index: index,
		        fullscreenEl: false,
				zoomEl: false,
				shareEl: false,
				counterEl: false,

				// define gallery index (for URL)
		        galleryUID: galleryElement.getAttribute('data-pswp-uid'),

		        getThumbBoundsFn: function(index) {
		            // See Options -> getThumbBoundsFn section of docs for more info
		            var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
		                pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
		                rect = thumbnail.getBoundingClientRect(); 

		            return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
		        },

		        // history & focus options are disabled on CodePen
	           	// remove these lines in real life: 
			   history: false,
			   focus: false	

		    };

		    if(disableAnimation) {
		        options.showAnimationDuration = 0;
		    }

		    // Pass data to PhotoSwipe and initialize it
		    gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
		    gallery.init();
		};

		// loop through all gallery elements and bind events
		var galleryElements = document.querySelectorAll( gallerySelector );

		for(var i = 0, l = galleryElements.length; i < l; i++) {
			galleryElements[i].setAttribute('data-pswp-uid', i+1);
			galleryElements[i].onclick = onThumbnailsClick;
		}

		// Parse URL and open gallery if it contains #&pid=3&gid=1
		var hashData = photoswipeParseHash();
		if(hashData.pid > 0 && hashData.gid > 0) {
			openPhotoSwipe( hashData.pid - 1 ,  galleryElements[ hashData.gid - 1 ], true );
		}
	};

	// execute above function
	initPhotoSwipeFromDOM('.gallery');

});