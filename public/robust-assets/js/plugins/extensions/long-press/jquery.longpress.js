/*
 *  Project: Long Press
 *  Description: Pops a list of alternate characters when a key is long-pressed
 *  Author: Quentin Thiaucourt, http://toki-woki.net
 *	Licence: MIT License http://opensource.org/licenses/mit-license.php
 */

;(function ($, window, undefined) {
    
    var pluginName = 'longPress',
        document = window.document,
        defaults = {/*
	        propertyName: "value"
        */};

	var moreChars={
		// extended latin (and african latin)
		// upper
		'A':'Ä€Ä‚Ã€ÃÃ‚ÃƒÃ„Ã…Ä„â±­âˆ€Ã†',
		'B':'Æ',
		'C':'Ã‡Ä†ÄˆÄŠÄŒÆ†',
		'D':'ÃÄŽÄá¸ŽÆŠ',
		'E':'ÃˆÃ‰ÃŠÃ‹Ä’Ä–Ä˜áº¸ÄšÆÃ†ÆŽÆâ‚¬',
		'F':'Æ‘Æ©',
		'G':'ÄœÄžÄ Ä¢Æ¢',
		'H':'Ä¤Ä¦',
		'I':'ÃŒÃÃŽÃÄªÄ®á»ŠÄ°IÆ—Ä²',
		'J':'Ä´Ä²',
		'K':'Ä¶Æ˜',
		'L':'Ä¹Ä»Ä½ÅÎ›',
		'N':'Ã‘ÅƒÅ…Å‡ÅŠÆâ‚¦',
		'O':'Ã’Ã“Ã”Ã•Ã–ÅŒÃ˜ÅÅ’Æ ÆŸ',
		'P':'Æ¤Â¶',
		'R':'Å”Å˜ÉŒâ±¤',
		'S':'ÃŸÅ¿ÅšÅœÅžá¹¢Å ÃžÂ§',
		'T':'Å¢Å¤á¹®Æ¬Æ®',
		'U':'Ã™ÃšÃ›ÃœÅªÅ¬Å®Å°Å²É„Æ¯Æ±',
		'V':'Æ²',
		'W':'Å´áº„Î©',
		'Y':'ÃÅ¶Å¸Æ”Æ³',
		'Z':'Å¹Å»Å½ÆµÆ·áº”',
		
		// lower
		'a':'ÄÄƒÃ Ã¡Ã¢Ã£Ã¤Ã¥Ä…É‘Ã¦Î±Âª',
		'b':'ÃŸÎ²É“',
		'c':'Ã§Ï‚Ä‡Ä‰Ä‹ÄÂ¢É”',
		'd':'Ã°ÄÄ‘É–á¸É–É—',
		'e':'Ã¨Ã©ÃªÃ«Ä“Ä—Ä™áº¹Ä›É™Ã¦ÎµÉ›â‚¬',
		'f':'Æ’ÊƒÆ­',
		'g':'ÄÄŸÄ¡Ä£É Æ£',
		'h':'Ä¥Ä§É¦áº–',
		'i':'Ã¬Ã­Ã®Ã¯Ä«Ä¯á»‹iiÉ¨Ä³Î¹',
		'j':'ÄµÉŸÄ³',
		'k':'Ä·Æ™',
		'l':'ÄºÄ¼Ä¾Å‚Î»',
		'n':'Ã±Å„Å†ÅˆÅ‹É²',
		'o':'Ã²Ã³Ã´ÃµÃ¶ÅÃ¸Å‘Å“Æ¡ÉµÂ°',
		'p':'Æ¥Â¶',
		'r':'Å•Å™ÉÉ½',
		's':'ÃŸÅ¿Å›ÅÅŸá¹£Å¡Ã¾Â§',
		't':'Å£Å¥á¹¯Æ­Êˆ',
		'u':'Ã¹ÃºÃ»Ã¼Å«Å­Å¯Å±Å³Æ°Î¼Ï…Ê‰ÊŠ',
		'v':'Ê‹',
		'w':'Åµáº…Ï‰',
		'y':'Ã½Å·Ã¿É£yÆ´',
		'z':'ÅºÅ¼Å¾Æ¶áº•Ê’Æ¹',

		// Misc
		'$':'Â£Â¥â‚¬â‚©â‚¨â‚³ÉƒÂ¤',
		'!':'Â¡â€¼â€½',
		'?':'Â¿â€½',
		'%':'â€°',
		'.':'â€¦â€¢â€¢',
		'-':'Â±â€â€“â€”',
		'+':'Â±â€ â€¡',
		'\'':'â€²â€³â€´â€˜â€™â€šâ€›',
		'"':'â€œâ€â€žâ€Ÿ',
		'<':'â‰¤â€¹',
		'>':'â‰¥â€º',
		'=':'â‰ˆâ‰ â‰¡'
		
	};
	var ignoredKeys=[8, 13, 37, 38, 39, 40];

	var selectedCharIndex;
	var lastWhich;
	var timer;
	var activeElement;

	var popup=$('<ul class=long-press-popup />');

	$(window).mousewheel(onWheel);
	$(window).keyup(onKeyUp);

	function onKeyDown(e) {

		// Arrow key with popup visible
		if ($('.long-press-popup').length>0 && (e.which==37 || e.which==39)) {
			if (e.which==37) activePreviousLetter();
			else if (e.which==39) activateNextLetter();

			e.preventDefault();
			return;
		}

		if (ignoredKeys.indexOf(e.which)>-1) return;
		activeElement=e.target;

		if (e.which==lastWhich) {
			e.preventDefault();
			if (!timer) timer=setTimeout(onTimer, 10);
			return;
		}
		lastWhich=e.which;
	}
	function onKeyUp(e) {
		if (ignoredKeys.indexOf(e.which)>-1) return;
		if (activeElement==null) return;

		lastWhich=null;
		clearTimeout(timer);
		timer=null;

		hidePopup();
	}
	function onTimer() {
		var typedChar=$(activeElement).val().split('')[getCaretPosition(activeElement)-1];

		if (moreChars[typedChar]) {
			showPopup((moreChars[typedChar]));
		} else {
			hidePopup();
		}
	}
	function showPopup(chars) {
		popup.empty();
		var letter;
		for (var i=0; i<chars.length; i++) {
			letter=$('<li class=long-press-letter />').text(chars[i]);
			letter.mouseenter(activateLetter);
			popup.append(letter);
		}
		$('body').append(popup);
		selectedCharIndex=-1;
	}
	function activateLetter(e) {
		selectCharIndex($(e.target).index());
	}
	function activateRelativeLetter(i) {
		selectCharIndex(($('.long-press-letter').length+selectedCharIndex+i) % $('.long-press-letter').length);
	}
	function activateNextLetter() {
		activateRelativeLetter(1);
	}
	function activePreviousLetter() {
		activateRelativeLetter(-1);
	}
	function hidePopup() {
		popup.detach();
	}
	function onWheel(e, delta, deltaX, deltaY) {
		if ($('.long-press-popup').length==0) return;
		e.preventDefault();
		delta<0 ? activateNextLetter() : activePreviousLetter();
	}
	function selectCharIndex(i) {
		$('.long-press-letter.selected').removeClass('selected');
		$('.long-press-letter').eq(i).addClass('selected');
		selectedCharIndex=i;
		updateChar();
	}

	function updateChar() {
		var newChar=$('.long-press-letter.selected').text();
		var pos=getCaretPosition(activeElement);
		var arVal=$(activeElement).val().split('');
		arVal[pos-1]=newChar;
		$(activeElement).val(arVal.join(''));
		setCaretPosition(activeElement, pos);
	}

    function LongPress( element, options ) {

        this.element = element;
		this.options = $.extend( {}, defaults, options) ;
        
        this._defaults = defaults;
        this._name = pluginName;
        
        this.init();
    }

	LongPress.prototype = {

		init: function () {
			$(this.element).keydown(onKeyDown);
        }

	};

    $.fn[pluginName] = function ( options ) {
        return this.each(function () {
            if (!$.data(this, 'plugin_' + pluginName)) {
                $.data(this, 'plugin_' + pluginName, new LongPress( this, options ));
            }
        });
    };

}(jQuery, window));